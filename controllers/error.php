<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'Ошибка';
        $this->view->msg = '<div class="ta-c"><h1 class="red">404</h1>Страница не найдена</div>';
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}