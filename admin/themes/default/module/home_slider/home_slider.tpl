<td>
    <a href="{$link_edit}{$data.id}">
        <center>
            <img src="../files/images/slider/slider_{$data.image}" width="80px" height="100px" />
        </center>
    </a>
</td>
<td>{$data.is_active}</td>
<td>{$data.created}</td>
<td>
    {if $data.updated == '0000-00-00 00:00:00'}
        Belum pernah
    {else}
        {$data.updated}
    {/if}
</td>