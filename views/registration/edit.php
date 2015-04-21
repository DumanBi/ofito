<h1>Редактирование данных</h1>

<form action="<?php echo URL; ?>registration/editSave/<?php echo $_SESSION['userid']; ?>" method="post" class="login">
    <dl>
        <dd>
            <label>Логин</label>
        </dd>
        <dt>
        <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Пароль</label>
        </dd>
        <dt>
            <input type="password" name="password" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Имя</label></dd>
        <dt>
            <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Фамилия</label></dd>
        <dt>
            <input type="text" name="surname" value="<?php echo $_SESSION['surname']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Офис</label></dd>
        <dt>
            <input type="number" name="office" value="<?php echo $_SESSION['office']; ?>" />
        </dt>
    </dl>
    <?php
    if($_SESSION['role'] == 'default'){
        echo '<input type="hidden" value="default" name="role" />';
    }elseif ($_SESSION['role'] == 'admin') {
        echo '<input type="hidden" value="admin" name="role" />';
    }elseif ($_SESSION['role'] == 'owner') {
        echo '<input type="hidden" value="owner" name="role" />';
    }
    ?>
    <p class="ta-r"><input value="Сохранить" type="submit" /></p>
    <br />
<!--<table>
<?php
//    foreach ($this->userList as $key => $value){
//        echo '<tr>';
//        echo '<td>'. $value['userid'] .'</td>';
//        echo '<td>'. $value['login'] .'</td>';
//        echo '<td>'. $value['role'] .'</td>';
//        echo '<td><a href="'.URL.'user/edit/'.$value['userid'].'">Edit</a>'
//               . ' <a class="delete" href="'.URL.'user/delete/'.$value['userid'].'">Delete</a></td>';
//        echo '</tr>';
//    }
?>
</table>-->
</form>