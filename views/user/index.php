<?php if (Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
<h1>Пользователи</h1>
<form action="<?php echo URL; ?>user/create" method="post" class="login">
    <dl>
        <dd>
            <label>Логин</label>
        </dd>
        <dt>
        <input type="text" name="login" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Пароль</label></dd>
        <dt>
            <input type="password" name="password" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Имя</label></dd>
        <dt>
            <input type="text" name="name" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Фамилия</label></dd>
        <dt>
            <input type="text" name="surname" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Офис</label></dd>
        <dt>
            <input type="number" name="office" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Роль</label></dd>
        <dt>
            <select name="role">
                <option value="default">Default</option>
                <option value="admin">Admin</option>
            </select>
        </dt>
    </dl>
    <p class="ta-r"><input type="submit" value="Сохранить" /></p>
</form>

<hr />

<table class="food_menu">
    <tr>
        <td>ID Пользователя</td>
        <td>Логин</td>
        <td>Роль</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Офис</td>
        <td></td>
    </tr>
<?php
    foreach ($this->userList as $key => $value){
        echo '<tr>';
        echo '<td>'. $value['userid'] .'</td>';
        echo '<td>'. $value['login'] .'</td>';
        echo '<td>'. $value['role'] .'</td>';
        echo '<td>'. $value['name'] .'</td>';
        echo '<td>'. $value['surname'] .'</td>';
        echo '<td>'. $value['office'] .'</td>';
        echo '<td>';
        if($value['role'] !== 'owner'){echo '<a href="'.URL.'user/edit/'.$value['userid'].'">Редактировать</a>'
        . ' <a class="delete" href="'.URL.'user/delete/'.$value['userid'].'">Удалить</a>';}
        echo '</td></tr>';
    }
?>
</table>
<?php else: ?>
<p>У вас нет прав для доступа к этой странице.</p>
<?php endif; ?>