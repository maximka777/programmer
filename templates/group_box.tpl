
	<select size=1 name="group_{$user.User_id}">
		{foreach from=$grouplist item=$group}
			{if $group.Group_id == $user.Group_id}
				<option selected value={$group.Group_id}>{$group.Name}</option>
			{else}
				<option value={$group.Group_id}>{$group.Name}</option>
			{/if}
			
		{/foreach}
	</select>
	<input type="hidden" name="id" value="{$user.User_id}">
