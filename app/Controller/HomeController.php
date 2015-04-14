<?php

App::uses('AppController', 'Controller');

class HomeController extends AppController {
    public $uses = array();

    public function index() {
        $this->set('title_for_layout', 'Compartilhando Idéias');
    }
}
