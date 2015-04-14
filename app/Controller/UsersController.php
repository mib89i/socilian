<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UsersController extends AppController{
    //public $helpers = array('Js' => array('Jquery'));
    public $uses = array('User');

    public function isAuthorized($user) {
        return true;
    }

    public function index(){
        return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

	public function register(){
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['register_link'] = md5($this->request->data['User']['email']);
            if ($this->User->save($this->request->data)) {
                // $user = $this->User->find('first', array(
                //     'conditions' => 'User.email = "'. $this->request->data['User']['email'] .'"'
                //     )
                // );
                // TESTE PEGANDO O ID SE NÃO FUNCIONAR DESCOMENTAR O METODO ACIMA
                // ou $this->User->getInsertID();
                // ou $this->User->getID(); esse é mais recomendavel
                $user = $this->User->read(); // ou $this->User->read(null, $this->User->id)

                $email = new CakeEmail();
                $email->config('gmail');

                $email->from(
                    array('mibexzooo@gmail.com' => 'PUBL'))
                ->template('register_email', 'register_email_template')
                ->emailFormat('html')
                ->viewVars(array(
                    'v_name' => $this->request->data['User']['name'],
                    'v_link_activate' => Router::url('/', true) . 'users/register_confirm/'.$this->request->data['User']['register_link']
                    )
                )
                ->to($this->request->data['User']['email'])
                ->subject('Confirmação de Cadastro')
                ->send();

                //$this->Session->setFlash(, 'default', array(), 'good');

                $this->Session->setFlash(
                    'Agora falta pouco, confirme seu cadastro acessando seu email',
                    'default',
                    array('class' => 'alert alert-info', 'role' => 'alert')
                );

                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $this->Session->setFlash(
                __('Erro ao se cadastrar, tente novamente!')
            );

        }
            $this->set('title_for_layout', 'Me Cadastrar - PUBL');
	}

	public function login(){
        if ($this->Auth->user('email')){
            return $this->redirect(array('controller' => 'profile', 'action' => 'index'));
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('active') == 0){
                    $this->Session->setFlash(
                        'Acesse seu email para ativar sua conta!',
                        'default',
                        array('class' => 'alert alert-danger', 'role' => 'alert')
                    );
                    $this->Auth->logout();
                    return;
                }
                
                $user = $this->User->read(null, $this->Auth->user('id'));
                
                if ($this->request->data['User']['logged']){
                    $userlogged = array(  
                        'id' => $user['User']['id'],  
                        'email' => $user['User']['email'],  
                        'password' => $user['User']['password']  
                    );  
                    $this->Cookie->write('logged', $userlogged, true, '2 weeks'); 
                }
                return $this->redirect($this->Auth->redirect());
                //return $this->redirect($this->referer());
            }
            $this->Session->setFlash(
                    'Email ou Senha inválida, tente novamente!',
                    'default',
                    array('class' => 'alert alert-danger', 'role' => 'alert')
            );
            unset($this->request->data['User']['password']);
        }
		$this->set('title_for_layout', 'Entrar - PUBL');
	}

    public function register_confirm($email = NULL){
        $this->set('title_for_layout', 'Confirmar Cadastro - Composers');
        if ($email == NULL){
            return $this->redirect(array('controller' => 'home', 'action' => 'index')); 
        }

        $this->set('title_for_layout', 'Confirmação de Cadastro - Composers');
        
        $user = $this->User->find('first', array(
            'conditions' => 'User.register_link = "'. $email .'"'
            )
        );

        if (!$user){
            $this->Session->setFlash(__('Usuário não encontrado!'));
            return $this->redirect(array('controller' => 'users', 'action' => 'register')); 
        }

        if ($user['User']['active'] == 1){
            $this->Session->setFlash(__($user['User']['name']. ', seu cadastro já esta ativo, faça o login.'));
            $this->set('active', TRUE);
            return;
        }
        
        $this->User->read(null, $user['User']['id']);
        if ($this->User->saveField('active', 1)){
            $this->Session->setFlash(__('Parabéns! ' .$user['User']['name']. ', seu cadastro foi ativo!'));
            $this->set('active', FALSE);
        }
    }    

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function update_user(){
        if ($this->request->is('post')){
            $this->User->id = $this->request->data['User']['id'];
            $user = $this->User->read();

            if ($user['User']['nickname'] == $user['User']['slug']){ // verificar aqui
                //if ( $user['User']['nickname'] != $this->request->data['User']['nickname']){
                    $this->User->saveField('slug', strtolower(Inflector::slug($this->request->data['User']['nickname'], $replacement = '-')));
                //}
            }

            if ($this->User->saveField('name', $this->request->data['User']['name']) &&
                $this->User->saveField('nickname', $this->request->data['User']['nickname'])){
                $this->Session->setFlash(
                        'Perfil Atualizado!',
                        'default',
                        array('class' => 'alert alert-success', 'role' => 'alert')
                );
            }
            return $this->redirect($this->referer());
        }
        return $this->redirect(array('controller' => 'profile', 'action' => 'index')); 
    }

    public function upload_img(){
        $folder = new Folder();
        $dir = NULL;

        if (!$folder->create('img' . DS . 'profile')) {
            return false;
        }

        if (!empty($this->request->data['User']['picture_upload']['size'])) {
            //echo debug($this->request->data['User']);
            //exit;
            $this->User->id = $this->Auth->user('id');

            $user = $this->User->read();

            if (!empty($user['User']['picture'])){
                //$this->delete_picture($user['User']['picture']);
                $name = $user['User']['picture'];
                $file = new File('img/profile/'.$name);
                //$file_thumb = new File('img/profile/thumb_'.$name);

                $file->delete();
                //$file_thumb->delete();
            }


            //$filename = strtolower(Inflector::slug($this->request->data['Noticia']['picture']['name'],'-'));
            
            $info =  pathinfo($this->request->data['User']['picture_upload']['name']);
            $filename = md5($user['User']['email'].$this->request->data['User']['picture_upload']['name']);
            $filename = $filename . '.'. $info['extension'];
            $this->request->data['User']['picture_upload']['name'] = $filename;
            //$filename = strtolower(Inflector::slug($name, '-'));
            //$filename = md5($filename);

            $dir = 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR;
            $dir = WWW_ROOT . $dir . DS;
            
            // CROP IMAGE
            //$this->User->crop_image($dir, $this->request->data['User']['picture_upload']);


            $arquivo = new File($this->request->data['User']['picture_upload']['tmp_name']);  
            $arquivo->copy($dir.$filename);  
            $arquivo->close(); 



            $this->User->saveField('picture', $filename);
        } 

        //return $this->redirect(array('controller'=>'profile', 'action'=>'index'));
        return $this->redirect($this->referer());
    }

    public function reset_pass($code_reset = NULL){
        //$this->Js->each('alert("whoa!");', true);
        //$this->email_test();
        //echo $datetime->format('d/m/y H:i:s');
        $this->set('title_for_layout', 'Alterar Senha - Composers');
        if ($this->request->is('post') && $code_reset == NULL) {
            $datetime = new DateTime(); 
            $user = $this->User->find('first', array(
                'conditions' => 'User.email = "'.$this->request->data['User']['email'].'"')
            );

            if (!$user){
                $this->Session->setFlash(
                        '<strong>Atenção!</strong> Email não encontrado, tente novamente!',
                        'default',
                        array('class' => 'alert alert-warning', 'role' => 'alert')
                );
                return $this->redirect(array('controller' => 'users', 'action' => 'login')); 
            }
        
            $this->User->read(null, $user['User']['id']);

            $user['User']['reset_pass_link'] = md5($datetime->format('d/m/y H:i:s'));

            if (!$this->User->saveField('reset_pass_link', $user['User']['reset_pass_link'])){
                $this->Session->setFlash(
                    'Sua solicitação não pode ser enviada no momento, tente mais tarde.',
                    'default',
                    array('class' => 'alert alert-danger', 'role' => 'alert')
                );

                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            $email = new CakeEmail();
            $email->config('smtp');

            $email->from(
                array('noreply@composers.zz.vc' => 'Composers'))
            ->template('reset_pass', 'reset_pass_template')
            ->emailFormat('html')
            ->viewVars(array(
                //'v_noreset' => $noreset,
                'v_confirm_reset' => Router::url('/', true) . 'users/reset_pass/'.$user['User']['reset_pass_link']
                )
            )
            ->to($this->request->data['User']['email'])
            ->subject('Alteração de Senha')
            ->send();

            $this->Session->setFlash(
                'Solicitação enviada para o email cadastrado, acesse e altere sua senha.',
                'default',
                array('class' => 'alert alert-info', 'role' => 'alert')
            );

            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }

        if ($code_reset != NULL) {
            $user = $this->User->find('first', array(
                'conditions' => 'User.reset_pass_link = "'.$code_reset.'"')
            );

            if (!$user){
                return $this->redirect(array('controller' => 'users', 'action' => 'login'));
            }

            if ($this->request->is('post')){
                $this->User->read(null, $user['User']['id']);

                $this->request->data['User']['reset_pass_link'] = NULL;
                if ($this->User->save($this->request->data)){
                    $this->Session->setFlash(
                        'Senha alterada, faça seu Login.',
                        'default',
                        array('class' => 'alert alert-info', 'role' => 'alert')
                    );

                    return $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            }

            $this->set('email_reset', $user['User']['email']);
            $this->set('code_reset', $user['User']['reset_pass_link']);
            return;    
        }

        return $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    function email_test(){
        $this->layout = 'emails/html/default';
        //$user = $this->User->findById(1);
        //$this->set('name', 'José');
        //$this->set('email_heading', 'Welcome to My App');
        //$this->set('v_cancelar_assinatura ', 'http://www.google.com');
        return $this->render('/elements/email/html/reset_pass_template');
    }    

    function search_friends(){
        return $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    function add_friend($id_friend = NULL){
        if ($this->request->is('ajax') && $id_friend != NULL){
            $friend = $this->Friend->read(null, $id_friend);

            $this->Friend->create();
            $data = array('friend_one' => $this->Auth->user('id'), 'friend_two' => $friend['Friend']['friend_one'], 'status' => 0);
            $this->Friend->save($data);
            $this->Session->setFlash(
                            'Sua solicitação foi enviada para '. $friend['User']['name'],
                            'default',
                            array('class' => 'alert alert-info', 'role' => 'alert', 'style' => 'font-size: 12pt')
            );

            // $this->loadModel('Friend');
            // $list_suggestion_friend = $this->Friend->getFriendSuggestions($this->Auth->user('id'));
            $user_id = $this->Auth->user('id');
            $list_suggestion_friend = $this->Friend->query(
                "SELECT * FROM friends Friend 
                  INNER JOIN users User ON User.id = Friend.friend_one
                  WHERE Friend.friend_one != $user_id
                    AND Friend.friend_two != $user_id
                    AND Friend.friend_one NOT IN (
                         select friend_one from friends where (friend_one = $user_id or friend_two = $user_id) and status != 2
                        )
                    AND Friend.friend_two NOT IN (
                         select friend_two from friends where (friend_one = $user_id or friend_two = $user_id) and status != 2
                        )
                    AND (Friend.status = 2)
                "
            );

//            $list_suggestion_friend = $this->Friend->getFriendSuggestions($this->Auth->user('id'));
            $this->set('list_suggestion_friend', $list_suggestion_friend); 
            $this->render('add_friend');
        }
    }

    function accept_pedding($id_friend = NULL){
        if ($this->request->is('ajax') && $id_friend != NULL){
            //$friend = $this->Friend->read(null, $id_friend);

            $this->Friend->id = $id_friend;

            $this->Friend->saveField('status', 1);
            //$my_pedding_friends = $this->Friend->my_friends_pedding($this->Auth->user('id'));
            $user_id = $this->Auth->user('id');
            $my_pedding_friends = $this->Friend->query(
                "SELECT * FROM friends Friend 
                  INNER JOIN users User ON User.id = Friend.friend_one
                  INNER JOIN users UserTwo ON UserTwo.id = Friend.friend_two
                  WHERE (Friend.friend_one = $user_id OR Friend.friend_two = $user_id)
                    AND Friend.status = 0"
            );

            $this->set('list_my_pedding_friends', $my_pedding_friends);
            $this->render('pedding_friend'); 
        }

    }    

    function cancel_pedding($id_friend = NULL){
        if ($this->request->is('ajax') && $id_friend != NULL){
            //$friend = $this->Friend->read(null, $id_friend);

            $this->Friend->delete($id_friend, false);
            //$my_pedding_friends = $this->Friend->my_friends_pedding($this->Auth->user('id'));
            $user_id = $this->Auth->user('id');
            $my_pedding_friends = $this->Friend->query(
            "SELECT * FROM friends Friend 
              INNER JOIN users User ON User.id = Friend.friend_one
              INNER JOIN users UserTwo ON UserTwo.id = Friend.friend_two
              WHERE (Friend.friend_one = $user_id OR Friend.friend_two = $user_id)
                AND Friend.status = 0"
            );

            $this->set('list_my_pedding_friends', $my_pedding_friends);
            $this->render('pedding_friend'); 
        }

    }

    function update_list_my_friends(){
        if ($this->request->is('ajax')){
            $my_friends = $this->Friend->my_friends($this->Auth->user('id'));

            $this->set('list_my_friends', $my_friends);
            $this->render('my_friend_accept'); 
        }
    }

    function update_list_my_not_friends(){
        if ($this->request->is('ajax')){
            $my_friends = $this->Friend->my_not_friends_pedding($this->Auth->user('id'));

            $this->set('list_my_not_friends', $my_friends);
            $this->render('my_not_friends'); 
        }
    }

    function update_not_friends(){
        if ($this->request->is('ajax')){
            $count_not = $this->Friend->count_peddings($this->Auth->user('id'));

            $this->set('count_not_friends', $count_not);
            $this->render('update_not_friends'); 
        }
    }
    // public function beforeRender(){
    //     $this->loadModel('Friend');
    //     $list_suggestion_friend = $this->Friend->getFriendSuggestions($this->Auth->user('id'));
    //     $this->set('list_suggestion_friend', $list_suggestion_friend); 
    //     //$this->render('add_friend'); 
    // }
}