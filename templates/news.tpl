<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: Новости</title>
</head>
<body>
{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <h1>Новости</h1>
            {if $usertype == "Администратор" || $usertype == "Контент-менеджер"}
                <a href="news_add.php"><button>Добавить новость</button></a>
            {/if}
            <hr>
        </div>
    </div>
    {foreach from=$news item=new}
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div container-fluid new>
                    <a href="new.php?New_id={$new.New_id}"><h3>{$new[1]}</h3></a>
                    <small>Дата: {$new.Date}</small>     
                    {if $usertype == "Контент-менеджер" || $usertype == "Администратор"}
                        <a style="margin-left: 10px" href="del_item.php?table=News&id={$new.New_id}">Удалить</a>
                    {/if}    <br>           
                    <img src="{$new.Image}" width="300" alt="image">
                    <p class="paragraph">{$new.Text|truncate:500:'...'}</p>
                    <a href="new.php?New_id={$new.New_id}"><small>Подробнее</small></a><br>
                    <small>Автор: <a href="userpage.php?user={$new.Name}">{$new.Name}</a></small>
                    {if $usertype == "Контент-менеджер" || $usertype == "Администратор"}
                    {/if}
                </div>
            </div>
        </div>
        <hr>
    {/foreach}
    <div class="row">
        <div class="col-lg-12">
            {if $page_count > 1}
            <ul type=None class="pagin">
            <li></li>
            {for $page_number=1 to $page_count}
                <li><a href="{$cur_url}?page={$page_number}"><button>{$page_number}</button></a></li>
            {/for}
            </ul>
            {/if}
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>
</html>