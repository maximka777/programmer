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
            <form action="book_save.php" method="post" enctype="multipart/form-data" style="width: 100%">
                <p>
                    <b style="color: red;">{$error_message}</b>
                </p>
                <p>
                    <label>Название:<br></label>
                    <input name="name" type="text"maxlength="100">
                </p>
                <p>
                    <label>Автор:<br></label>
                    <input name="author" type="text" size="15" maxlength="100">
                </p>
                <p>
                    <label>Год издания:<br></label>
                    <input name="year" type="text" size="15" maxlength="100">
                </p>
                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
                    <label>Изображение:<br></label>
                    <input type="file" name="img" accept="image/*">
                </p>
                <p>
                    <label>Файл книги:<br></label>
                    <input type="file" name="book">
                </p>
                <p><select size="1" name="cat">
                    <option active value=0>Выберите категорию</option>
                    {foreach from=$cats item=$cat}
                        <option value={$cat.Category_id}>{$cat.Name}</option>
                    {/foreach}
                </select></p>
                <p>
                    <label>Описание:<br></label>
                    <textarea name="text" type="text" cols="20" rows="5"></textarea> 
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