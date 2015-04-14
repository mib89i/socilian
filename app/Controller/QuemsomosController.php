<?php

App::uses('AppController', 'Controller');

class QuemsomosController extends AppController {
    public function index() {
        $this->set('title_for_layout', 'Quem Somos');
    }
}