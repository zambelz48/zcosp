<?php if(!defined('Z_KEY')) exit('Access denied !');

/**
 * Z-COSP (ZAMBELZ - CMS Open Source Project)
 * @package engine/plugin
 * @license Open Source
 * @author Nanda . J . A
 * @copyright 2013
 */

function z_mail($to, $subject, $message, $headers = '', $parameters = '') {

    $message = wordwrap($message, 70);

    mail($to, $subject, $message, 'From:'.$headers."\n", $parameters);
}