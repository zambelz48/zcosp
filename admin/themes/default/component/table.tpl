<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">       
            <div class="widget-box">
                
                <form name="" action="" method="post">
                
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-th-list"></i> </span> 
                        <h5>{$heading}</h5>
                    </div>
                    
                    {if $link_add_title != '' || $link_delete_title != ''} 
                        <div class="widget-title">
                            {if $link_add_title != ''}
                                <span class="icon">
                                    <i class="icon-plus"></i> <b><a href="{$link_add}">{$link_add_title}</a></b>
                                </span>
                            {/if}
                            {if $link_delete_title != '' && $total_data > 0}
                                <span class="icon">
                                    <input type="submit" value="{$link_delete_title}" class="btn btn-mini btn-danger" />
                                </span>
                            {/if}
                        </div>
                    {/if}              
                    
                    <div class="widget-content">                
                        <table class="table table-bordered data-table table-striped with-check">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                                    <!-- Start looping head-->
                                    {foreach from=$tb_head item=head}
                                        {$head}
                                    {/foreach}
                                    <!-- End looping head-->
                                </tr>
                            </thead>                        
                            <tbody>
                                <!-- Start content looping-->
                                {foreach from=$tb_data item=data}
                                    <tr>
                                        <td><input type="checkbox" name="check[]" value="{$data.id}" id="id{$data.no}" /></td>
                                        {include file=$table_content}
                                    </tr>
                                {/foreach}
                                <!-- End content looping-->
                            </tbody>
                        </table>                    
                    </div>
                
                </form>
                
            </div>      
        </div>
    </div>
</div>