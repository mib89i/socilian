<?php

/* 
DROP TABLE IF EXISTS `budgets_status`; 

CREATE TABLE `budgets_status` ( 
`id` int(11) NOT NULL AUTO_INCREMENT, 
`description` varchar(150) NOT NULL, 
`created` datetime DEFAULT NULL, 
`modified` datetime DEFAULT NULL,
PRIMARY KEY (  `id` )
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
 
INSERT INTO budgets_status (description) VALUES ('Análise');
INSERT INTO budgets_status (description) VALUES ('Atendimento');
INSERT INTO budgets_status (description) VALUES ('Concluído');

*/

App::uses('Model', 'Model');

class OrcamentoStatus extends AppModel{
    public $name = 'BudgetStatus';
}