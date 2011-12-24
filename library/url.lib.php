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
 *    $RCSfile: url.lib.php,v $
 *    $Revision: 1.3 $
 *    $Date: 2004/06/15 16:46:56 $
 *    $State: Exp $
 *
 * ------------------------------------- */

function createAbsoluteUri($path) {
	if ( preg_match("/^(\w+)[:]\/\//i", $path, $matches) ) {
		return $path;
	} else {
		$protocol = "http" . ( isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on" ? "s" : "" );
		if ( $path{0} == '/' ) {
			$directory = "";
		} else {
			$directory = dirname($_SERVER["SCRIPT_NAME"]);
		}
		return "$protocol://".$_SERVER["HTTP_HOST"].$directory.( !in_array(substr($directory, -1), array("\\", "/")) && !in_array(substr($path, 0, 1), array("\\", "/")) ? "/" : "" ).$path;
	}
}

?>