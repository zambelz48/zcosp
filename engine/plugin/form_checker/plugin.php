<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
          
function FormChecker($data = array())
{
    $script = '<script language="javascript">
                    function checker(form){';
    
    foreach($data as $key=>$val)
    {
        $script .= 'if(form.'.$key.'.value == "'.$val.'"){
                        alert("'.ALERT_EMPTY_FIELD.' !");
                        form.'.$key.'.focus();
                        return(false);
                    }';
    }
    
    $script .= '} </script>';
    
    return $script;
}

?>