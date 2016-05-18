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
        <div class="col-lg-12">
            <h1>Ответы здесь</h1>
            {if $logged == 1}
                <a href="theme_add.php"><button>Добавить тему</button></a>
            {/if}
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!--table class="forumtable" border="1"-->
            <table class="table table-hover forumtable">
                <thead>
                    <tr>
                        <td><b>Дата создания</b></td>
                        <td><b>Тема</b></td>
                        <td><b>Автор</b></td>
                        <td><b>Сообщений</b></td>
                    </tr>
                </thead>
                {foreach from=$themes item=theme}
                    <tr>
                        <td>{$theme.Date}</td>
                        <td><a href="theme.php?Theme_id={$theme.Theme_id}">{$theme.Question}</a></td>
                        <td><a href="userpage.php?user={$theme.Name}">{$theme.Name}</a></td>
                        <td>{$theme.Count}</td>
                    </tr>
                {/foreach}
            </table>            
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>