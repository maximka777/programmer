<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: Форум</title>
</head>
<body>
{include file='menu.tpl'}
<div class="container main">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div style="width: 100%; background-color: #E6ECFF";>
                <p style="padding: 10px">
                    <img style="margin-right: 15px; margin-left: 15px; float: right;" src="{$theme.Avatar}" width="100" height="100">
                    <b><a href="userpage.php?user={$theme.Name}">{$theme.Name}</a></b><br>
                    <b>Тема: {$theme.Question}</b><br><br>
                </p>
            </div>
            {if $logged == 1}
                {include file='comments.tpl'}
            {else}
                <h6>Добавление комментариев доступно только авторизованным пользователям</h6>
            {/if}
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>