<?php

/* 
DROP TABLE IF EXISTS `budgets`; 

CREATE TABLE `budgets` ( 
`id` int(11) NOT NULL AUTO_INCREMENT, 
`name` varchar(150) NOT NULL, 
`email` varchar(200) NOT NULL, 
`phone` varchar(50), 
`description` text NOT NULL, 
`protocol_link` varchar(300) NOT NULL, 
`protocol` varchar(300) NOT NULL, 
`budget_status_id` int(11) DEFAULT 1, 
`created` datetime DEFAULT NULL, 
`modified` datetime DEFAULT NULL,
PRIMARY KEY (  `id` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

*/

App::uses('Model', 'Model');

class Orcamento extends AppModel{
    public $name = 'Budget';
    
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
        'description' => array(
            'Descreva em poucas palavras sobre o seu projeto' => array(
                'rule' => array('notEmpty'),
                'message' => 'Descreva em poucas palavras sobre o seu projeto'
            )
        ),
    );
}

