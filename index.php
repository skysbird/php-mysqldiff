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
 *    $RCSfile: index.php,v $
 *    $Revision: 1.42 $
 *    $Date: 2004/07/31 00:39:46 $
 *    $State: Exp $
 *
 * ------------------------------------- */
ini_set("track_errors", 1);

$cfg_language = "english-iso-8859-1";

if ( file_exists("config.inc.php") ) require_once("config.inc.php");
require_once("library/global.inc.php");
require_once("library/url.lib.php");
ob_start();

$screens = array(0=>"start", 1=>"source", 2=>"target", 3=>"options", 4=>"script", 5=>"field", 6=>"tables");

if ( $result=session_start() ) {
	if ( !isset($_SESSION["style"]) ) $_SESSION["style"] = ( isset($cfg_default_skin) ? $cfg_default_skin : "default" );
	require_once("library/resources.lib.php");
	if ( !isset($_GET["sc"]) || !preg_match("/^\\w+$/", $_GET["sc"]) || !in_array(($_GET["sc"] = strtolower($_GET["sc"])), $screens) ) $_GET["sc"] = $screens[0];
	if ( !ini_get("session.use_cookies") && !ini_get("session.use_only_cookies") ) {
		if ( !isset($_GET[session_name()]) ) {
			header("Location: ".createAbsoluteUri("index.php?sc=".( isset($_GET["sc"]) ? urlencode($_GET["sc"]) : $screens[0] )."&".session_name()."=".urlencode(session_id())));
			die();
		}
	}

header("Content-Type: text/html; charset=$textres_charset");
echo "<?xml version=\"1.0\" encoding=\"$textres_charset\"?>\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $textres_lang; ?>" lang="<?php echo $textres_lang; ?>" dir="<?php echo $textres_direction; ?>">
	<head>
		<title>MySQLDiff <?php echo VERSION; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $textres_charset; ?>" />
		<link rel="stylesheet" type="text/css" href="style/<?php echo $_SESSION["style"]; ?>/index.css" />
<?php if ( strtolower($_GET["sc"]) == "script" && $_SESSION["options"]["syntax"] ) { ?>
		<link rel="stylesheet" type="text/css" href="style/<?php echo $_SESSION["style"]; ?>/syntax.css" />
<?php } ?>
		<script language="JavaScript" type="text/javascript" src="javascript/functions.js"></script>
	</head>
	<body>
<?php
if ( version_compare(phpversion(), REQUIRED_PHP_VERSION) < 0 ) {
$error_message = "MySQLDiff ".VERSION." requires a minimal PHP-Version of ".REQUIRED_PHP_VERSION.",<br />your installed PHP-Version ".phpversion()." does not fit to this requirement!";
require_once("screens/requirements.scr.php");
} else if ( !is_writeable(ini_get("session.save_path")) ) {
$error_message = "The configured Path for Session files (".ini_get("session.save_path").") is not writeable!";
require_once("screens/requirements.scr.php");
} else {
require_once("screens/".$_GET["sc"].".scr.php");
}
?>
		<div class="footer"><a href="http://www.lippe-net.de" target="_blank"><?php echo COPYRIGHT; ?></a></div>
	</body>
</html>
<?php
} else {
	ob_end_clean();
	header("Location: ".createAbsoluteUri("index.php?screen=source&".session_name()."=".session_id()));
}
?>