<td> {$data.id} </td>
<td> <a href="{$link_edit}{$data.id}"><b>{$data.username}</b></a> </td>
<td>
    {if $data.user_active == 'Y'}
        Aktif
    {else}
        Tidak Aktif
    {/if}
</td>
<td>
    {if $data.im_active == 'Y'}
        Aktif
    {else}
        Tidak Aktif
    {/if}
</td>
<td> {$data.reg_date} </td>
<td>
    {if $data.last_update == '0000-00-00 00:00:00'}
        Belum pernah
    {else}
        {$data.last_update}
    {/if}
</td>
<td>
    {if $data.last_login == '0000-00-00 00:00:00'}
        Belum pernah
    {else}
        {$data.last_login}
    {/if}
</td>