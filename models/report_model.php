<?php

class Report_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function report($data){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total '
                               . 'FROM users, orders WHERE users.userid = orders.userid AND ordertime BETWEEN :ordertime1  AND  :ordertime2 '
                               . 'GROUP BY orders.foodid, orders.userid, orders.ordertime '
                               . 'ORDER BY orders.userid, orders.ordertime', array('ordertime1' => $data['date1'], 'ordertime2' => $data['date2']));
    }
    
    public function reportSingle($data){
        return $this->db->select('SELECT *, SUM(orderquantity) AS quantity, SUM(ordersum) AS total '
                               . 'FROM orders WHERE userid = :userid AND ordertime BETWEEN :ordertime1 AND :ordertime2 '
                               . 'GROUP BY foodid, userid, ordertime '
                               . 'ORDER BY ordertime', array('ordertime1' => $data['date1'], 'ordertime2' => $data['date2'], 'userid' => $data['userid']));
    }
    public function payment($orderid){
        $status = array(
            'status' => 2
        );
        $this->db->update('orders', $status, "orderid = '{$orderid}'");
    }
}