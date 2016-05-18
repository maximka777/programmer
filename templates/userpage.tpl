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
            <h3>{$user.Name}</h3>
            <h6>{$user_get_type}</h6>
            <hr>
            <img src="{$user.Avatar}" class="zoom" width=100 height=100>
            <br>
            <b>Почта: </b><p>{$user.Mail}</p>
            <b>Количество тем: </b><p>{$theme_count}</p>
            <b>Количество сообщений: </b><p>{$msg_count}</p>

        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>