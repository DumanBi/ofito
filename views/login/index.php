<?php if (Session::get('loggedIn') == false): ?>
<h1>Авторизация</h1>

<form action="login/run" method="post" class="login" id="login">
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
    <p style="padding-left: 225px;"><input type="submit" value="Войти" /></p>
</form>
<?php else: ?>
<p>Вы уже авторизованы.</p>
<?php endif; ?>