<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: {$title}</title>
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h3>{$book.Name}</h3>
            <img src="{$book.Image}" width="200"><br>
            <small>Автор: <b>{$book.Author}</b></small>
            <small>Год издания: <b>{$book.Year}</b></small><br><br>
            <small>Описание: </small>
            <p class="paragraph">{$book.Description}</p>
            {if $logged == 1}
                <a href="{$book.Link}">Скачать</a>
            {else}
                <h6>Ссылка на скачивание видна только авторизованным пользователям.</h6>
            {/if}
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>