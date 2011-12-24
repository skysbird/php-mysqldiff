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
 *    $RCSfile: save.php,v $
 *    $Revision: 1.38 $
 *    $Date: 2004/09/20 23:12:22 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/database.lib.php");
require_once("library/url.lib.php");
ini_set("track_errors", 1);

function checkConnection($data, &$cfg, &$info) {
	GLOBAL $php_errormsg;

	$result = FALSE;
    $con = new cConnection(is_numeric($data["hostname"]) ? $cfg[$data["hostname"]]["hostname"] : $data["hostname"], $data["username"], $data["password"]);
    if ( $con->open() ) {
		if ( isset($data["database"]) && trim($data["database"]) != "" ) {
			$result = $con->selectDatabase(trim($data["database"]));
		} else $result = TRUE;
    } else {
		$info = isset($php_errormsg) ? $php_errormsg : NULL;
	}
	return $result;
}

if ( file_exists("config.inc.php") ) require_once("config.inc.php");
require_once("library/global.inc.php");

$redirect="";
if ( $result=session_start() ) {
	require_once("library/resources.lib.php");
	if ( isset($_POST["sc"]) ) {
		switch ( strtolower($_POST["sc"]) ) {
			case "source":
				if ( !isset($_POST["selSourceHost"]) && ( !isset($_POST["txtSourceHost"]) || $_POST["txtSourceHost"] == "" ) ) $_POST["txtSourceHost"]="localhost";

				$_SESSION["source"]["hostname"] = isset($_POST["selSourceHost"]) ? $_POST["selSourceHost"] : ( isset($_POST["txtSourceHost"]) ? $_POST["txtSourceHost"] : "localhost" );
				$_SESSION["source"]["database"] = isset($_POST["selSourceDatabase"]) ? $_POST["selSourceDatabase"] : $_POST["txtSourceDatabase"];
				$_SESSION["source"]["username"] = $_POST["txtSourceUser"];
				$_SESSION["source"]["password"] = $_POST["txtSourcePassword"];
				$_SESSION["source"]["select"] = $_POST["optSourceMedium"];

				if ( isset($_FILES["txtSourceUpload"]) && $_FILES["txtSourceUpload"]["error"] == 0  && is_uploaded_file($_FILES["txtSourceUpload"]["tmp_name"]) ) {
					$_SESSION["source"]["upload"] = implode("", file($_FILES["txtSourceUpload"]["tmp_name"]));
					$_SESSION["source"]["upload_file"] = $_FILES["txtSourceUpload"]["name"];
					$_SESSION["source"]["select"] = "Upload";
				}
				if ( $_SESSION["source"]["select"] == "Database" ) {
					unset($_SESSION["source"]["upload"]);
					unset($_SESSION["source"]["upload_file"]);
				}

				unset($_SESSION["frmSource"]);
				if ( isset($_POST["cmdNext"]) || isset($_POST["cmdApply"]) ) {
					if ( $_SESSION["source"]["select"] == "Database" ) {
						if ( !isset($_POST["selSourceDatabase"]) && trim($_POST["txtSourceDatabase"]) == "" && !isset($_POST["cmdApply"]) ) $_SESSION["frmSource"]->errors["txtDatabase"] = $textres["error_txtDatabase_missing"];
					} else {
						if ( !isset($_SESSION["source"]["upload"]) && !isset($_POST["cmdApply"]) ) $_SESSION["frmSource"]->errors["txtUpload"] = $textres["error_txtUpload_missing"];
					}
					if ( trim($_POST["txtSourceUser"])=="" ) $_SESSION["frmSource"]->errors["txtUser"] = $textres["error_txtUser_missing"];
					if ( !checkConnection($_SESSION["source"], $cfg_source, $info) ) {
						$_SESSION["frmSource"]->errors["---"] = sprintf($textres["error_connection_failed"], $info);
					} else $redirect = "index.php?sc=target";
				} else $redirect = "index.php?sc=start";
				if ( ( isset($_SESSION["frmSource"]->errors) && count($_SESSION["frmSource"]->errors) ) || isset($_POST["cmdApply"]) ) $redirect = "index.php?sc=source";
				break;
			case "target":
				if ( !isset($_POST["selTargetHost"]) && ( !isset($_POST["txtTargetHost"]) || $_POST["txtTargetHost"] == "" ) ) $_POST["txtTargetHost"]="localhost";

				$_SESSION["target"]["hostname"] = isset($_POST["selTargetHost"]) ? $_POST["selTargetHost"] : ( isset($_POST["txtTargetHost"]) ? $_POST["txtTargetHost"] : "localhost" );
				$_SESSION["target"]["database"] = isset($_POST["selTargetDatabase"]) ? $_POST["selTargetDatabase"] : $_POST["txtTargetDatabase"];
				$_SESSION["target"]["username"] = $_POST["txtTargetUser"];
				$_SESSION["target"]["password"] = $_POST["txtTargetPassword"];
				$_SESSION["target"]["select"] = $_POST["optTargetMedium"];

				if ( isset($_FILES["txtTargetUpload"]) && $_FILES["txtTargetUpload"]["error"] == 0  && is_uploaded_file($_FILES["txtTargetUpload"]["tmp_name"]) ) {
					$_SESSION["target"]["upload"] = implode("", file($_FILES["txtTargetUpload"]["tmp_name"]));
					$_SESSION["target"]["upload_file"] = $_FILES["txtTargetUpload"]["name"];
					$_SESSION["target"]["select"] = "Upload";
				}
				if ( $_SESSION["target"]["select"] == "Database" ) {
					unset($_SESSION["target"]["upload"]);
					unset($_SESSION["target"]["upload_file"]);
				}

				unset($_SESSION["frmTarget"]);
				if ( isset($_POST["cmdNext"]) || isset($_POST["cmdApply"]) ) {
					if ( $_SESSION["target"]["select"] == "Database" ) {
						if ( !isset($_POST["selTargetDatabase"]) && trim($_POST["txtTargetDatabase"])=="" && !isset($_POST["cmdApply"]) ) $_SESSION["frmTarget"]->errors["txtDatabase"] = $textres["error_txtDatabase_missing"];
					} else {
						if ( !isset($_SESSION["target"]["upload"]) && !isset($_POST["cmdApply"]) ) $_SESSION["frmTarget"]->errors["txtUpload"] = $textres["error_txtUpload_missing"];
					}
					if ( trim($_POST["txtTargetUser"])=="" ) $_SESSION["frmTarget"]->errors["txtUser"] = $textres["error_txtUser_missing"];
					if ( !checkConnection($_SESSION["target"], $cfg_target, $info) ) {
						$_SESSION["frmTarget"]->errors["---"] = sprintf($textres["error_connection_failed"], $info);
					} else $redirect = "index.php?sc=options";
				} else $redirect = "index.php?sc=source";
				if ( ( isset($_SESSION["frmTarget"]->errors) && count($_SESSION["frmTarget"]->errors) ) || isset($_POST["cmdApply"]) ) $redirect = "index.php?sc=target";
				break;
			case "options":
				$_SESSION["options"]["type"] = (int)$_POST["chkOptType"];
				$_SESSION["options"]["options"] = (int)$_POST["chkOptOptions"];
				$_SESSION["options"]["auto_incr"] = (int)$_POST["chkOptAutoIncr"];
				$_SESSION["options"]["charset"] = (int)$_POST["chkOptCharset"];
				$_SESSION["options"]["comment"] = (int)$_POST["chkOptComment"];
				$_SESSION["options"]["changes"] = (int)$_POST["chkOptChanges"];
				$_SESSION["options"]["syntax"] = (int)$_POST["chkOptSyntax"];
				$_SESSION["options"]["cfk_back"] = (int)$_POST["chkOptCfkBack"];
				$_SESSION["options"]["no_cfk_checks"] = (int)$_POST["chkOptDeactivateCFChecks"];
				$_SESSION["options"]["backticks"] = (int)$_POST["chkOptBackticks"];
				$_SESSION["options"]["data"] = (int)$_POST["chkOptData"];
				$_SESSION["options"]["short"] = (int)$_POST["optShort"];
				$_SESSION["options"]["connection"] = (int)$_POST["optConnection"];
				$redirect = "index.php?sc=".( isset($_POST["cmdNext"]) ? ( $_SESSION["options"]["data"] ? "tables" : "script" ) : "target" );
				break;
			case "tables":
				$_SESSION["data"]["insert"] = isset($_POST["selDataInsert"]) ? $_POST["selDataInsert"] : NULL;
				$_SESSION["data"]["replace"] = isset($_POST["selDataReplace"]) ? $_POST["selDataReplace"] : NULL;
				$redirect = "index.php?sc=".( isset($_POST["cmdNext"]) ? "script" : "options" );
				break;
			case "script":
				if ( isset($_POST["cmdSend"]) ) $redirect = "send.php";
				else if ( isset($_POST["cmdPrev"]) ) $redirect = "index.php?sc=".( $_SESSION["options"]["data"] ? "tables" : "options" );
				else if ( isset($_POST["cmdSwitch"]) ) {
					if ( !isset($_SESSION["generator"]["switch"]) ) $_SESSION["generator"]["switch"] = FALSE;
					$_SESSION["generator"]["switch"] = !$_SESSION["generator"]["switch"];
					$redirect = "index.php?sc=script";
				} else if ( isset($_POST["cmdReset"]) ) {
					session_destroy();
				}
				break;
			case "field":
				if ( $_POST["field"] != $_POST["selRenamed"] ) $_SESSION["renamed"][$_POST["table"]][$_POST["field"]] = $_POST["selRenamed"];
				$redirect = "index.php?sc=script";
				break;
			case "language":
				$_SESSION["system"]["language"] = $_POST["selLanguage"];
				$redirect = "index.php?sc=start";
				break;
			case "start":
				$redirect = "index.php?sc=source";
				break;
		}
	} else if ( isset($_GET["sc"]) ) {
		switch ( strtolower($_GET["sc"]) ) {
			case "removerenamed":
				unset($_SESSION["renamed"][$_GET["table"]][$_GET["field"]]);
				$redirect = "index.php?sc=script";
				break;
		}
	}
}
if ( $redirect == "" ) $redirect = "index.php";
else if ( $redirect == "send.php" && !ini_get("session.use_cookies") && !ini_get("session.use_only_cookies") ) $redirect .= "?".session_name()."=".urlencode(session_id());
else if ( !ini_get("session.use_cookies") && !ini_get("session.use_only_cookies") ) $redirect .= "&".session_name()."=".urlencode(session_id());

header("Location: ".createAbsoluteUri($redirect));
?>
