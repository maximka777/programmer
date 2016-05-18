<!DOCTYPE html>
<html lang="ru">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: {$title}</title>
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <h1>{$title}</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2"  class="reg-form">
            <form action="save_user.php" method="post" enctype="multipart/form-data">
                <p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <p>
                    <label>Ваш логин:<br></label>
                    <input name="login" type="text" size="15" maxlength="30">
                </p>
                <p>
                    <label>Ваш пароль:<br></label>
                    <input name="password" type="password" size="15" maxlength="64">
                </p>
                <p>
                    <label>Ваш E-Mail:<br></label>
                    <input name="mail" type="email" size="15" maxlength="40">
                </p>
                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <label>Аватар:<br></label>
                    <input type="file" name="icon" accept="image/*">
                </p>
                <p>
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </p>
            </form>
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>