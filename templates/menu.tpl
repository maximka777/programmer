<div class="container-fluid">
    <div class="row">
        <div class="navbar navbar-inverse navbar-fixed-top navbar-menu menu">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only">Show menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Programmer.by</a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="news.php">Новости</a></li>
                        <li><a href="books.php">Литература</a></li>
                        <li><a href="jobs.php">Работа</a></li>
                        <li><a href="forum.php">Форум</a></li>
                        {if $usertype == "Администратор"}
                            <li><a href="admin.php">Панель администратора</a></li>
                        {/if}
                    </ul>
                    {if $logged == 1}
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="userpage.php">{$username}</a></li>
                            <li><a href="logout.php">Выйти</a></li>
                        </ul>
                    {else}
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Войти</a></li>
                            <li><a href="reg.php">Регистрация</a></li>
                        </ul>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>
