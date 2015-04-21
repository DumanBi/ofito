<?php

class Report extends Controller {
    
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->view->js = array('report/js/script.js');
        
    }
    
    public function index() {
        $this->view->title = 'Отчеты';

        $this->view->render('header');
        $this->view->render('report/index');
        $this->view->render('footer');     
    }
    
    public function report(){  
        $this->view->date1 = $_REQUEST['date1'];
        $this->view->date2 = $_REQUEST['date2'];
        $data = array(
            'date1' => $this->view->date1,
            'date2' => $this->view->date2
        );
        $this->view->reportList = $this->model->report($data); 
        $this->view->render('header');
        $this->view->render('report/index');
        $this->view->render('footer');
//        echo '<pre>';
//        print_r($this->view->reportList);
//        echo '</pre>';
    }
    public function reportSingle(){  
        $this->view->date1 = $_REQUEST['date1'];
        $this->view->date2 = $_REQUEST['date2'];
        $data = array(
            'date1' => $this->view->date1,
            'date2' => $this->view->date2,
            'userid' => $_SESSION['userid']
        );
        $this->view->reportSingleList = $this->model->reportSingle($data); 
        $this->view->render('header');
        $this->view->render('report/index');
        $this->view->render('footer');

    }
    
    public function payment($orderid){
        $this->view->date1 = $_REQUEST['date1'];
        $this->view->date2 = $_REQUEST['date2'];
        $this->model->payment($orderid);
        header('location:' . URL .'report/report?date1='.$this->view->date1.'&date2='.$this->view->date2.'#'.$orderid);
    }
}