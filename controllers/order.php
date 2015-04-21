<?php

class Order extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('order/js/script.js');
    }
    
    public function index() {
        $this->view->title = 'Заказ';
        $this->view->orderList = $this->model->orderList();
        $this->view->userOrderList = $this->model->userOrderList();
        
        $this->view->render('header');
        $this->view->render('order/index');
        $this->view->render('footer');
    }
    
    public function cart($foodid){
        
        $this->view->foodPrice = $this->model->foodPrice($foodid);
        
        if($_POST['orderquantity'] > 0){
            $data = array(
                'foodid' => $foodid,
                'ordersum' => $this->view->foodPrice[0]['foodprice'] * $_POST['orderquantity'],
                'orderquantity' => $_POST['orderquantity'],
                'orderprice' => $this->view->foodPrice[0]['foodprice'],
                'foodname' => $this->view->foodPrice[0]['foodname']
            );
            $this->model->cart($data);
            header('location:' . URL .'order/index');
        }else{
            header('location:' . URL .'order/index');
        }
    }
    
    public function delete($orderid){
        $this->model->delete($orderid);
        header('location:' . URL .'order');
    }
    
}