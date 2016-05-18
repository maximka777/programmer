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
            <form action="news_save.php" method="post" enctype="multipart/form-data">
                <p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <p>
                    <label>Название:<br></label>
                    <input name="name" type="text" size="15" maxlength="500">
                </p>
                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <label>Изображение:<br></label>
                    <input type="file" name="img" accept="image/*">
                </p>
                <p>
                    <label>Текст:<br></label>
                    <textarea name="text" type="text" cols="20" rows="5"></textarea> 
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