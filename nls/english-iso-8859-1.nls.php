<?php
/*  ------------------------------------- *
 *
 *    Projekt:   MySQL Diff
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo
 *               (c) 2001-2003
 *    Translator:
 *    Sergey V. Beduev <shaman@interdon.net>
 *
 *    $Author: sskus $
 *    $RCSfile: english-iso-8859-1.nls.php,v $
 *    $Revision: 1.31 $
 *    $Date: 2004/09/20 23:12:32 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "iso-8859-1";
$textres_lang = "en";
$textres_direction = "ltr";

$textres["title_source"] = "Source Database (current database):";
$textres["title_target"] = "Target Database (database layout to convert to):";
$textres["title_options"] = "Options:";
$textres["title_field_renamed"] = "Attribute renamed";
$textres["title_tables_insert"] = "Select tables to create INSERT statements";
$textres["title_tables_replace"] = "Select tables to create REPLACE statements";

$textres["label_hostname"] = "Host";
$textres["label_database"] = "Database";
$textres["label_username"] = "User";
$textres["label_password"] = "Password";
$textres["label_upload"] = "SQL-File";
$textres["label_select"] = "Select medium";

$textres["label_change_table_type"] = "Change table type";
$textres["label_alter_table_options"] = "Alter table options";
$textres["label_alter_table_auto_incr"] = "Consider auto_increment parameter";
$textres["label_alter_table_charset"] = "Alter table charset";
$textres["label_alter_comments"] = "Alter comments";
$textres["label_alter_changes"] = "Generate hint on changes in attribute format";
$textres["label_merge_statements"] = "Merge statements";
$textres["label_show_connection_state"] = "Show connection state";
$textres["label_syntax_highlighting"] = "Syntax highlighting";
$textres["label_cfk_back"] = "Move foreign keys to the end of script";
$textres["label_no_cfk_checks"] = "Deactivate foreign key checks before script run.";
$textres["label_backticks"] = "Use Backticks for table and attribute names";
$textres["label_data"] = "Create INSERT- or REPLACE-statements for selected tables.";

$textres["link_select_all"] = "Select all";
$textres["link_unselect_all"] = "Unselect all";

$textres["label_field_original"] = "Attribute";
$textres["label_field_renamed"] = "renamed to";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Homepage";
$textres["link_start_changes"] = "Changelog";
$textres["link_start_downloads"] = "Downloads";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Useful links";
$textres["label_start_language"] = "Language";

$textres["button_next"] = "next ›››";
$textres["button_prev"] = "‹‹‹ previous";
$textres["button_generate"] = "generate";
$textres["button_reset"] = "reset";
$textres["button_send"] = "send";
$textres["button_switch"] = "switch";
$textres["button_apply"] = "apply";

$textres["comment_create_time"] = "Create time";
$textres["comment_source_info"] = "Source info";
$textres["comment_target_info"] = "Target info";

$textres["error_error"] = "ERROR";
$textres["error_different_connections"] = "Different connections leaving out!";
$textres["error_connection_failed"] = "Database connection failed!\nPlease check your login data.\n(%s)";
$textres["error_txtHost_missing"] = "Hostname missing!";
$textres["error_txtDatabase_missing"] = "Databasename missing!";
$textres["error_txtUser_missing"] = "Username missing!";
$textres["error_txtPass_missing"] = "Password missing!";
$textres["error_txtUpload_missing"] = "The file upload is missing!";

$textres["info_table_dropped"] = "Table %s dropped!";
$textres["info_fieldformat_changed_single"] = "Fieldformat of";
$textres["info_fieldformat_changed_multiple"] = "Fieldformats of";
$textres["info_fieldformat_changeinfo"] = "%s changed from %s to %s.";
$textres["info_fieldformat_modification_needed"] = "Possibly data modifications needed!";
$textres["info_ddl_start"] = "DDL START";
$textres["info_ddl_stop"] = "DDL END";
$textres["info_dml_start"] = "DML START";
$textres["info_dml_stop"] = "DML END";

$textres["option_yes"] = "Yes";
$textres["option_no"] = "No";

?>