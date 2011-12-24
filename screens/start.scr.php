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
 *    $RCSfile: start.scr.php,v $
 *    $Revision: 1.10 $
 *    $Date: 2004/07/31 00:30:14 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/resources.lib.php");

function fetchLanguageBox() {
	return "<select class=\"language\" name=\"selLanguage\" id=\"selLanguage\" size=\"1\" onchange=\"document.frmLanguage.submit();\">".languageOptions()."</select>";
}

?>
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["label_start_useful_links"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="40%"><b><?php echo ext_htmlentities($textres["label_start_homepage"]); ?>:</b></td>
					<td width="60%">[<a href="http://www.mysqldiff.org" target="_blank"><?php echo ext_htmlentities($textres["link_start_homepage"]); ?></a>] [<a href="http://www.mysqldiff.org/changelogs.php" target="_blank"><?php echo ext_htmlentities($textres["link_start_changes"]); ?></a>] [<a href="http://www.mysqldiff.org/downloads.php" target="_blank"><?php echo ext_htmlentities($textres["link_start_downloads"]); ?></a>]</td>
				</tr>
				<tr>
					<td width="40%"><b><?php echo ext_htmlentities($textres["label_start_mysql_homepage"]); ?>:</b></td>
					<td width="60%">[<a href="http://www.mysql.com" target="_blank"><?php echo ext_htmlentities($textres["link_start_homepage"]); ?></a>]</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">
						<form name="frmLanguage" method="post" action="save.php">
							<input name="sc" type="hidden" value="language" />
							<label for="selLanguage"><b><?php echo ext_htmlentities($textres["label_start_language"]); ?>:</b></label> <?php echo fetchLanguageBox(); ?>
							<noscript><input class="langbutton" type="submit" value="go!" /></noscript>
						</form>
					</td>
				</tr>
			</table>
		</div>
		<form method="post" action="save.php">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="scrcmd right">
			<input class="button" name="cmdNext" type="submit" value="<?php echo ext_htmlentities($textres["button_next"]); ?>" />
		</div>
		</form>
