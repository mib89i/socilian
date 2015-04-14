<?php
/*
 * 
DROP TABLE IF EXISTS `users`; 

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `register_link` varchar(200) DEFAULT NULL,
  `reset_pass_link` varchar(200) DEFAULT NULL,
  `picture` varchar(300) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 * 
 * 
 */

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'name' => array(
            'Digite seu Nome' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite seu Nome'
            )
        ),
        'email' => array(
            'Digite um Email válido' => array(
                'rule' => array('email'),
                'message' => 'Digite um Email válido'
            ),
            'Esse email já esta cadastrado!' => array(
                'rule' => array('isUnique'),
                'message' => 'Esse email já esta cadastrado!'
            )
        ),       
        'password' => array(
            'Digite uma Senha' => array(
                'rule' => 'notEmpty',
                'message' => 'Digite uma Senha'
            ),
            'Suas senhas não correspondem' => array(
                'rule' => 'matchPasswords',
                'message' => 'Suas senhas não correspondem'
            )
        ),
        'password_confirm' => array(
            'Digite uma Senha' => array(
                'rule' => 'notEmpty',
                'message' => 'Confirme a Senha'
            )
        ),
    );

    public function matchPasswords($data){
        if ($data['password'] == $this->data['User']['password_confirm']){
            return true;
        }
        $this->invalidate('password_confirm', 'Para confirmar a senha digite igual');
        return false;
    }
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function crop_image($path_name = NULL, $image = NULL){
        App::import('Vendor', 'WideImage/WideImage');  
      
        $img = WideImage::load($image['tmp_name']);
          
        //Tamanho 200x200px para miniatura  
        $min = $img->resize(200,200,'outside');    
        $min = $min->crop('50%-100','50%-100',200,200);      
        $min->saveToFile($path_name.'thumb_'.$image['name']);  
    }
}
