<?php

class Registration_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function checkUser($login){
        $sth = $this->db->select('SELECT userid, role, login, name, surname, office FROM users WHERE login = :login', array(':login' => $login));
        if(empty($sth)){
            return FALSE;
        }  else {
            return $sth[0]['login'];
        }
    }
    
    public function userList(){
        return $this->db->select('SELECT userid, role, login, name, surname, office FROM users');
    }
    
    public function userSingleList($userid){
        return $this->db->select('SELECT userid, role, login, name, surname, office FROM users WHERE userid = :userid', array(':userid' => $userid)); 
    }

    public function create($data){
        
        $this->db->insert('users', array(
            'role' => $data['role'],
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'office' => $data['office']
        ));
        
        $sth = $this->db->select('SELECT userid FROM users WHERE login = :login', array(':login' => $data['login']));

        Session::init();
        Session::set('role', $data['role']);
        Session::set('userid', $sth[0]['userid']);
        Session::set('loggedIn', true);
        Session::set('login', $data['login']);
        Session::set('name', $data['name']);
        Session::set('surname', $data['surname']);
        Session::set('office', $data['office']);

    }
    
    public function editSave($data){
        $postData = array(
            'role' => $data['role'],
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'office' => $data['office']
        );
        $this->db->update('users', $postData, "`userid` = {$data['userid']}");
        
        Session::init();
        Session::set('role', $data['role']);
        Session::set('userid', $data['userid']);
        Session::set('loggedIn', true);
        Session::set('login', $data['login']);
        Session::set('name', $data['name']);
        Session::set('surname', $data['surname']);
        Session::set('office', $data['office']);
        
    }
    
    public function delete($userid){
        $result = $this->db->select('SELECT role FROM users WHERE userid = :userid', array(':userid' => $userid));
        if($result[0]['role'] == 'owner'){
            return false;
        }
        
        $this->db->delete('users', "userid = '$userid'");
    }
}