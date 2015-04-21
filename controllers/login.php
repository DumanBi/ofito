<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/script.js');
        $this->view->js = array('login/js/jquery.validate.min.js');
    }
    
    function index() {
        $this->view->title = 'Авторизация';
        
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }
    
    function run(){
        $this->model->run();
    }
    
    function logout(){
        Session::destroy();
        header('location: '.URL.'login');
        exit;
    }
}