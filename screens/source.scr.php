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
 *    $RCSfile: source.scr.php,v $
 *    $Revision: 1.19 $
 *    $Date: 2004/06/22 14:34:17 $
 *    $State: Exp $
 *
 * ------------------------------------- */
$columns = isset($_SESSION["frmSource"]->errors) && ( count($_SESSION["frmSource"]->errors)>1 || !isset($_SESSION["frmSource"]->errors["---"]) ) ? 3 : 2;

$max_upload_size = fetchMaxUploadSize();

$loc_host = isset($_SESSION["source"]["hostname"]) ? $_SESSION["source"]["hostname"] : ( isset($cfg_source[0]) ? $cfg_source[0]["hostname"] : "localhost" );
$loc_name = isset($_SESSION["source"]["database"]) ? $_SESSION["source"]["database"] : "";
$loc_user = isset($_SESSION["source"]["username"]) ? $_SESSION["source"]["username"] : ( isset($cfg_source[$idx = isset($_SESSION["source"]["hostname"]) && is_numeric($_SESSION["source"]["hostname"]) ? $_SESSION["source"]["hostname"] : 0]) && isset($cfg_source[$idx]["username"]) ? $cfg_source[$idx]["username"] : "" );
$loc_pass = isset($_SESSION["source"]["password"]) ? $_SESSION["source"]["password"] : ( isset($cfg_source[$idx = isset($_SESSION["source"]["hostname"]) && is_numeric($_SESSION["source"]["hostname"]) ? $_SESSSION["source"]["hostname"] : 0]) && isset($cfg_source[$idx]["password"]) ? $cfg_source[$idx]["password"] : "" );
$loc_select = isset($_SESSION["source"]["select"]) ? $_SESSION["source"]["select"] : "Database";

?>
		<script language="JavaScript" type="text/javascript">
		<!--
		function changeOption(what) {
			var active;
			var inactive;
			if ( what == "Database" ) {
				active = document.getElementById('idDatabase');
				inactive = document.getElementById('idUpload');
				document.getElementById('txtSourceDatabase').style.display = 'inline';
			} else {
				active = document.getElementById('idUpload');
				inactive = document.getElementById('idDatabase');
				document.getElementById('txtSourceDatabase').style.display = 'none';
			}
			inactive.className = 'inactiveoption';
			active.className = 'activeoption';
		}
		//-->
		</script>
		<form name="frmSourceInput" method="post" action="save.php" enctype="multipart/form-data">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_source"]); ?></span>
				MySQLDiff <?php echo VERSION; ?>

			</div>
			<table class="screlem" cellspacing="0">
				<colgroup>
					<col width="150" />
<?php if ( $columns == 2 ) { ?>
					<col width="450" />
<?php } else { ?>
					<col width="200" />
					<col width="250" />
<?php } ?>
				</colgroup>
<?php if ( isset($_SESSION["frmSource"]->errors["---"]) ) { ?>
				<tr class="error">
					<td colspan="<?php echo $columns; ?>"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["---"])); ?></td>
				</tr>
<?php } ?>
				<tr>
					<td class="dblabel"><label for="txtSourceHost"><?php echo ext_htmlentities($textres["label_hostname"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmSource"]->errors["txtHost"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><?php if ( isset($cfg_source) ) { ?><select id="txtSourceHost" class="data" name="txtSourceHost" size="1"><?php echo createHostsOptions($cfg_source, $loc_host); ?></select><?php } else { ?><input id="txtSourceHost" class="login" name="txtSourceHost" type="text" maxlength="100" size="30" value="<?php echo $loc_host; ?>" /><?php } ?></td>
<?php if ( isset($_SESSION["frmSource"]->errors["txtHost"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["txtHost"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="txtSourceUser" accesskey="u"><?php echo ext_htmlentities($textres["label_username"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmSource"]->errors["txtUser"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><input id="txtSourceUser" class="data" name="txtSourceUser" type="text" maxlength="100" size="30" value="<?php echo $loc_user; ?>" /></td>
<?php if ( isset($_SESSION["frmSource"]->errors["txtUser"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["txtUser"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="txtSourcePassword" accesskey="p"><?php echo ext_htmlentities($textres["label_password"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmSource"]->errors["txtPassword"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><input id="txtSourcePassword" class="data" name="txtSourcePassword" type="password" maxlength="100" size="30" value="<?php echo $loc_pass; ?>" /></td>
<?php if ( isset($_SESSION["frmSource"]->errors["txtPassword"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["txtPassword"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="optSourceMediumDatabase"><?php echo ext_htmlentities($textres["label_select"]); ?>:</label></td>
					<td class="dbinput" colspan="<?php echo $columns-1; ?>">
						<input class="checkbox" id="optSourceMediumDatabase" name="optSourceMedium" type="radio" value="Database" onclick="changeOption('Database');" onchange="changeOption('Database');"<?php if ( $loc_select == "Database" ) { ?> checked="checked"<?php } ?>/> <?php echo ext_htmlentities($textres["label_database"]); ?>
						<input class="checkbox" id="optSourceMediumUpload" name="optSourceMedium" type="radio" value="Upload" onclick="changeOption('Upload');" onchange="changeOption('Upload');"<?php if ( $loc_select == "Upload" ) { ?> checked="checked"<?php } ?> /> <?php echo ext_htmlentities($textres["label_upload"]); ?>
					</td>
				</tr>
				<tr id="idDatabase" class="activeoption">
					<td class="dblabel"><label for="txtSourceDatabase" accesskey="d"><?php echo ext_htmlentities($textres["label_database"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmSource"]->errors["txtDatabase"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><?php echo createDatabaseControl("SourceDatabase", $loc_name, $loc_host, $loc_user, $loc_pass); ?></td>
<?php if ( isset($_SESSION["frmSource"]->errors["txtDatabase"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["txtDatabase"])); ?></td>
<?php } ?>
				</tr>
<?php if ( $max_upload_size ) { ?>
				<tr id="idUpload" class="activeoption">
					<td class="dblabel"><label for="txtSourceUpload"><?php echo ext_htmlentities($textres["label_upload"]); ?>:</label></td>
					<td class="dbinput"<?php
					if ( !isset($_SESSION["frmSource"]->errors["txtUpload"]) && $columns > 2 ) {
						?> colspan="<?php echo $columns-1; ?>"<?php
					} ?>><input id="txtSourceUpload" class="data" name="txtSourceUpload" type="file" maxlength="<?php echo $max_upload_size; ?>" size="12" /><?php if ( isset($_SESSION["source"]["upload"]) && sizeof($_SESSION["source"]["upload"]) ) { ?> [<?php echo bytes2KBMBGB(strlen($_SESSION["source"]["upload"]), 2, TRUE); ?>]<?php } ?></td>
<?php if ( isset($_SESSION["frmSource"]->errors["txtUpload"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmSource"]->errors["txtUpload"])); ?></td>
<?php } ?>
				</tr>
<?php } ?>
			</table>
		</div>
		<div class="scrcmd">
			<input class="button" name="cmdPrev" type="submit" value="<?php echo ext_htmlentities($textres["button_prev"]); ?>" />
			<input class="button" name="cmdApply" type="submit" value="<?php echo ext_htmlentities($textres["button_apply"]); ?>" />
			<input class="button" name="cmdNext" type="submit" value="<?php echo ext_htmlentities($textres["button_next"]); ?>" />
		</div>
		</form>
		<script language="JavaScript" type="text/javascript">
		<!--
		changeOption('<?php echo $loc_select; ?>');
		//-->
		</script>
