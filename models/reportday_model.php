<?php

class Reportday_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function orderList(){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total '
                               . 'FROM users, orders, menu WHERE users.userid = orders.userid AND menu.foodid = orders.foodid AND ordertime >= CURDATE() '
                               . 'GROUP BY orders.foodid, orders.userid, orders.status '
                               . 'ORDER BY orders.userid');
    }
    
    public function groupList(){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total '
                               . 'FROM menu, orders WHERE menu.foodid = orders.foodid AND ordertime >= CURDATE() '
                               . 'GROUP BY orders.foodid');
    }
    
    public function groupListOffice(){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total '
                               . 'FROM menu, orders, users WHERE users.userid = orders.userid AND menu.foodid = orders.foodid AND ordertime >= CURDATE() '
                               . 'GROUP BY orders.foodid, users.office '
                               . 'ORDER BY users.office');
    }
    
    public function closereport($data){
        foreach ($data as $value){
            $status = array(
                'status' => 1
            );
            
            $this->db->update('orders', $status, "orderid = '{$value}'");
        }
    }
    
    public function orderSingle($orderid){
        return $this->db->select('SELECT * FROM orders WHERE orderid = :orderid', array(':orderid' => $orderid));
    }
    
    public function editSave($data){
        $postData = array(
            'orderquantity' => $data['orderquantity'],
            'orderprice' => $data['orderprice'],
            'ordersum' => $data['ordersum']
        );
        $this->db->update('orders', $postData, "`orderid` = {$data['orderid']}");
    }
    
    public function delete($orderid){
        $this->db->delete('orders', "orderid = '$orderid'");
    }
    
}