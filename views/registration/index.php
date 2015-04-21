<?php if (Session::get('loggedIn') == false): ?>
<h1>Регистрация</h1>

<form action="<?php echo URL; ?>registration/create" method="post" class="login" id="registration">
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
    <input type="hidden" value="default" name="role" />
    <p style="padding-left: 135px;"><input value="Зарегистрироваться" type="submit" /></p>
    
</form>
<?php else: ?>
<p>Вы уже зарегистрированы.</p>
<?php endif; ?>