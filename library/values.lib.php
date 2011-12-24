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
 *    $RCSfile: values.lib.php,v $
 *    $Revision: 1.5 $
 *    $Date: 2004/06/22 14:12:21 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/database.lib.php");

function createOptionsFromArray(&$values, $default = NULL, $keyvalue = TRUE) {
	$result="";
	if ( isset($values) && is_array($values) ) foreach ( $values AS $key=>$value ) {
		$result.="<option value=\"".( $keyvalue ? $key : $value )."\"".( isset($default) && ( ( is_array($default) && in_array($keyvalue ? $key : $value, $default) ) || ( !is_array($default) && ( $keyvalue ? $key : $value ) == $default ) ) ? " selected=\"selected\"" : "" ).">$value</option>";
	}
	return $result;
}

function createHostsOptions($values, $default) {
	$items = array();
	foreach ( $values AS $key => $value ) {
		$items[$key] = $value["hostname"];
	}
	return createOptionsFromArray($items, isset($default) ? $default : NULL);
}

function createDatabaseOptions($default, $host, $user, $pass) {
	$result = "";

	$con = new cConnection($host, $user, $pass);
	if ( $con->open() ) {
		$items = $con->listDatabases();
		$result = createOptionsFromArray($items, isset($default) ? $default : NULL);
		$con->close();
	}
	return $result;
}

function createDatabaseControl($ctrlname, $default, $host, $user, $pass) {
	$error = FALSE;
	if ( ( $options = createDatabaseOptions(isset($default) ? $default : NULL, $host, $user, $pass) ) == "" ) {
		$result = "<input id=\"txt$ctrlname\" name=\"txt$ctrlname\" class=\"data\" type=\"text\" maxlength=\"100\" size=\"30\"".( isset($default) ? " value=\"$default\"" : "" )." />";
	} else $result = "<select id=\"txt$ctrlname\" name=\"sel$ctrlname\" class=\"data\" size=\"1\">$options</select>";
	return $result;
}

?>