	<h3>Список новостей</h3>
	<table>
		{foreach from=$newslist item=$new}
			<tr>	
				<td>{$new.Date}</td>
				<td><a href="new.php?New_id={$new.New_id}">{$new.Name|truncate:50:'...'}</a></td>
				<td><a href="del_item.php?table=News&id={$new.New_id}">Удалить</a></td>
			</tr>
		{/foreach}
	</table>
