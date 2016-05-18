<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Новый пароль</title>
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <form action="change_pass.php" method="post">
            	<p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <h4>Новый пароль</h4>
	            <input type="password" name="pass">
	            <input type="hidden" name="activation" value="{$activation}">
	            <input type="submit" value="OK">
            </form>
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>