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
 *    $RCSfile: script.scr.php,v $
 *    $Revision: 1.18 $
 *    $Date: 2004/06/21 16:50:15 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/generator.lib.php");

if ( isset($_SESSION["generator"]["switch"]) && $_SESSION["generator"]["switch"] ) {
	$sourcedesc = "target"; $targetdesc = "source";
	$sourcecfg = &$cfg_target; $targetcfg = &$cfg_source;
} else {
	$sourcedesc = "source"; $targetdesc = "target";
	$sourcecfg = &$cfg_source; $targetcfg = &$cfg_target;
}
?>
<div class="script">
<pre>
#
# MySQLDiff <?php echo VERSION."\n"; ?>
#
# http://www.mysqldiff.org
# <?php echo str_replace("&copy;", "(c)", COPYRIGHT); ?>

#
# <?php echo ext_htmlentities($textres["comment_create_time"]).": ".strftime("%d.%m.%Y %H:%M")."\n"; ?>
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
echo generateScript($_SESSION["options"]["syntax"], TRUE);
?>
</pre>
</div>
		<form name="frmSourceInput" method="post" action="save.php">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="scrcmd">
			<input class="button" name="cmdPrev" type="submit" value="<?php echo ext_htmlentities($textres["button_prev"]); ?>" />
			<input class="button" name="cmdSend" type="submit" value="<?php echo ext_htmlentities($textres["button_send"]); ?>" />
			<input class="button" name="cmdSwitch" type="submit" value="<?php echo ext_htmlentities($textres["button_switch"]); ?>" />
			<input class="button" name="cmdReset" type="submit" value="<?php echo ext_htmlentities($textres["button_reset"]); ?>" />
		</div>
		</form>
