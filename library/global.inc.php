<?php
/*  ------------------------------------- *
 *
 *    Projekt:   MySQL Diff
 *    Für:
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo
 *               (c) 2001-2003
 *
 *    $Author: sskus $
 *    $RCSfile: global.inc.php,v $
 *    $Revision: 1.18 $
 *    $Date: 2004/10/01 01:01:23 $
 *    $State: Exp $
 *
 * ------------------------------------- */

define("BYTES_BYTE", 1);
define("BYTES_KB", 1024);
define("BYTES_MB", 1024*BYTES_KB);
define("BYTES_GB", 1024*BYTES_MB);
define("BYTES_TB", 1024*BYTES_GB);

define("BENCH_MEASURE_START_TIME", time());
define("VERSION", "1.5.0");
define("REQUIRED_PHP_VERSION", "4.1.0");
define("COPYRIGHT", "&copy; 2001-2004, Lippe-Net Online-Service");
ini_set("arg_separator.output", "&amp;");
if ( isset($cfg_session_use_cookies) ) ini_set("session.use_cookies", $cfg_session_use_cookies);
if ( isset($cfg_session_use_only_cookies) ) ini_set("session.use_only_cookies", $cfg_session_use_only_cookies);
session_name( isset($cfg_session_name) ? $cfg_session_name : "s" );


function getMicroTime(){
	list($usec, $sec) = explode(" ",microtime());
	$sec-=BENCH_MEASURE_START_TIME;
	return (double)((double)$usec + (double)$sec);
}
function bytes2KBMBGB($bytes, $precision=2, $showbytes=TRUE) {
	$result="";
	if ( $bytes>BYTES_TB ) {
		$result=number_format($bytes/BYTES_TB, $precision, ",", ".") . " TB";
	} else if ($bytes>=BYTES_GB) {
		$result=number_format($bytes/BYTES_GB, $precision, ",", ".") . " GB";
	} else if ($bytes>=BYTES_MB) {
		$result=number_format($bytes/BYTES_MB, $precision, ",", ".") . " MB";
	} else if ($bytes>=BYTES_KB) {
		$result=number_format($bytes/BYTES_KB, $precision, ",", ".") . " KB";
	} else $result=number_format($bytes/BYTES_BYTE, 0, ",", ".") . " Byte" . (($bytes/BYTES_BYTE)==1?"":"s");
	if ($showbytes&&($bytes>=BYTES_KB)) $result.=" (" . number_format($bytes, 0, ",", ".") . " Byte" . ($bytes==1?"":"s") . ")";
	return $result;
}

function bytesFromSizeString($data) {
	preg_match("/(\d+)(M|K)?/", $data, $matches);
	if ( !isset($matches[2]) ) $matches[2] = "B";
	$multiplier = 1;
	switch (strtolower($matches[2])) {
		case "m": $multiplier *= 1024;
		case "k": $multiplier *= 1024;
	}
	return (int)$matches[1] * $multiplier;
}

function fetchMaxUploadSize() {
	if ( (boolean) ini_get("file_uploads") ) {
		$umf = bytesFromSizeString(ini_get("upload_max_filesize"));
		$pms = bytesFromSizeString(ini_get("post_max_size"));
		return $umf > $pms ? $umf : $pms;
	} else return 0;
}

?>