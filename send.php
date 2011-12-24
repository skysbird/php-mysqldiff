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
 *    $RCSfile: send.php,v $
 *    $Revision: 1.8 $
 *    $Date: 2004/05/26 03:26:24 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("config.inc.php");
require_once("library/global.inc.php");
require_once("library/generator.lib.php");

header("Content-Type: application/x-sql");
header("Content-Disposition: attachment; filename=\"mysqldiff.sql\"");

ob_start();

if ( $result=session_start() ) {
	require_once("library/resources.lib.php");
	if ( isset($_SESSION["generator"]["switch"]) && $_SESSION["generator"]["switch"] ) {
		$sourcedesc = "target"; $targetdesc = "source";
		$sourcecfg = &$cfg_target; $targetcfg = &$cfg_source;
	} else {
		$sourcedesc = "source"; $targetdesc = "target";
		$sourcecfg = &$cfg_source; $targetcfg = &$cfg_target;
	}
?>
#
# MySQL Diff <?php echo VERSION."\n"; ?>
#
# http://www.mysqldiff.com
# <?php echo str_replace("&copy;", "(c)", COPYRIGHT); ?>

#
# <?php echo $textres["comment_create_time"].": ".strftime("%d.%m.%Y %H:%M")."\n"; ?>
#
# --------------------------------------------------------
# <?php echo ext_htmlentities($textres["comment_source_info"])."\n"; ?>
# <?php echo ext_htmlentities($textres["label_hostname"]).": ".( is_numeric($_SESSION[$sourcedesc]["hostname"]) ? $sourcecfg[$_SESSION[$sourcedesc]["hostname"]]["hostname"] : $_SESSION[$sourcedesc]["hostname"] )."\n"; ?>
<?php if ( $_SESSION[$sourcedesc]["select"] == "Upload" ) { ?>
# <?php echo ext_htmlentities($textres["label_upload"]).": ".$_SESSION[$sourcedesc]["upload_file"]."\n"; ?>
<?php } else { ?>
# <?php echo ext_htmlentities($textres["label_database"]).": ".$_SESSION[$sourcedesc]["database"]."\n"; ?>
<?php } ?>
# --------------------------------------------------------
# <?php echo ext_htmlentities($textres["comment_target_info"])."\n"; ?>
# <?php echo ext_htmlentities($textres["label_hostname"]).": ".( is_numeric($_SESSION[$targetdesc]["hostname"]) ? $targetcfg[$_SESSION[$targetdesc]["hostname"]]["hostname"] : $_SESSION[$targetdesc]["hostname"] )."\n"; ?>
<?php if ( $_SESSION[$targetdesc]["select"] == "Upload" ) { ?>
# <?php echo ext_htmlentities($textres["label_upload"]).": ".$_SESSION[$targetdesc]["upload_file"]."\n"; ?>
<?php } else { ?>
# <?php echo ext_htmlentities($textres["label_database"]).": ".$_SESSION[$targetdesc]["database"]."\n"; ?>
<?php } ?>
# --------------------------------------------------------
#

<?php
	echo generateScript(FALSE, FALSE);
}
?>