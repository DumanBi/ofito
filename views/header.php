<!doctype html>
<html>
    <head>
        <title><?=(isset($this->title)) ? $this->title : 'Заказ еды в офис'; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo URL ?>public/images/favicon.ico" type="image/x-icon" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
        <link href="<?php echo URL ?>public/css/less.less" rel="stylesheet/less" type="text/css" >
        <script src="<?php echo URL ?>public/js/less.js" type="text/javascript"></script>
        <script src="<?php echo URL ?>public/js/script.js" type="text/javascript"></script>
        <script src="<?php echo URL ?>public/js/cookie.js" type="text/javascript"></script>
        <script src="<?php echo URL ?>public/js/scrollPlugin.js" type="text/javascript"></script>
        <script src="<?php echo URL ?>public/js/jquery.validate.min.js" type="text/javascript"></script>
        <?php
        if(isset($this->js)){
            foreach ($this->js as $js){
                echo '<script src="'.URL.'views/'.$js.'" type="text/javascript"></script>';
            }
        }
        ?>
    </head>
    <body>
        <?php Session::init(); ?>
        <section class="template">
            <header>
                <?php if (Session::get('loggedIn') == true): ?>
                    <a href="<?php echo URL ?>order">Заказать</a>
                    <a href="<?php echo URL ?>report">Отчеты</a>
                    <?php if (Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
                        <a href="<?php echo URL ?>user">Пользователи</a>                  
                        <a href="<?php echo URL ?>menu">Меню</a>
                        <a href="<?php echo URL ?>reportday">Отчет дня</a>
                    <?php endif; ?>
                    <a href="<?php echo URL ?>registration/edit">Редактирование</a>
                    <div class="fl-r">
                        <?php echo $_SESSION['surname'] . ' ' . $_SESSION['name'] . '&ensp;&ensp;&ensp;'; ?>
                        <a href="<?php echo URL ?>login/logout">Выйти</a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo URL ?>login">Авторизация</a>
                    <a href="<?php echo URL ?>registration">Регистрация</a>
                <?php endif; ?>
                <a href="<?php echo URL ?>help">Помощь</a>
            </header>
            <main>
    