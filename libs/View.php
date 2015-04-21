<?php

class View {

    function __construct() {
        //echo 'this is View<br />';
    }
    
    public function render($name){
        require 'views/' .$name . '.php';
    }
}