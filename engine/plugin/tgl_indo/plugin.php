<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/lang/indonesia
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */
 
function date_id($tgl) {
	$array_bulan = array( "01" => "Januari",
                          "02" => "Februari",
                          "03" => "Maret",
						  "04" => "April",
						  "05" => "Mei",
						  "06" => "Juni",
						  "07" => "Juli",
						  "08" => "Agustus",
						  "09" => "September",
		                  "10" => "Oktober",
						  "11" => "November",
						  "12" => "Desember" 
                        );

	$bulan = substr($tgl, 5,2);
	$tahun = substr($tgl, 0,4);
	$tgl   = substr($tgl, 8,2);

	$date_id = $tgl.'&nbsp;'.$array_bulan[$bulan].'&nbsp;'.$tahun;
    
	return $date_id;
}