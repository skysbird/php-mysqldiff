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
 *    $RCSfile: tables.scr.php,v $
 *    $Revision: 1.13 $
 *    $Date: 2004/06/22 14:34:17 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/values.lib.php");
require_once("library/database.lib.php");

function fetchTables() {
	$result=NULL;

	$con = New cConnection($_SESSION["target"]["hostname"], $_SESSION["target"]["username"], $_SESSION["target"]["password"]);
	if ( $con->open() ) {
		$result = $con->fetchTablelist($_SESSION["target"]["database"], FALSE, TRUE);
		$con->close();
	}
	return isset($result) ? $result : NULL;
}

$tables = fetchTables();
?>
		<form name="frmTables" method="post" action="save.php">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_tables_insert"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<tr>
					<td>
						<select class="scrtabsel" name="selDataInsert[]" size="8" multiple="multiple">
<?php echo createOptionsFromArray($tables, isset($_SESSION["data"]["insert"]) ? $_SESSION["data"]["insert"] : NULL); ?>
						</select>
					</td>
				</tr>
<script language="JavaScript" type="text/javascript">
<!--
document.write("<tr><td class=\"right\"><a href=\"#\" onclick=\"setSelectOptions('frmTables', 'selDataInsert[]', true); return false;\"><?php echo ext_htmlentities($textres["link_select_all"]); ?></a> | <a href=\"#\" onclick=\"setSelectOptions('frmTables', 'selDataInsert[]', false); return false;\"><?php echo ext_htmlentities($textres["link_unselect_all"]); ?></a></td></tr>");
//-->
</script>
			</table>
		</div>
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_tables_replace"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<tr>
					<td>
						<select class="scrtabsel" name="selDataReplace[]" size="8" multiple="multiple">
<?php echo createOptionsFromArray($tables, isset($_SESSION["data"]["replace"]) ? $_SESSION["data"]["replace"] : NULL); ?>
						</select>
					</td>
				</tr>
<script language="JavaScript" type="text/javascript">
<!--
document.write("<tr><td class=\"right\"><a href=\"#\" onclick=\"setSelectOptions('frmTables', 'selDataReplace[]', true); return false;\"><?php echo ext_htmlentities($textres["link_select_all"]); ?></a> | <a href=\"#\" onclick=\"setSelectOptions('frmTables', 'selDataReplace[]', false); return false;\"><?php echo ext_htmlentities($textres["link_unselect_all"]); ?></a></td></tr>");
//-->
</script>
			</table>
		</div>
		<div class="scrcmd">
			<input class="button" name="cmdPrev" type="submit" value="<?php echo ext_htmlentities($textres["button_prev"]); ?>" />
			<input class="button" name="cmdNext" type="submit" value="<?php echo ext_htmlentities($textres["button_next"]); ?>" />
		</div>
		</form>
