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
 *    $RCSfile: requirements.scr.php,v $
 *    $Revision: 1.4 $
 *    $Date: 2003/12/13 12:25:49 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/resources.lib.php");
?>
		<table class="screen" align="center" cellspacing="0">
			<colgroup>
				<col width="200" />
				<col width="400" />
			</colgroup>
			<tr>
				<th class="screen" colspan="2">MySQLDiff <?php echo VERSION; ?></th>
			</tr>
			<tr>
				<td class="screen" colspan="2"><b><?php echo ext_htmlentities($textres["label_start_useful_links"]); ?></b></td>
			</tr>
			<tr>
				<td class="screen"><b><?php echo ext_htmlentities($textres["label_start_homepage"]); ?>:</b></td>
				<td class="screen">[<a href="http://www.mysqldiff.org" target="_blank"><?php echo ext_htmlentities($textres["link_start_homepage"]); ?></a>] [<a href="http://www.mysqldiff.org/changelogs.php" target="_blank"><?php echo ext_htmlentities($textres["link_start_changes"]); ?></a>] [<a href="http://www.mysqldiff.org/downloads.php" target="_blank"><?php echo ext_htmlentities($textres["link_start_downloads"]); ?></a>]</td>
			</tr>
			<tr>
				<td class="screen"><b><?php echo ext_htmlentities($textres["label_start_mysql_homepage"]); ?>:</b></td>
				<td class="screen">[<a href="http://www.mysql.com" target="_blank"><?php echo ext_htmlentities($textres["link_start_homepage"]); ?></a>]</td>
			</tr>
			<tr>
				<td class="screen" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="screen" colspan="2" align="center">
					<span class="error"><?php echo $error_message; ?></span>
				</td>
			</tr>
			<tr>
				<td class="screen" colspan="2">&nbsp;</td>
			</tr>
		</table>
