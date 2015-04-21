<?php

class Menu_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function menuList(){
        return $this->db->select('SELECT * FROM menu ORDER by `foodcategory`');
    }
    
    public function menuSingleList($foodid){
        return $this->db->select('SELECT * FROM menu WHERE foodid = :foodid', array('foodid' => $foodid)); 
    }

    public function getEnumValues($field){
        $sth = $this->db->select("SHOW COLUMNS FROM `menu` LIKE '{$field}'");
        preg_match('/^enum\((.*)\)$/', $sth[0]['Type'], $matches);
        foreach( explode(',', $matches[1]) as $value ){
             $enum[] = trim( $value, "'" );
        }
        return $enum;
    }

    public function create($data){
        $this->db->insert('menu', array(
            'foodcategory' => $data['foodcategory'],
            'foodmeasure' => $data['foodmeasure'],
            'foodsize' => $data['foodsize'],
            'foodname' => $data['foodname'],
            'foodprice' => $data['foodprice']
        ));
    }
    public function todaysMenu($data){
        date_default_timezone_set('Asia/Almaty');
        $this->db->clear('todaysmenu');
        foreach ($data as $value){
            $this->db->insert('todaysmenu', array(
                'foodid' => $value,
                'date_added' => date('y-m-d')
            ));
        }
    }
    
    public function todaysMenuList(){
        $sth = $this->db->select('SELECT * FROM menu, todaysmenu WHERE menu.foodid = todaysmenu.foodid AND date_added >= CURDATE()');
//        echo '<pre>';
//        print_r($sth);
//        echo '</pre>';
        return $sth;
    }

        public function editSave($data){
        $postData = array(
            'foodcategory' => $data['foodcategory'],
            'foodmeasure' => $data['foodmeasure'],
            'foodsize' => $data['foodsize'],
            'foodname' => $data['foodname'],
            'foodprice' => $data['foodprice']
        );
        $this->db->update('menu', $postData, "foodid = '{$data['foodid']}'");
    }
    
    public function delete($data){
        $this->db->delete('menu', "foodid = '{$data}'");
    }
}