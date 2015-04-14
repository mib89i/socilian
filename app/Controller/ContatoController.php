<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContatoController extends AppController {
    public $uses = array();

    public function index() {
        $this->set('title_for_layout', 'Contato');
        
        if ($this->request->is('post')){

            $email = new CakeEmail();
            $email->config('gmail');

            $email->from(
                array('mibexzooo@gmail.com' => 'PUBL - Contato'))
            ->template('contato_email', 'contato_email_template')
            ->emailFormat('html')
            ->viewVars(array(
                'v_name' => $this->request->data['Contato']['name'],
                'v_email' => $this->request->data['Contato']['email'],
                'v_title' => $this->request->data['Contato']['title'],
                'v_text' => $this->request->data['Contato']['text']
                )
            )
            ->to('claudemir.rtools@hotmail.com') // email de recebimento do formulario de contatos
            ->subject($this->request->data['Contato']['title'])
            ->send();
            
            $this->Session->setFlash(
                'Mensagem enviada com Sucesso!',
                'default',
                array('class' => 'alert alert-info', 'role' => 'alert')
            );
            
            return $this->redirect(array('controller' => 'contato', 'action' => 'index'));
        
        }

    }
    
    
    
}
