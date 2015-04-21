<?php

class Menu extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('menu/js/script.js');
    }
    
    public function index() {
        $this->view->title = 'Меню';
        $this->view->menuList = $this->model->menuList();
        $this->view->todaysMenuList = $this->model->todaysMenuList();
        $this->view->foodCategoryList = $this->model->getEnumValues('foodcategory');
        $this->view->foodMeasuerList = $this->model->getEnumValues('foodmeasure');
        
        $this->view->render('header');
        $this->view->render('menu/index');
        $this->view->render('footer');
    }
    
    public function create(){
        
        $data = array(
            'foodcategory' => $_POST['foodcategory'],
            'foodmeasure' => $_POST['foodmeasure'],
            'foodsize' => $_POST['foodsize'],
            'foodname' => $_POST['foodname'],
            'foodprice' => $_POST['foodprice']
        );
        
        $this->model->create($data);
        header('location:' . URL .'menu');
    }
    public function todaysMenu(){
        
        $data = $_POST['check_list'];
        
        $this->model->todaysMenu($data);
        header('location:' . URL .'menu');
    }
    
    public function edit($id){
        $this->view->menu = $this->model->menuSingleList($id);
        $this->view->foodCategoryList = $this->model->getEnumValues('foodcategory');
        $this->view->foodMeasuerList = $this->model->getEnumValues('foodmeasure');
        
        if(empty($this->view->menu)){
            die('This is an invalid note!');
        }
        
        $this->view->title = 'Редактировать меню';
        
        $this->view->render('header');
        $this->view->render('menu/edit');
        $this->view->render('footer');
    }
    
    public function editSave($foodid){
        $data = array(
            'foodid' => $foodid,
            'foodcategory' => $_POST['foodcategory'],
            'foodmeasure' => $_POST['foodmeasure'],
            'foodsize' => $_POST['foodsize'],
            'foodname' => $_POST['foodname'],
            'foodprice' => $_POST['foodprice']
        );
        //@TODO: Do your error checking!
        
        $this->model->editSave($data);
        header('location:' . URL .'menu');
    }

    public function delete($noteid){
        $this->model->delete($noteid);
        header('location:' . URL .'menu');
    }
    
}