<?php

class Reportday extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('reportday/js/script.js');
    }
    
    public function index() {
        $this->view->title = 'Отчет дня';
        $this->view->orderList = $this->model->orderList();
        $this->view->groupList = $this->model->groupList();
        $this->view->groupListOffice = $this->model->groupListOffice();
        
        $this->view->render('header');
        $this->view->render('reportday/index');
        $this->view->render('footer');

    }
    
    public function closereport() {
        $data = $_POST['orderid'];

        $this->model->closereport($data);        
        header('location:' . URL .'reportday');
    }
    
    public function edit($id){
        $this->view->title = 'Редактировать цену';
        $this->view->orderSingle = $this->model->orderSingle($id);

        $this->view->render('header');
        $this->view->render('reportday/edit');
        $this->view->render('footer');
    }
    
    public function editSave($orderid){
        $data = array(
            'orderid' => $orderid,
            'orderquantity' => $_POST['orderquantity'],
            'orderprice' => $_POST['orderprice'],
            'ordersum' => $_POST['ordersum']
        );
        
        //@TODO: Do your error checking!
        
        $this->model->editSave($data);
        header('location:' . URL .'reportday');
    }
    
    public function delete($orderid){
        $this->model->delete($orderid);
        header('location:' . URL .'reportday');
    }
    
}