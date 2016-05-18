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
        <div class="col-lg-12"  class="reg-form">
            <form action="theme_save.php" method="post" enctype="multipart/form-data">
                <p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <p>
                    <label>Вопрос:<br></label>
                    <input name="question" type="text" size="15" maxlength="100">
                </p>
                <p>
                    <input type="submit" name="submit" value="Добавить">
                </p>
            </form>
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>