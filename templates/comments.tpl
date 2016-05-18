{for $cur_rec=(($cur_page - 1) * $per_page) to (($cur_page - 1) * $per_page + $per_page - 1)}
{if $cur_rec < $row_count}
    <div class="theme-comment">
        <table>
            <tr class="comment-header">
            <td><a href="userpage.php?user={$comments[$cur_rec].Name}">{$comments[$cur_rec].Name}</a></td>
            <td>Дата: {$comments[$cur_rec].Date}</td>
            
            </tr>
            <tr>
            <td style="width:120px;"><img src="{$comments[$cur_rec].Avatar}" width="100" height="100"></td>
            <td><p>{$comments[$cur_rec].Text}</p></td>
            </tr>
            {if $username == $comments[$cur_rec].Name}
                <tr>
                    <td><a href="del_comment.php?theme_id={$comments[$cur_rec].Theme_id}&table={$table}&id={$comments[$cur_rec].Comment_id}">Удалить</a></td>
                </tr>
            {/if}
        </table>
    </div>
{/if}
{/for}

<div class="" style="background-color: white">
    <table>
        <tr>
        <td>
            <form action="comment_add.php?new_id={$new_id}&theme_id={$theme_id}" method="post">
                <input type="hidden" name="new_id" value ="{$new_id}">
                <input type="hidden" name="theme_id" value ="{$theme_id}">
                <textarea class="forumtextarea" name="comment"></textarea>
                <input type="submit" value="Отправить">
            </form>
        </td>
        </tr>
    </table>
</div>
<br>
{include file='pagination.tpl'}