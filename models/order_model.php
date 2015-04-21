<?php

class Order_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function cart($data){
        date_default_timezone_set('Asia/Almaty');
        
        $this->db->insert('orders', array(
            'userid' => $_SESSION['userid'],
            'foodid' => $data['foodid'],
            'ordersum' => $data['ordersum'],
            'orderquantity' => $data['orderquantity'],
            'ordertime' => date('y-m-d'),
            'orderprice' => $data['orderprice'],
            'foodname' => $data['foodname']
        ));   
        
    }
    
    public function orderList(){
        return $this->db->select('SELECT * FROM menu, todaysmenu WHERE menu.foodid = todaysmenu.foodid AND date_added >= CURDATE()');
    }
    
    public function userOrderList(){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total FROM orders '
                               . 'WHERE userid = :user AND ordertime >= CURDATE() GROUP BY foodid, status', array('user' => $_SESSION['userid']));
    }
    
    public function foodPrice($foodid){
        return $this->db->select('SELECT * FROM menu WHERE foodid = :foodid', array('foodid' => $foodid));
    }
    
    public function singleOrder($order_list){
        foreach ($order_list as $value){
            $sth[] = $this->db->select('SELECT * FROM menu WHERE foodid = :foodid', array('foodid' => $value));
        }     
        return $sth;
    }
    
    public function delete($orderid){
        $this->db->delete('orders', "orderid = '$orderid' AND userid = '{$_SESSION['userid']}'");
    }

}