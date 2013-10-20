<td>
    <a href="{$link_edit}{$data.id}"><b>{$data.name}</b></a>
</td>
<td>{$data.created}</td>
<td>
    {if $data.updated == '0000-00-00 00:00:00'}
        Belum pernah
    {else}
        {$data.updated}
    {/if}
</td>