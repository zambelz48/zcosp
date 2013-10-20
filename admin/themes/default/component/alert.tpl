{if $alert == 'alert'}
    <div class="alert alert-block"> 
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">{$alert_heading}</h4>
        {$alert_message} 
    </div>

{elseif $alert == 'success'}
    <div class="alert alert-success alert-block"> 
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">{$alert_heading}</h4>
        {$alert_message}
    </div>

{elseif $alert == 'info'}
    <div class="alert alert-info alert-block"> 
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">{$alert_heading}</h4>
        {$alert_message}
    </div>
    
{elseif $alert == 'error'}
    <div class="alert alert-error alert-block"> 
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">{$alert_heading}</h4>
        {$alert_message}
    </div>
{/if}