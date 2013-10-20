<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
 
function html_br($val = 1) {
    if(is_numeric($val)) {
        for($i=0; $i<$val; $i++) {
            return '<br />';
        }
    }
}

function html_space($val = 1) {
    if(is_numeric($val)) {
        for($i=0; $i<$val; $i++) {
            return '&nbsp;';
        }
    }
}

function html_heading($val = '1', $teks = '', $class = '') {   
    if(is_numeric($val) && $val < 7) {
        $data  = '<h'.$val;        
        $data .=(!empty($class) ? ' class="'.$class.'"' : ''); 
        $data .= '>'.$teks.'</h'.$val.'>';
        
        return $data;
    }
}

function html_anchor($link = '', $teks = '', $target = '') {
    $data  = '<a href="'.$link.'"';
    $data .=(!empty($target) ? ' target="'.$target.'"' : '');
    $data .= '>'.$teks.'</a>';
    
    return $data;
}

function html_img($src, $alt = '', $class = '') {
    $data  = '<img src="'.$src.'"';    
    $data .=(!empty($alt) ? ' alt="'.$alt.'"' : '');    
    $data .=(!empty($class) ? ' class="'.$class.'"' : '').' />';  
    
    return $data;    
}

function html_input($type, $param = array()) {
    if(is_array($param)) {
        foreach($param as $value) 
        {
            $params[] = $value;
        }
                      
        $params = implode(' ', $params);        
    }
    
    return '<input type="'.$type.'" '.$params.' />';    
}
    
function html_textarea($param = '', $value = '') {
    if(is_array($param)) {
        foreach($param as $values) 
        {
            $params[] = $values;
        }
                      
        $params = implode(' ', $params);    
    }    
    
    return '<textarea '.$params.'>'.$value.'</textarea>';
}

function html_button($type = '', $class = '', $value = '') {
    $data = '<button';    
    $data .= (!empty($type) ? ' type="'.$type.'"' : '');
    $data .= (!empty($class) ? ' class="'.$class.'"' : '');
    $data .= '>'.(!empty($value) ? $value : '').'</button>';
    
    return $data;
}

function html_select($name = '', $default = '', $value = array()) {
    $data = '<select name="'.$name.'">';    
    $data .= (!empty($default) ? '<option value="0" selected>-'.$default.'-</option>' : '');
    
    if(is_array($value)) {
        foreach($value as $key=>$val) {
            $data .= '<option value="'.$key.'">'.$val.'</option>';    
        }    
    }    
    
    $data .= '</select>';
    
    return $data;
}

?>