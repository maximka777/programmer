<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Programmer.by :: Книги</title>

    {include file='styles.tpl'}
    <link href="css/literature.css" type="text/css" rel="stylesheet">
</head>
<body>

{include file='menu.tpl'}
<div class="container main">
	<div class="row">
        <div class="col-lg-12">
            <h1>Книги</h1>
            {if $usertype == "Администратор" || $usertype == "Контент-менеджер"}
            	<a href="book_add.php"><button>Добавить книгу</button></a>
            {/if}
            <hr>
        </div>
    </div>

    <div class="row">
	<div class="col-lg-12 themes">
		<ul type=None class="book-genres-list">
			{if $usertype == "Администратор" || $usertype == "Контент-менеджер"}
            	<li><a href="book_cat_add.php"><button>Создать категорию</button></a></li>
            {/if}
			<li><a href="books.php">Все книги</a></li>
				{foreach from=$categories item=category}
					<li><a href="books.php?Category_id={$category.Category_id}">{$category.Name}({$category.Count})</a></li>
				{/foreach}
		</ul>
		<hr>
	</div>
	<div class="col-lg-10 col-lg-offset-1">
		<div class="container marketing">
			<div class="row">
				{*foreach from=$books item=book*}
					{for $cur_rec=(($cur_page - 1) * $per_page) to (($cur_page - 1) * $per_page + $per_page - 1)}

					{if $cur_rec < $row_count}
						<div class="col-lg-6">
						    <div class="container-fluid book">
								<img src="{$books[$cur_rec].Image}" width="200" height="300" alt="image">
								<h5><a href="book.php?Book_id={$books[$cur_rec].Book_id}">{$books[$cur_rec].Name}</a></h5>
								<small>Автор: <b>{$books[$cur_rec].Author}</b></small><br>
								<small>Год издания: <b>{$books[$cur_rec].Year}</b></small>
								{if $usertype == "Контент-менеджер" || $usertype == "Администратор"}
			                        <a style="margin-left: 7px" href="del_item.php?table=Books&id={$books[$cur_rec].Book_id}&book_cat_id={$books[$cur_rec].Category_id}">Удалить</a><br>
			                    {/if}  
						    </div>
						</div>
					{/if}
					{/for}
				{*/foreach*}
			</div>
	    </div>
	</div>
			
</div>
<div class="row">
        <div class="col-lg-12">
			{if $page_count > 1}
			<ul type=None class="pagin">
			<li></li>
			{for $page_number=1 to $page_count}
			    <li><a href="{$cur_url}{$get_params}page={$page_number}"><button>{$page_number}</button></a></li>
			{/for}
			</ul>
			{/if}
		</div>
	</div>
</div>

{include file='footer.tpl'}
</body>
</html>
