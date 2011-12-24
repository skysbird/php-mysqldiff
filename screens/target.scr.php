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
 *    $RCSfile: target.scr.php,v $
 *    $Revision: 1.23 $
 *    $Date: 2004/06/22 14:34:17 $
 *    $State: Exp $
 *
 * ------------------------------------- */
$columns = isset($_SESSION["frmTarget"]->errors) && ( count($_SESSION["frmTarget"]->errors)>1 || !isset($_SESSION["frmTarget"]->errors["---"]) ) ? 3 : 2;

$max_upload_size = fetchMaxUploadSize();

function fetchDbParameter($what, $alias = NULL) {
	GLOBAL $cfg_load_target_defaults_from_source, $cfg_source, $cfg_target, $tar_host, $src_host, $tar_name, $src_name, $tar_user, $src_name, $tar_pass, $src_pass;

	if ( isset($_SESSION["target"][$what]) ) {
		$result = $_SESSION["target"][$what];
	} else if ( isset($cfg_load_target_defaults_from_source) && $cfg_load_target_defaults_from_source ) {
		$result = $_SESSION["source"][$what];
	} else if ( isset($cfg_target) ) {
		$result = isset($cfg_target[0]) ? $cfg_target[0][$what] : "localhost";
	} else {
		switch ( $what )  {
			case "hostname":
				$result = isset($tar_host) ? $tar_host : "localhost";
				break;
			case "database":
				$result = isset($tar_name) ? $tar_name : "";
				break;
			case "username":
				$result = isset($tar_user) ? $tar_user : "";
				break;
			case "password":
				$result = isset($tar_pass) ? $tar_pass : "";
				break;
		}
	}
	return $result;
}

$loc_host = fetchDbParameter("hostname");
$loc_name = fetchDbParameter("database");
$loc_user = fetchDbParameter("username");
$loc_pass = fetchDbParameter("password");
$loc_select = isset($_SESSION["target"]["select"]) ? $_SESSION["target"]["select"] : "Database";

?>
		<script language="JavaScript" type="text/javascript">
		<!--
		function changeOption(what) {
			var active;
			var inactive;
			if ( what == "Database" ) {
				active = document.getElementById('idDatabase');
				inactive = document.getElementById('idUpload');
				document.getElementById('txtTargetDatabase').style.display = 'inline';
			} else {
				active = document.getElementById('idUpload');
				inactive = document.getElementById('idDatabase');
				document.getElementById('txtTargetDatabase').style.display = 'none';
			}
			inactive.className = 'inactiveoption';
			active.className = 'activeoption';
		}
		//-->
		</script>
		<form name="frmTargetInput" method="post" action="save.php" enctype="multipart/form-data">
		<input name="sc" type="hidden" value="<?php echo $_GET["sc"]; ?>" />
		<div class="screlem">
			<div class="screlemhead">
				<span><?php echo ext_htmlentities($textres["title_target"]); ?></span>
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
<?php if ( isset($_SESSION["frmTarget"]->errors["---"]) ) { ?>
				<tr>
					<td class="error" colspan="<?php echo $columns; ?>"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["---"])); ?></td>
				</tr>
