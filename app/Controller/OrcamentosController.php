<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class OrcamentosController extends AppController {
    public $uses = array('Orcamento');

    public function index() {
        $this->set('title_for_layout', 'Solicitar Orçamento');
        
        if ($this->request->is('post')) {
            $this->Orcamento->create();
            $this->request->data['Orcamento']['protocol_link'] = md5($this->request->data['Orcamento']['email']);
            $this->request->data['Orcamento']['protocol'] = CakeTime::convert(time(), new DateTimeZone('Asia/Jakarta'));
            if ($this->Orcamento->save($this->request->data)) {
                $email = new CakeEmail();
                $email->config('gmail');

                $email->from(
                    array('mibexzooo@gmail.com' => 'PUBL - Compartilhando Ideias'))
                ->template('orcamento_email', 'orcamento_email_template')
                ->emailFormat('html')
                ->viewVars(array(
                    'v_name' => $this->request->data['Orcamento']['name'],
                    'v_protocol' => $this->request->data['Orcamento']['protocol'],
                    'v_phone' => ($this->request->data['Orcamento']['phone']) ? $this->request->data['Orcamento']['phone'] : '##############',
                    'v_description' => $this->request->data['Orcamento']['description'],
                    'v_link_protocol' =>  Router::url( 'meu_protocolo', true ).'/'.$this->request->data['Orcamento']['protocol']
                    )
                )
                ->to($this->request->data['Orcamento']['email'])
                ->subject('Solicitação de Site')
                ->send();
                
                return $this->redirect(array('controller' => 'orcamentos', 'action' => 'enviado/'.$this->request->data['Orcamento']['protocol_link']));
            }
        }else if ($this->request->is('get') && isset ($this->request->query['name']) && isset ($this->request->query['email'])) {
            $this->request->data['Orcamento']['name'] = $this->request->query['name'];
            $this->request->data['Orcamento']['email'] = $this->request->query['email'];
                $this->Session->setFlash(
                    'Conclua sua solicitação para entrarmos em contato!',
                    'default',
                    array('class' => 'alert alert-success', 'role' => 'alert')
                );            
        }
    }
    
    public function enviado($protocol = NULL){
        
        $this->set('title_for_layout', 'Orçamento Enviado');
        if ($protocol == NULL){
            return $this->redirect(array('controller' => 'orcamentos', 'action' => 'index'));
        }
        $orcamento = $this->Orcamento->find('first', array(
            'conditions' => array('protocol_link' => $protocol))
        );
        
        if ($orcamento){
            $this->set('protocolo', $orcamento);
        }else{
            return $this->redirect(array('controller' => 'orcamentos', 'action' => 'index'));
        }
    }
    
    public function meu_protocolo($protocol = NULL){
        $this->set('title_for_layout', 'Meu Protocolo');
        
        if ($this->request->is('post')){
            $protocol = $this->request->data['Orcamento']['protocol'];
        }
        
        if ($protocol != NULL){
            $orcamento = $this->Orcamento->find('first', array(
                'conditions' => array('protocol' => $protocol))
            );
            
            if ($orcamento){
                $this->set('orcamento', $orcamento);
            }else{
                
            }
        }
    }
    
    public function plano_simples() {
        $this->set('title_for_layout', 'Solicitar Plano Institucional');
    }
    
    public function plano_site_simples() {
        $this->set('title_for_layout', 'Solicitar Plano Site Gerenciador Simples');
    }
    
    public function plano_site_completo() {
        $this->set('title_for_layout', 'Solicitar Plano Site Gerenciador Completo');
    }
}
