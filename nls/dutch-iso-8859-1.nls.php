<?php
/*  ------------------------------------- *
 *
 *    Projekt:   MySQL Diff
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo
 *               (c) 2001-2003
 *    Translator:
 *    Pim Snel pim@lingewoud.nl
 *
 *    $Author: sskus $
 *    $RCSfile: dutch-iso-8859-1.nls.php,v $
 *    $Revision: 1.8 $
 *    $Date: 2004/09/24 17:46:02 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "iso-8859-1";
$textres_lang = "nl";
$textres_direction = "ltr";

$textres["title_source"] = "Bron Database (huidige database):";
$textres["title_target"] = "Doel Database (database-layout om naar toe te converteren):";
$textres["title_options"] = "Opties:";
$textres["title_field_renamed"] = "Attribuut hernoemd";
$textres["title_tables_insert"] = "Selecteer tabellen om INSERT statements te maken";
$textres["title_tables_replace"] = "Selecteer tabellen om REPLACE statements te maken";

$textres["label_hostname"] = "Host";
$textres["label_database"] = "Database";
$textres["label_username"] = "Gebruiker";
$textres["label_password"] = "Wachtwoord";
$textres["label_upload"] = "SQL-Bestand";
$textres["label_select"] = "Selecteer medium";

$textres["label_change_table_type"] = "Tabeltype veranderen";
$textres["label_alter_table_options"] = "Tabel opties wijzigen";
$textres["label_alter_table_auto_incr"] = "Overweeg auto_increment parameter(primary automatisch laten optellen)";
$textres["label_alter_table_charset"] = "Karakterset van tabel wijzigen";
$textres["label_alter_comments"] = "Commentaar wijzigen";
$textres["label_alter_changes"] = "Een notitie genereren bij wijzigingen aan attributen";
$textres["label_merge_statements"] = "Statements samenvoegen";
$textres["label_show_connection_state"] = "Connectiestatus weergeven";
$textres["label_syntax_highlighting"] = "Syntaxis gekleurd weergeven";
$textres["label_cfk_back"] = "Verplaats gerelateerde sleutels aan het eind van het script.";
$textres["label_no_cfk_checks"] = "Gerelateerde sleutelcontroles deactiveren voor dat het scrip gaar draaien.";
$textres["label_backticks"] = "Gebruik backticks (`) voor tabel en attribuutnamen";
$textres["label_data"] = "Voor de geselecteerde tabellen INSERT- of REPLACE-statements maken.";

$textres["link_select_all"] = "Alles selecteren";
$textres["link_unselect_all"] = "Alles deselecteren";

$textres["label_field_original"] = "Attribuut";
$textres["label_field_renamed"] = "hernoemd naar";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Homepage";
$textres["link_start_changes"] = "Changelog";
$textres["link_start_downloads"] = "Downloads";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Handige links";
$textres["label_start_language"] = "Taal";

$textres["button_next"] = "volgende ›››";
$textres["button_prev"] = "‹‹‹ vorige";
$textres["button_generate"] = "genereer";
$textres["button_reset"] = "reset";
$textres["button_send"] = "schrijf SQL naar bestand";
$textres["button_switch"] = "verwissel bron- en doeltabel";
$textres["button_apply"] = "toepassen";

$textres["comment_create_time"] = "Tijd verstreken";
$textres["comment_source_info"] = "Bron info";
$textres["comment_target_info"] = "Doel info";

$textres["error_error"] = "FOUT";
$textres["error_different_connections"] = "Verschillen connecties. Actie gestopt!";
$textres["error_connection_failed"] = "Database-connectie mislukt!\nControleer a.u.b. uw inloginformatie.\n(%s)";
$textres["error_txtHost_missing"] = "Hostnaam ontbreekt!";
$textres["error_txtDatabase_missing"] = "Databasename ontbreekt!";
$textres["error_txtUser_missing"] = "Gebruikersnaam ontbreekt!";
$textres["error_txtPass_missing"] = "Wachtwoord ontbreekt!";
$textres["error_txtUpload_missing"] = "Het bestand dat u heeft ge-upload ontbreekt!";

$textres["info_table_dropped"] = "Tabel %s verwijderd!";
$textres["info_fieldformat_changed_single"] = "Veldformaat van";
$textres["info_fieldformat_changed_multiple"] = "Veldformaten van";
$textres["info_fieldformat_changeinfo"] = "%s veranderd van %s naar %s.";
$textres["info_fieldformat_modification_needed"] = "Het is mogelijk dat datamodificaties noodzakelijk zijn!";
$textres["info_ddl_start"] = "DDL START";
$textres["info_ddl_stop"] = "DDL EINDE";
$textres["info_dml_start"] = "DML START";
$textres["info_dml_stop"] = "DML EINDE";

$textres["option_yes"] = "Ja";
$textres["option_no"] = "Nee";

?>
