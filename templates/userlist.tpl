<a href="admin.php?page=userlist&pagepage=banlist">Бан-лист</a>
<hr>
{if $pagepage == "banlist"}
<h3>Бан-лист</h3>
<table>
	{foreach from=$userlist item=$user}
		{if $user.Status == 0}
			<tr>
				<td><a href="userpage.php?username={$user.Name}">{$user.Name}</a></td>
				<td><a href="ban_user.php?username={$user.Name}">Разблокировать</a></td>
			</tr>
		{/if}
	{/foreach}
</table>
{else}
	<h3>Пользователи</h3>
	<table>
	{foreach from=$userlist item=$user}
		<tr>	
			<td><a href="userpage.php?user={$user.Name}">{$user.Name}</a></td>
			{if $user.Status == 1}
				<td><a href="ban_user.php?username={$user.Name}">Заблокировать</a></td>
			{else}
				<td><a href="ban_user.php?username={$user.Name}">Разблокировать</a></td>
			{/if}
			<td><form action="ch_user_group.php?username={$user.Name}" method=post>
			{include file="group_box.tpl"}
			<button type="submit">Изменить группу</button>
			</form></td>
		</tr>
	{/foreach}
</table>
{/if}
