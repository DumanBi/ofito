<?php

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run(){
        $sth = $this->db->prepare("SELECT userid, role, name, surname, office, login FROM users WHERE login = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        
        $data = $sth->fetch();
        
        $count = $sth->rowCount();
        if($count > 0){
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('userid', $data['userid']);
            Session::set('loggedIn', true);
            Session::set('login', $data['login']);
            Session::set('name', $data['name']);
            Session::set('surname', $data['surname']);
            Session::set('office', $data['office']);
            header('location: ../order');
        }  else {
            //show an error!
            header('location: ../login');
        }
    }
}