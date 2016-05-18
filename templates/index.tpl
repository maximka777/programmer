<!DOCTYPE html>
<html lang="en">
<head>
    {include file='styles.tpl'}
    <title>Programmer.by :: Главная</title>
</head>
<body>

{include file='menu.tpl'}

<div class="container main">
    <div class="row">
        <div class="col-lg-12">
                <h1>Главная</h1>
                <!--{$usertype} - {$username} - {$logged}<br-->
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <p>Вас приветствует <b><a href="index.php">Programmer.by!!!</a></b> Это отличный ресурс для начинающих и опытных программистов.
               На данном сайте публикуются последние <b><a href="news.php">новости IT</a></b>. Если вы не знаете, какую книгу прочитать
               для начала или углубить свои знания в какой-то области, вы можете зайти в раздел <b><a href="books.php">литература</a></b>.Вы ищете работу - найдите интересующую вас вакансию в разделе <b><a href="jobs.php">работа</a></b>. Интересующие вопросы и насущные проблемы
               вы можете обсудить на <b><a href="forum.php">форуме</a></b>.</p>
            <!--div class="container-fluid hello">
                <img src="images/hello.gif">
            </div-->
            <hr>
        </div>
    </div>
    {if $logged != 1}
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 enterform">
            <form method="post" action="login.php">
                <h3>Войдите в свой аккаунт</h3>
                <div class="contatiner">
                    <div class="row">
                        <!--div class="col-lg-3">Логин<br><br>Пароль</div-->
                        <div class="col-lg-12">
                            <input placeholder="Login" type="text" name="login"><br><br>
                            <input placeholder="Password" type="password" name="pass"><br><br>
                            <p>
                                <b style="color: red;">{$error_message}</b>
                            </p>
                            <div class="btn-group">
                                <input type="submit" class="btn btn-default" value="Войти"><br>
                            </div>
                            <a href="pass_restore_view.php">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {/if}
</div>

{include file='footer.tpl'}

</body>
</html>
