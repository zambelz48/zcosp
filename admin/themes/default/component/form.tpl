<!--Base form templates-->

<!--Start container-fluid-->
<div class="container-fluid">

    <!--Start row-fluid-->
    <div class="row-fluid">
    
        <!--Start span12-->
        <div class="span12">
            
            {include file='component/alert.tpl'}
            
            <!--Start widget-box-->
            <div class="widget-box">
            
                <div class="widget-title">
                    <span class="icon"> <i class="icon-edit"></i> </span>
                    <h5>{$form_title}</h5>
                </div>
                
                <!--Start widget-content nopadding-->
                <div class="widget-content nopadding">
                
                    {if $tabbed_content == 'yes'}
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            {foreach from=$tab_data item=tab}
                                <li class="{$tab.tab_active}"><a data-toggle="tab" href="#{$tab.tab_link}">{$tab.tab_title}</a></li>
                            {/foreach}
                        </ul>
                    </div> 
                    {/if}
                    
                    <!--Start form-->
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    
                        {if $tabbed_content == 'yes'}
                        <div class="widget-content tab-content">
                            {foreach from=$tab_data item=tab}
                            <div id="{$tab.tab_link}" class="tab-pane {$tab.tab_active}">                                
                                <!--Start loop tab form data-->
                                {foreach from=$tab.tab_data item=form}
                                    <div class="control-group">
                                        {if $form.input != ''}
                                        <label class="control-label">{$form.label}</label>                                    
                                        <div class="controls">
                                            {$form.input}
                                        </div>
                                        {else}
                                        <label class="control-label-no-input">{$form.label}</label>
                                        {/if}
                                    </div>
                                {/foreach}                        
                                <!--End loop tab form data-->                                
                            </div>
                            {/foreach}
                        </div>
                        {else}
                            <!--Start loop form data-->
                            {foreach from=$form_data item=form}
                                <div class="control-group">
                                    {if $form.input != ''}
                                    <label class="control-label">{$form.label}</label>                                    
                                    <div class="controls">
                                        {$form.input}
                                    </div>
                                    {else}
                                    <label class="control-label">{$form.label}</label> 
                                    {/if}
                                </div>
                            {/foreach}                        
                            <!--End loop form data-->
                        {/if}
                                
                        <div class="form-actions">
                            <!--Start loop button-->
                            {foreach from=$form_button item=button}
                                {$button}
                            {/foreach}
                            <!--End loop button-->
                        </div>
                    
                    <!--End form-->    
                    </form> 
                    
                <!--End widget-content nopadding-->    
                </div>
            
            <!--End widget-box-->    
            </div>
        
        <!--End span12-->    
        </div>
    
    <!--End row-fluid-->    
    </div>

<!--End container-fluid-->    
</div>