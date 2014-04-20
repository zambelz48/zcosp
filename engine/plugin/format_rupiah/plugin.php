<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

function format_rupiah($angka) {

    if(!empty($angka)) {
    
        return 'Rp ' . number_format($angka,0,',','.').',-';
  
    }

}