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
        <div class="col-lg-12">
                <h1>{$title}</h1>
                <!--{$usertype} - {$username} - {$logged}<br-->
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3" style="border-right: 2px dotted blue; height: 100%;">
            <ul style="list-style: none">
                <li><a href="admin.php?page=userlist">Список пользователей</a></li>
                <li><a href="admin.php?page=newslist">Список новостей</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            {if $page == "userlist"}
                {include file='userlist.tpl'}
            {/if}
            {if $page == "newslist"}
                {include file='newslist.tpl'}
            {/if}
        </div>
    </div>
    
</div>

{include file='footer.tpl'}

</body>
</html>