<?php } ?>
				<tr>
					<td class="dblabel"><label for="txtTargetHost"><?php echo ext_htmlentities($textres["label_hostname"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmTarget"]->errors["txtHost"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><?php
					if ( isset($cfg_target) ) {
						?><select id="txtTargetHost" class="data" name="txtTargetHost" size="1"><?php echo createHostsOptions($cfg_target, $loc_host); ?></select><?php
					} else {
						if ( is_numeric($loc_host) ) $loc_host = $cfg_source[$loc_host]["hostname"];
						?><input id="txtTargetHost" class="data" name="txtTargetHost" type="text" maxlength="100" size="30" value="<?php echo $loc_host; ?>" /><?php
					} ?></td>
<?php if ( isset($_SESSION["frmTarget"]->errors["txtHost"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["txtHost"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="txtTargetUser"><?php echo ext_htmlentities($textres["label_username"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmTarget"]->errors["txtUser"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><input id="txtTargetUser" class="data" name="txtTargetUser" type="text" maxlength="100" size="30" value="<?php echo $loc_user; ?>" /></td>
<?php if ( isset($_SESSION["frmTarget"]->errors["txtUser"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["txtUser"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="txtTargetPassword"><?php echo ext_htmlentities($textres["label_password"]); ?>:</label></td>
					<td class="dbinput"<?php if ( !isset($_SESSION["frmTarget"]->errors["txtPassword"]) && $columns > 2 ) { ?> colspan="<?php echo $columns-1; ?>"<?php } ?>><input id="txtTargetPassword" class="data" name="txtTargetPassword" type="password" maxlength="100" size="30" value="<?php echo $loc_pass; ?>" /></td>
<?php if ( isset($_SESSION["frmTarget"]->errors["txtPassword"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["txtPassword"])); ?></td>
<?php } ?>
				</tr>
				<tr>
					<td class="dblabel"><label for="optTargetMediumDatabase"><?php echo ext_htmlentities($textres["label_select"]); ?>:</label></td>
					<td class="dbinput" colspan="<?php echo $columns-1; ?>">
						<input class="checkbox" id="optTargetMediumDatabase" name="optTargetMedium" type="radio" value="Database" onclick="changeOption('Database');" onchange="changeOption('Database');"<?php if ( $loc_select == "Database" ) { ?> checked="checked"<?php } ?>/> <?php echo ext_htmlentities($textres["label_database"]); ?>
						<input class="checkbox" id="optTargetMediumUpload" name="optTargetMedium" type="radio" value="Upload" onclick="changeOption('Upload');" onchange="changeOption('Upload');"<?php if ( $loc_select == "Upload" ) { ?> checked="checked"<?php } ?> /> <?php echo ext_htmlentities($textres["label_upload"]); ?>
					</td>
				</tr>
				<tr id="idDatabase">
					<td class="dblabel"><label for="txtTargetDatabase"><?php echo ext_htmlentities($textres["label_database"]); ?>:</label></td>
					<td class="dbinput"<?php
					if ( !isset($_SESSION["frmTarget"]->errors["txtDatabase"]) && $columns > 2 ) {
						?> colspan="<?php echo $columns-1; ?>"<?php
					} ?>><?php echo createDatabaseControl("TargetDatabase", $loc_name, $loc_host, $loc_user, $loc_pass);?></td>
<?php if ( isset($_SESSION["frmTarget"]->errors["txtDatabase"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["txtDatabase"])); ?></td>
<?php } ?>
				</tr>
<?php if ( $max_upload_size ) { ?>
				<tr id="idUpload">
					<td class="dblabel"><label for="txtTargetUpload"><?php echo ext_htmlentities($textres["label_upload"]); ?>:</label></td>
					<td class="dbinput"<?php
					if ( !isset($_SESSION["frmTarget"]->errors["txtUpload"]) && $columns > 2 ) {
						?> colspan="<?php echo $columns-1; ?>"<?php
					} ?>><input id="txtTargetUpload" class="data" name="txtTargetUpload" type="file" maxlength="<?php echo $max_upload_size; ?>" size="12" /><?php if ( isset($_SESSION["target"]["upload"]) && sizeof($_SESSION["target"]["upload"]) ) { ?> [<?php echo bytes2KBMBGB(strlen($_SESSION["target"]["upload"]), 2, TRUE); ?>]<?php } ?></td>
<?php if ( isset($_SESSION["frmTarget"]->errors["txtUpload"]) ) { ?>
					<td class="error"><?php echo nl2br(ext_htmlentities($_SESSION["frmTarget"]->errors["txtUpload"])); ?></td>
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
