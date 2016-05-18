<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Programmer.by :: {$new.Name}</title>
    {include file='styles.tpl'}
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <h3>{$new[0]}</h3>
            <small>Дата: {$new.Date}</small><br>
            <img src="{$new.Image}" width="300">
            <p>{$new.Text}</p>
            <br>
            <small><b>Автор:</b><a href="userpage.php?user={$new.Name}">{$new.Name}</a></small>
            <hr>
            {if $logged == 1}
                <h4>Комментарии</h4>
                {include file='comments.tpl'}
            {else}
                <h6>Комментарии доступны только зарегистрированным пользователям.</h6>
            {/if}
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>