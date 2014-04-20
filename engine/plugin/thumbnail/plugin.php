<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

function img_upload($file_src, $dir, $file_name, $attr, $width = 165, $height = 165, $save_base_img = true) {
	/*file gambar yang di upload*/
	$file_upload = $dir . $file_name;

    if($save_base_img == true) {
        /*simpan gambarnya dalam ukuran sebenarnya*/
	   move_uploaded_file($file_src, $file_upload);    
    }	

	/*dapatkan identitas file asli dari file gambar yang diupload*/
	$img_src    = imagecreatefromjpeg($file_upload);
	$img_width	= imageSX($img_src);
	$img_height = imageSY($img_src);

	/*fungsi untuk mengubah ukuran gambar*/
	$img_thumb	= imagecreatetruecolor($width, $height);
	imagecopyresampled($img_thumb, $img_src, 0, 0, 0, 0, $width, $height, $img_width, $img_height);

	/*simpan gambar yang versi thumbnailnya*/
	imagejpeg($img_thumb, $dir.$attr.'_'.$file_name);

	/*hapus objek gambar yang ada di memori*/
	imagedestroy($img_src);
	imagedestroy($img_thumb);
}