<?php

class Registration extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->js = array('registration/js/script.js');
    }
    
    public function index() {
        $this->view->title = 'Регистрация';
        
        $this->view->render('header');
        $this->view->render('registration/index');
        $this->view->render('footer');
    }
    
    public function create(){
        $data = array();
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['office'])
              && $_POST['login'] !== '' && $_POST['password'] !== '' && $_POST['name'] !== '' && $_POST['surname'] !== '' && $_POST['office'] !== '')
        {
            if($this->model->checkUser($_POST['login']) !== $_POST['login']){
                $data['role'] = $_POST['role'];
                $data['login'] = $_POST['login'];
                $data['password'] = $_POST['password'];
                $data['name'] = $_POST['name'];
                $data['surname'] = $_POST['surname'];
                $data['office'] = $_POST['office'];
                $this->model->create($data);
                header('location:' . URL . 'registration/edit');
            }  else {
                $this->view->render('header');
                echo 'Такой логин уже существует! Введите другой логин';
                $this->view->render('footer');
            }
        }else{
            $this->view->render('header');
            exit('Вы ввели не всю информацию, вернитесь назад и заполните все поля!');
        }
        
    }
    
    public function edit(){
        
        $this->view->title = 'Редактирование данных';
        
        $this->view->render('header');
        $this->view->render('registration/edit');
        $this->view->render('footer');
    }
    
    public function editSave($userid){
        $data = array();
        if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['office'])
              && $_POST['login'] !== '' && $_POST['password'] !== '' && $_POST['name'] !== '' && $_POST['surname'] !== '' && $_POST['office'] !== '')
        {
            $data['userid'] = $userid;
            $data['role'] = $_POST['role'];
            $data['login'] = $_POST['login'];
            $data['password'] = $_POST['password'];
            $data['name'] = $_POST['name'];
            $data['surname'] = $_POST['surname'];
            $data['office'] = $_POST['office'];
            $this->model->editSave($data);
            header('location:' . URL . 'registration/edit');
        }else{
            $this->view->render('header');
            exit('Вы ввели не всю информацию, вернитесь назад и заполните все поля!');
        }
        
        
    }

    public function delete($userid){
        $this->model->delete($userid);
        header('location:' . URL . 'registration/edit');
    }
    
}