<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: Работа</title>
</head>
<body>
{include file='menu.tpl'}
<input type="hidden" value="Jobs" id="table">
<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <h1>Найди работу здесь</h1>
            {if $logged == 1}
                <a href="job_add.php"><button>Добавить вакансию</button></a>
            {/if}
            <hr>
        </div>
    </div>
    {foreach from=$jobs item=job}
        <div class="row" id="{$job.Job_id}">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="container-fluid job">
                    <h4><b>{$job.Name}</b></h4>
                    {if $usertype == "Контент-менеджер" || $usertype == "Администратор"}
                        <button id="delete" type="button">Удалить</button><br>
                        <input type="hidden" value="{$job.Job_id}" id="itemid">
                    {/if}  
                    <u>Работодатель</u>:<br>{$job.Employer}<br>
                    <u>Описание</u>:<br>{$job.Description}<br>
                    <u>Требования</u>:<br>{$job.Requirements}<br>
                    <u>Зарплата</u>:<br>{$job.Salary}<br>
                    <u>Телефон</u>:<br>{$job.Number}<br>
                    <u>Почта</u>:<br>{$job.Mail}<br>
                    <u>Дата добавления</u>:<br>{$job.Date}<br>
                </div>
                <hr>
            </div>
        </div>
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