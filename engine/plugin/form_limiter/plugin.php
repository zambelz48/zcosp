<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

function form_limiter($element, $maxLength = NULL, $outputStatus) { 

?>
    <script type="text/javascript">
        fieldlimiter.setup({
        	thefield: document.getElementById("<?php echo $element; ?>"), //reference to form field
        	maxlength: <?php echo $maxLength; ?>,
        	statusids: ["<?php echo $outputStatus; ?>"], //id(s) of divs to output characters limit. If non, set to empty array [].
        	onkeypress:function(maxlength, curlength){ //onkeypress event handler
        		//define custom event actions here if desired
        	}
        })
    </script>
    
<?php } ?>