<?php
/** 
 * @author          Bansi Joshi <bjoshi.490@gmail.com>
 * @Copyright       (c) 2021, Bansi Joshi. All Rights Reserved.
 * @Link            http://github.com/bansi490/
 */

$log = __DIR__."../logs/".basename(__FILE__).".log";
ini_set('log_errors','On');
ini_set('error_log', $log);
ini_set('display_errors','Off');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);

include_once "config.php";