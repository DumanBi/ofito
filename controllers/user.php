<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('user/js/script.js');
    }
    
    public function index() {
        $this->view->title = 'Пользователи';
        $this->view->userList = $this->model->userList();
        
        $this->view->render('header');
        $this->view->render('user/index');
        $this->view->render('footer');
    }
    
    public function create(){
        
        $data = array();
        
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['office'] = $_POST['office'];
        
        //@TODO: Do your error checking!
        
        $this->model->create($data);
        header('location:' . URL .'user');
    }
    
    public function edit($id){
        $this->view->title = 'Редактировать пользователя';
        $this->view->user = $this->model->userSingleList($id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }
    
    public function editSave($userid){
        $data = array();
        
        $data['userid'] = $userid;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['office'] = $_POST['office'];
        
        //@TODO: Do your error checking!
        
        $this->model->editSave($data);
        header('location:' . URL .'user');
    }

    public function delete($userid){
        $this->model->delete($userid);
        header('location:' . URL .'user');
    }
}