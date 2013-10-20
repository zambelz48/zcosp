<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

/**
 * Load semua plugin yang ada 
 **/
$dir = ENGINE_PATH.'plugin';

if(is_dir($dir)) {
    $iterator = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {                    
        if ($file->isFile()) {
            if($file->getFilename() == 'plugin.php') {
                //echo $file->getPath().DS.$file->getFilename().'<br />';
                load_file($file->getPath().DS, $file->getFilename());
            }           
        }
    }
}

?>