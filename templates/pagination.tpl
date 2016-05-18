{if $page_count > 1}
<ul type=None class="pagin">
<li></li>
{for $page_number=1 to $page_count}
    <li><a href="{$cur_url}{$get_params}&page={$page_number}"><button>{$page_number}</button></a></li>
{/for}
</ul>
{/if}