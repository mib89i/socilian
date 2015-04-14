<?php

App::uses('Model', 'Model');

class Contato extends AppModel{
    public $useTable = false;
    
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
            )
        ),
        'title' => array(
            'Digite um título para sua mensagem' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite um título para sua mensagem'
            )
        ),
        'text' => array(
            'Digite uma mensagem' => array(
                'rule' => array('notEmpty'),
                'message' => 'Digite uma mensagem'
            )
        ),
        
    );
}

