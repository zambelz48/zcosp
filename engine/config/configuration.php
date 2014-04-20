<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

/******************** PHP Error Reporting *********************
* error_reporting
* Default Value: E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED
* Development Value: E_ALL
* Production Value: E_ALL & ~E_DEPRECATED & ~E_STRICT
*/
$conf['php']['error_reporting'] = E_ALL;


/******************** START Languages Configuration *********************/
$conf['lang']['backend']  = 'english';
$conf['lang']['frontend'] = 'english';
/******************** END Languages Configuration *********************/


/******************** START FileManager4TinyMCE Configuration *********************/
$conf['FM4TinyMCE']['base_url']   = 'localhost';/* URL base of site if you want only relative url leave empty */
$conf['FM4TinyMCE']['upload_dir'] = '/files/';/* Path from base_url to upload base dir */
$conf['FM4TinyMCE']['files_path'] = '../../../../../files/';/* Relative path from filemanager folder to upload files folder */
/******************** END FileManager4TinyMCE Configuration *********************/


/******************** START Database Configuration *********************/
$conf['db']['host']     = 'localhost';
$conf['db']['user']     = 'zambelz';
$conf['db']['password'] = 'kosonginaja';
$conf['db']['db_name']  = 'db_zcosp';
/******************** END Database Configuration *********************/