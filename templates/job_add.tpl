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
            <form action="job_save.php" method="post" enctype="multipart/form-data">
                <p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <p>
                    <label>Должность:<br></label>
                    <input name="name" type="text" size="15" maxlength="100">
                </p>
                <p>
                    <label>Работодатель:<br></label>
                    <input name="employer" type="text" size="15" maxlength="100">
                </p>
                <p>
                    <label>Описание:<br></label>
                    <textarea name="description" type="text" cols="20" rows="5"></textarea>
                </p>
                <p>
                    <label>Требования:<br></label>
                    <textarea name="requirements" type="text" cols="20" rows="5"></textarea>
                </p>
                <p>
                    <label>Зарплата:<br></label>
                    <input name="salary" type="text" size="15" maxlength="30">
                </p>
                <p>
                    <label>Телефон:<br></label>
                    <input name="number" type="text" size="15" maxlength="20">
                </p>
                <p>
                    <label>Почта:<br></label>
                    <input name="mail" type="email" size="15" maxlength="60">
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