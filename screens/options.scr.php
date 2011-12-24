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
 *    $RCSfile: options.scr.php,v $
 *    $Revision: 1.20 $
 *    $Date: 2004/09/20 23:32:52 $
 *    $State: Exp $
 *
 * ------------------------------------- */
?>
		<form name="frmTargetOptions" method="post" action="save.php">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_options"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptType_0" name="chkOptType" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["type"]) || $_SESSION["options"]["type"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptType_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptType_1" name="chkOptType" type="radio" value="0"<?php if ( isset($_SESSION["options"]["type"]) && $_SESSION["options"]["type"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptType_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptType_<?php echo isset($_SESSION["options"]["type"]) && $_SESSION["options"]["type"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_change_table_type"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptOptions_0" name="chkOptOptions" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["options"]) || $_SESSION["options"]["options"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptOptions_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptOptions_1" name="chkOptOptions" type="radio" value="0"<?php if ( isset($_SESSION["options"]["options"]) && $_SESSION["options"]["options"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptOptions_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptOptions_<?php echo isset($_SESSION["options"]["options"]) && $_SESSION["options"]["options"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_alter_table_options"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptAutoIncr_0" name="chkOptAutoIncr" type="radio" value="1"<?php if ( isset($_SESSION["options"]["auto_incr"]) && $_SESSION["options"]["auto_incr"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptAutoIncr_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptAutoIncr_1" name="chkOptAutoIncr" type="radio" value="0"<?php if ( !isset($_SESSION["options"]["auto_incr"]) || $_SESSION["options"]["auto_incr"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptAutoIncr_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptAutoIncr_<?php echo isset($_SESSION["options"]["auto_incr"]) && $_SESSION["options"]["auto_incr"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_alter_table_auto_incr"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptCharset_0" name="chkOptCharset" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["charset"]) || $_SESSION["options"]["charset"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptCharset_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptCharset_1" name="chkOptCharset" type="radio" value="0"<?php if ( isset($_SESSION["options"]["charset"]) && $_SESSION["options"]["charset"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptCharset_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptCharset_<?php echo isset($_SESSION["options"]["charset"]) && $_SESSION["options"]["charset"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_alter_table_charset"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptComment_0" name="chkOptComment" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["comment"]) || $_SESSION["options"]["comment"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptComment_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptComment_1" name="chkOptComment" type="radio" value="0"<?php if ( isset($_SESSION["options"]["comment"]) && $_SESSION["options"]["comment"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptComment_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptComment_<?php echo isset($_SESSION["options"]["comment"]) && $_SESSION["options"]["comment"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_alter_comments"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptChanges_0" name="chkOptChanges" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["changes"]) || $_SESSION["options"]["changes"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptChanges_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptChanges_1" name="chkOptChanges" type="radio" value="0"<?php if ( isset($_SESSION["options"]["changes"]) && $_SESSION["options"]["changes"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptChanges_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptChanges_<?php echo isset($_SESSION["options"]["changes"]) && $_SESSION["options"]["changes"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_alter_changes"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="optShort_0" name="optShort" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["short"]) || $_SESSION["options"]["short"]==1 ) { ?> checked="checked"<?php } ?> /><label for="optShort_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="optShort_1" name="optShort" type="radio" value="0"<?php if ( isset($_SESSION["options"]["short"]) && $_SESSION["options"]["short"]==0 ) { ?> checked="checked"<?php } ?> /><label for="optShort_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="optShort_<?php echo isset($_SESSION["options"]["short"]) && $_SESSION["options"]["short"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_merge_statements"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptBackticks_0" name="chkOptBackticks" type="radio" value="1"<?php if ( isset($_SESSION["options"]["backticks"]) && $_SESSION["options"]["backticks"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptBackticks_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptBackticks_1" name="chkOptBackticks" type="radio" value="0"<?php if ( !isset($_SESSION["options"]["backticks"]) || $_SESSION["options"]["backticks"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptBackticks_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptBackticks_<?php echo !isset($_SESSION["options"]["backticks"]) || $_SESSION["options"]["backticks"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_backticks"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptSyntax_0" name="chkOptSyntax" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["syntax"]) || $_SESSION["options"]["syntax"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptSyntax_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptSyntax_1" name="chkOptSyntax" type="radio" value="0"<?php if ( isset($_SESSION["options"]["syntax"]) && $_SESSION["options"]["syntax"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptSyntax_1"> <?php echo $textres["option_no"]; ?></label></td>
					<td class="optlabel"><label for="chkOptSyntax_<?php echo isset($_SESSION["options"]["syntax"]) && $_SESSION["options"]["syntax"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_syntax_highlighting"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptCfkBack_0" name="chkOptCfkBack" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["cfk_back"]) || $_SESSION["options"]["cfk_back"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptCfkBack_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptCfkBack_1" name="chkOptCfkBack" type="radio" value="0"<?php if ( isset($_SESSION["options"]["cfk_back"]) && $_SESSION["options"]["cfk_back"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptCfkBack_1"> <?php echo $textres["option_no"]; ?></label></td>
					<td class="optlabel"><label for="chkOptCfkBack_<?php echo isset($_SESSION["options"]["cfk_back"]) && $_SESSION["options"]["cfk_back"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_cfk_back"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptDeactivateCFChecks_0" name="chkOptDeactivateCFChecks" type="radio" value="1"<?php if ( !isset($_SESSION["options"]["no_cfk_checks"]) || $_SESSION["options"]["no_cfk_checks"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptDeactivateCFChecks_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptDeactivateCFChecks_1" name="chkOptDeactivateCFChecks" type="radio" value="0"<?php if ( isset($_SESSION["options"]["no_cfk_checks"]) && $_SESSION["options"]["no_cfk_checks"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptDeactivateCFChecks_1"> <?php echo $textres["option_no"]; ?></label></td>
					<td class="optlabel"><label for="chkOptDeactivateCFChecks_<?php echo isset($_SESSION["options"]["no_cfk_checks"]) && $_SESSION["options"]["no_cfk_checks"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_no_cfk_checks"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="chkOptData_0" name="chkOptData" type="radio" value="1"<?php if ( isset($_SESSION["options"]["data"]) && $_SESSION["options"]["data"]==1 ) { ?> checked="checked"<?php } ?> /><label for="chkOptData_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="chkOptData_1" name="chkOptData" type="radio" value="0"<?php if ( !isset($_SESSION["options"]["data"]) || $_SESSION["options"]["data"]==0 ) { ?> checked="checked"<?php } ?> /><label for="chkOptData_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="chkOptData_<?php echo !isset($_SESSION["options"]["data"]) || $_SESSION["options"]["data"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_data"]); ?></label></td>
				</tr>
				<tr>
					<td class="optinput"><input class="checkbox" id="optConnection_0" name="optConnection" type="radio" value="1"<?php if ( isset($_SESSION["options"]["connection"]) && $_SESSION["options"]["connection"]==1 ) { ?> checked="checked"<?php } ?> /><label for="optConnection_0"> <?php echo ext_htmlentities($textres["option_yes"]); ?></label>&nbsp;&nbsp;<input class="checkbox" id="optConnection_1" name="optConnection" type="radio" value="0"<?php if ( !isset($_SESSION["options"]["connection"]) || $_SESSION["options"]["connection"]==0 ) { ?> checked="checked"<?php } ?> /><label for="optConnection_1"> <?php echo ext_htmlentities($textres["option_no"]); ?></label></td>
					<td class="optlabel"><label for="optConnection_<?php echo !isset($_SESSION["options"]["connection"]) || $_SESSION["options"]["connection"] == 0 ? "0" : "1"; ?>"><?php echo ext_htmlentities($textres["label_show_connection_state"]); ?></label></td>
				</tr>
			</table>
		</div>
		<div class="scrcmd">
			<input class="button" name="cmdPrev" type="submit" value="<?php echo ext_htmlentities($textres["button_prev"]); ?>" />
			<input class="button" name="cmdNext" type="submit" value="<?php echo ext_htmlentities($textres["button_next"]); ?>" />
		</div>
		</form>
