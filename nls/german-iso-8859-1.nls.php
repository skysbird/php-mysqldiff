<?php
/*  ------------------------------------- *
 *
 *    Projekt:   MySQL Diff
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo
 *               (c) 2001-2003
 *    Translator:
 *
 *
 *    $Author: sskus $
 *    $RCSfile: german-iso-8859-1.nls.php,v $
 *    $Revision: 1.33 $
 *    $Date: 2004/09/20 23:12:32 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "iso-8859-1";
$textres_lang = "de";
$textres_direction = "ltr";

$textres["title_source"] = "Quelldatenbank";
$textres["title_target"] = "Zieldatenbank";
$textres["title_options"] = "Einstellungen";
$textres["title_field_renamed"] = "Attribut umbenannt";
$textres["title_tables_insert"] = "Tabellen für INSERT statments auswählen";
$textres["title_tables_replace"] = "Tabellen für REPLACE statments auswählen";

$textres["label_hostname"] = "Host";
$textres["label_database"] = "Datenbank";
$textres["label_username"] = "Benutzer";
$textres["label_password"] = "Kennwort";
$textres["label_upload"] = "SQL-Datei";
$textres["label_select"] = "Medium wählen";

$textres["label_change_table_type"] = "Tabellentypen anpassen";
$textres["label_alter_table_options"] = "Tabelleneinstellungen ändern";
$textres["label_alter_table_auto_incr"] = "Auto_increment Parameter berücksichtigen";
$textres["label_alter_table_charset"] = "Zeichensätze anpassen";
$textres["label_alter_comments"] = "Tabellen Kommentare";
$textres["label_alter_changes"] = "Hinweise auf Änderungen des Feldformat's generieren";
$textres["label_merge_statements"] = "Ein ALTER Statement für jede Tabelle";
$textres["label_show_connection_state"] = "Verbindungsstatus anzeigen";
$textres["label_syntax_highlighting"] = "Syntax Hervorhebung";
$textres["label_cfk_back"] = "Fremdschlüssel am Ende des Scripts berücksichtigen.";
$textres["label_no_cfk_checks"] = "Fremdschlüsselprüfung am Scriptanfang deaktivieren.";
$textres["label_backticks"] = "Backticks für Tablen und Attributnamen verwenden";
$textres["label_data"] = "INSERT- or REPLACE-Statements für ausgewählte Tabellen erstellen.";

$textres["link_select_all"] = "Alles auswählen";
$textres["link_unselect_all"] = "Auswahl aufheben";

$textres["label_field_original"] = "Attribut";
$textres["label_field_renamed"] = "Umbenannt in";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Homepage";
$textres["link_start_changes"] = "Changelog";
$textres["link_start_downloads"] = "Downloads";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Nützliche Links";
$textres["label_start_language"] = "Sprache";

$textres["button_next"] = "weiter ›››";
$textres["button_prev"] = "‹‹‹ zurück";
$textres["button_generate"] = "generieren";
$textres["button_reset"] = "zurücksetzen";
$textres["button_send"] = "senden";
$textres["button_switch"] = "tauschen";
$textres["button_apply"] = "anwenden";

$textres["comment_create_time"] = "Erstellt am";
$textres["comment_source_info"] = "Quelldatenbank";
$textres["comment_target_info"] = "Zieldatenbank";

$textres["error_error"] = "FEHLER";
$textres["error_different_connections"] = "Wird übersprungen weil verschiedene Verbindungen!";
$textres["error_connection_failed"] = "Die Datenbankverbindung ist fehlgeschlagen!\nBitte prüfen Sie die Zugangsdaten.\n(%s)";
$textres["error_txtHost_missing"] = "Hostname fehlt!";
$textres["error_txtDatabase_missing"] = "Datenbankname fehlt!";
$textres["error_txtUser_missing"] = "Benutzername fehlt!";
$textres["error_txtPass_missing"] = "Kennwort fehlt!";
$textres["error_txtUpload_missing"] = "Es wurde keine Datei hochgeladen!";

$textres["info_table_dropped"] = "Tabelle %s wurde gelöscht!";
$textres["info_fieldformat_changed_single"] = "Feldformat";
$textres["info_fieldformat_changed_multiple"] = "Feldformate";
$textres["info_fieldformat_changeinfo"] = "%s geändert von %s nach %s.";
$textres["info_fieldformat_modification_needed"] = "Eventuell müssen noch Daten angepaßt werden!";
$textres["info_ddl_start"] = "DDL START";
$textres["info_ddl_stop"] = "DDL ENDE";
$textres["info_dml_start"] = "DML START";
$textres["info_dml_stop"] = "DML ENDE";

$textres["option_yes"] = "Ja";
$textres["option_no"] = "Nein";

?>