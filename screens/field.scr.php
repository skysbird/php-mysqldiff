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
 *    $RCSfile: field.scr.php,v $
 *    $Revision: 1.8 $
 *    $Date: 2004/06/21 16:50:15 $
 *    $State: Exp $
 *
 * ------------------------------------- */
?>
		<form name="frmField" method="post" action="save.php">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<input name="table" type="hidden" value="<?php echo $_GET["table"]; ?>" />
		<input name="field" type="hidden" value="<?php echo $_GET["field"]; ?>" />
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_field_renamed"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<tr>
					<td class="fldlabel"><?php echo ext_htmlentities($textres["label_field_original"]); ?>:</td>
					<td class="fldinput"><?php echo $_GET["field"]; ?></td>
				</tr>
				<tr>
					<td class="fldlabel"><label for="selRenamed"><?php echo ext_htmlentities($textres["label_field_renamed"]); ?>:</label></td>
					<td class="fldinput"><select class="fields" id="selRenamed" name="selRenamed" size="1"><option value="<?php echo $_GET["field"]; ?>" selected="selected">[<?php echo $_GET["field"]; ?>]</option><?php foreach ( $_GET["fields"] AS $fld ) { ?><option value="<?php echo $fld; ?>"><?php echo $fld; ?></option><?php } ?></select></td>
				</tr>
			</table>
		</div>
		<div class="scrcmd">
			<input class="button" name="cmdSubmit" type="submit" value="<?php echo ext_htmlentities($textres["button_generate"]); ?>" />
		</div>
		</form>
