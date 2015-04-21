<?php if (Session::get('role') == 'owner' || Session::get('role') == 'admin'): ?>
<h1>Редактирование пользователя</h1>
<?php if ($this->user[0]['role'] !== 'owner'): ?>
<form action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>" method="post" class="login">
    <dl>
        <dd>
            <label>Логин</label>
        </dd>
        <dt>
        <input type="text" name="login" value="<?php echo $this->user[0]['login']; ?>" />
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
            <input type="text" name="name" value="<?php echo $this->user[0]['name']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Фамилия</label></dd>
        <dt>
            <input type="text" name="surname" value="<?php echo $this->user[0]['surname']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Офис</label></dd>
        <dt>
            <input type="number" name="office" value="<?php echo $this->user[0]['office']; ?>" />
        </dt>
    </dl>
    <dl>
        <dd>
            <label>Role</label></dd>
        <dt>
            <select name="role">
                <option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
                <option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>
        </dt>
    </dl>
    <p class="ta-r"><input type="submit" value='Сохранить' /></p>
</form>
<?php else: ?>
<p>Вы не можете редактировать разработчика сайта.</p>
<?php endif; ?>
<?php else: ?>
<p>У вас нет прав для доступа к этой странице.</p>
<?php endif; ?>