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
 *    $RCSfile: resources.lib.php,v $
 *    $Revision: 1.12 $
 *    $Date: 2003/10/10 15:40:48 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/values.lib.php");

define("DEFAULT_LANGUAGE", "english-iso-8859-1");
define("NLS_DIRECTORY", "./nls");

$language = isset($_SESSION["system"]["language"])?$_SESSION["system"]["language"]:(isset($cfg_language)?$cfg_language:DEFAULT_LANGUAGE);
if ( !isset($_SESSION["system"]["language"]) ) $_SESSION["system"]["language"] = $language;
if ( file_exists($file = NLS_DIRECTORY."/".$language.".nls.php") ) {
	require_once(NLS_DIRECTORY."/".$language.".nls.php");
} else {
	require_once(NLS_DIRECTORY."/".DEFAULT_LANGUAGE.".nls.php");
	$_SESSION["system"]["language"] = $cfg_language = DEFAULT_LANGUAGE;
}

function languageCompare($a, $b) {
	if ( $a == $b ) return 0;
	return $a < $b ? -1 : 1;
}

function languageOptions() {
	GLOBAL $language;

	$items = array();
	$result = "";
	if ( $dir = @opendir(NLS_DIRECTORY) ) {
		while ( $file = readdir($dir) ) {
			if ( !is_dir($filename = NLS_DIRECTORY."/".$file) && file_exists($filename) && preg_match("/\.nls\.php$/", $filename) ) {
				$idx = $item = substr($file, 0, -8);
				$elements = explode("-", $item);
				$items[$idx] = ucfirst($elements[0])." (";
				unset($elements[0]);
				$items[$idx] .= implode("-", $elements).")";
			}
		}
		uksort($items, "languageCompare");
		$result = createOptionsFromArray($items, $_SESSION["system"]["language"]);
	}
	return $result;
}

function ext_htmlentities($string) {
	GLOBAL $textres_charset, $php_errormsg;

	$dummy = @htmlentities($string, ENT_COMPAT, $textres_charset);
	if ( !isset($php_errormsg) || trim($php_errormsg) == "" ) $string = $dummy;
	return str_replace(array("‹", "›"), array("&#8249;", "&#8250;"), $string);
}

?>
