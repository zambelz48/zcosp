<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

function readmore($cnt, $length = 400) {
    /*membuat paragraf pada isi article dan mengabaikan tag html*/
    $art_content = htmlentities(strip_tags($cnt));
    
    /*ambil sebanyak 400 karakter*/
    $content     = substr($art_content,0,$length);
	
    /*potong per spasi kalimat*/
    $content     = substr($art_content,0,strrpos($content,' ')); 
    
    return $content;
}

?>