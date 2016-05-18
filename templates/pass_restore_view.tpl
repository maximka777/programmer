<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Восстановление пароля</title>
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <form action="pass_restore.php" method="post">
            	<p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <h4>Ваш логин</h4>
	            <input type="text" name="login">
	            <input type="submit" value="OK">
            </form>
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>