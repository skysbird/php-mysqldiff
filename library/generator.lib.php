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
 *    $RCSfile: generator.lib.php,v $
 *    $Revision: 1.59 $
 *    $Date: 2004/09/20 23:12:47 $
 *    $State: Exp $
 *
 * ------------------------------------- */
require_once("library/database.lib.php");

function generateScript($syntax = FALSE, $html = TRUE) {
	GLOBAL $textres, $cfg_source, $cfg_target, $sourcedesc, $targetdesc;

	$sourcehost = is_numeric($_SESSION[$sourcedesc]["hostname"]) ? $cfg_source[(int)$_SESSION[$sourcedesc]["hostname"]]["hostname"] : $_SESSION[$sourcedesc]["hostname"];
	$targethost = is_numeric($_SESSION[$targetdesc]["hostname"]) ? $cfg_target[(int)$_SESSION[$targetdesc]["hostname"]]["hostname"] : $_SESSION[$targetdesc]["hostname"];

	if ( $_SESSION["options"]["connection"] && $_SESSION[$sourcedesc]["select"] == "Database" ) {
		echo "CONNECTING TO SOURCE DATABASE ".$_SESSION[$sourcedesc]["database"]."@".$sourcehost." AS ".$_SESSION[$sourcedesc]["username"]." ... \n";
	}

	// Flags for temporary databases ...
	$s_temp = $t_temp = FALSE;

	$scon = New cConnection($sourcehost, $_SESSION[$sourcedesc]["username"], $_SESSION[$sourcedesc]["password"]);
	if ( $scon->open() ) {
		if ( $_SESSION[$sourcedesc]["select"] == "Upload" ) {
			if ( $_SESSION["options"]["connection"] ) {
				echo "CREATING TEMPORARY SOURCE DATABASE AS ".$_SESSION[$sourcedesc]["username"]." ... ";
			}
			$s_db = $scon->createTemporaryDatabase();
			if ( $_SESSION["options"]["connection"] ) {
				if ( empty($s_db) ) {
					echo "DATABASE CREATION FAILED!\n";
				} else {
					echo "SUCCESS TEMPORARY DATABASE IS: $s_db\n";
				}
			}
			$s_temp = $s_db != "";
		} else {
			$s_db = $_SESSION[$sourcedesc]["database"];
		}
		if ( isset($s_db) && !empty($s_db) && $scon->selectDatabase($s_db) ) {
			if ( $_SESSION["options"]["connection"] ) echo "OK ($scon->_con)!\n";
			if ( $s_temp ) {
				$res = $scon->importSql($_SESSION[$sourcedesc]["upload"]);
				if ( $_SESSION["options"]["connection"] ) {
					printf("IMPORTED ".$_SESSION[$sourcedesc]["upload_file"]." FOUND %d RECORDS AND SUCCESSFULLY IMPORTED %d RECORDS!\n", $res["statements"], $res["success"]);
				}
			}

			if ( $_SESSION["options"]["connection"] && $_SESSION[$targetdesc]["select"] == "Database" ) {
				echo "CONNECTING TO TARGET DATABASE ".$_SESSION[$targetdesc]["database"]."@".$targethost." AS ".$_SESSION[$targetdesc]["username"]." ... \n";
			}

			$tcon = New cConnection($targethost,  $_SESSION[$targetdesc]["username"], $_SESSION[$targetdesc]["password"]);
			if ( $tcon->open() ) {
				if ( $_SESSION[$targetdesc]["select"] == "Upload" ) {
					if ( $_SESSION["options"]["connection"] ) {
						echo "CREATING TEMPORARY TARGET DATABASE AS ".$_SESSION[$targetdesc]["username"]." ... ";
					}
					$t_db = $tcon->createTemporaryDatabase();
					if ( $_SESSION["options"]["connection"] ) {
						if ( empty($t_db) ) {
							echo "DATABASE CREATION FAILED!\n";
						} else {
							echo "SUCCESS TEMPORARY DATABASE IS: $t_db\n";
						}
					}
					$t_temp = $t_db != "";
				} else {
					$t_db = $_SESSION[$targetdesc]["database"];
				}
				if ( isset($t_db) && !empty($t_db) && $tcon->selectDatabase($t_db) ) {
					if ( $_SESSION["options"]["connection"] ) echo "OK ($tcon->_con)!\n";
					if ( $t_temp ) {
						$res = $tcon->importSql($_SESSION[$targetdesc]["upload"]);
						if ( $_SESSION["options"]["connection"] ) {
							printf("IMPORTED ".$_SESSION[$targetdesc]["upload_file"]." FOUND %d RECORDS AND SUCCESSFULLY IMPORTED %d RECORDS!\n", $res["statements"], $res["success"]);
						}
					}

					$builder = New cCommandBuilder($tcon, $syntax, $html);
					$builder->addOptions($_SESSION["options"]);
					$builder->addRenamed($_SESSION["renamed"]);
					$builder->addResource("fieldformat_changed_single", $textres["info_fieldformat_changed_single"]);
					$builder->addResource("fieldformat_changed_multiple", $textres["info_fieldformat_changed_multiple"]);
					$builder->addResource("fieldformat_changeinfo", $textres["info_fieldformat_changeinfo"]);
					$builder->addResource("fieldformat_modification_needed", $textres["info_fieldformat_modification_needed"]);

					ob_start();

					if ( (boolean)$_SESSION["options"]["no_cfk_checks"] ) echo $builder->setMySqlVariable("FOREIGN_KEY_CHECKS", 0)."\n\n";

					// ------------------------------
					//
					//   Checking table layouts ...
					//
					// ------------------------------
					$s_tab = $scon->fetchTables($s_db);
					$t_tab = $tcon->fetchTables($t_db);
					echo ( $_SESSION["options"]["connection"] ? "\n" : "" )."#\n# ".$textres["info_ddl_start"]."\n#\n";
					if ( is_array($t_tab) ) foreach ( $t_tab AS $key=>$value ) {
						if ( !isset($s_tab[$key]) ) {
							$item = $builder->createTable($t_tab[$key]);
							echo $item == "" ? "" : $item."\n\n";
						}
					}
					if ( is_array($s_tab) ) foreach ( $s_tab AS $key=>$value ) {
						if ( isset($t_tab[$key]) ) {
							$item = $builder->alterTable($s_tab[$key], $t_tab[$key]);
							echo $item == "" ? "" : $item."\n\n";
						} else {
							$item = $builder->dropTable($s_tab[$key]);
							echo $item == "" ? "" : $item."\n\n";
						}
					}
					if ( (boolean)$_SESSION["options"]["cfk_back"] ) {
						if ( is_array($s_tab) ) foreach ( $s_tab AS $key=>$value ) {
							if ( isset($t_tab[$key]) ) {
								$item = $builder->alterTableContraints($s_tab[$key], $t_tab[$key]);
								echo $item == "" ? "" : $item."\n\n";
							}
						}
					}

					$data = str_replace(array("[script]", "[save]"), array("index.php", "save.php"), ob_get_contents());
					ob_end_clean();
					echo $data;
					echo "#\n# ".$textres["info_ddl_stop"]."\n#\n";
					if ( $_SESSION["options"]["data"] ) {
						echo ( $_SESSION["options"]["connection"] ? "" : "" )."\n#\n# ".$textres["info_dml_start"]."\n#\n";
						if ( $scon->connectionEqual($tcon) ) {
							if ( isset($_SESSION["data"]["insert"]) && is_array($_SESSION["data"]["insert"]) ) foreach ( $_SESSION["data"]["insert"] AS $key ) {
								if ( $res = $tcon->query("SELECT * FROM `".$t_db."`.`$key`") ) {
									if ( $res->count() ) {
										while ( $row = $res->nextarray(SQL_ASSOC) ) {
											echo $builder->insertRecord($key, $row)."\n";
										}
										echo "\n";
									}
									$res->destroy();
								} else echo "$tcon->_lasterror\n";
							}
							if ( isset($_SESSION["data"]["replace"]) && is_array($_SESSION["data"]["replace"]) ) foreach ( $_SESSION["data"]["replace"] AS $key ) {
								if ( $res = $tcon->query("SELECT * FROM `".$t_db."`.`$key`") ) {
									if ( $res->count() ) {
										while ( $row = $res->nextarray(SQL_ASSOC) ) {
											echo $builder->replaceRecord($key, $row)."\n";
										}
										echo "\n";
									}
									$res->destroy();
								} else echo "$tcon->_lasterror\n";
							}
						} else echo $textres["error_different_connections"]."\n";
						echo "#\n# ".$textres["info_dml_stop"]."\n#\n";
					}

					if ( (boolean)$_SESSION["options"]["no_cfk_checks"] ) echo "\n".$builder->setMySqlVariable("FOREIGN_KEY_CHECKS", 1)."\n";

				} else echo $textres["error_error"].$tcon->error()."\n";
				if ( $t_temp ) $tcon->dropDatabase($t_db);
				$tcon->close();
			} else echo $textres["error_error"].$tcon->error()."\n";
		} else echo $textres["error_error"].$scon->error()."\n";
		if ( $s_temp ) $scon->dropDatabase($s_db);
		$scon->close();
	} else echo $textres["error_error"].$scon->error()."\n";
}

?>