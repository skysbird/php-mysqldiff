<?php
/*  ------------------------------------- *
 *
 *    Projekt:   MySQL Diff
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo
 *               (c) 2001-2003
 *    Hungarian translations:
 *      Robert SIPOS <robsipos@freestyle.co.hu>
 *
 *    $Author: sskus $
 *    $RCSfile: hungarian-iso-8859-2.nls.php,v $
 *    $Revision: 1.16 $
 *    $Date: 2004/09/20 23:12:32 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "iso-8859-2";
$textres_lang = "hu";
$textres_direction = "ltr";

$textres["title_source"] = "Módosítandó Adatbázis:";
$textres["title_target"] = "Minta Adatbázis (adatbázis szerkezet, amilyenre át szeretnénk alakítani):";
$textres["title_options"] = "Beállítások:";
$textres["title_field_renamed"] = "Attribútum átnevezve";
$textres["title_tables_insert"] = "Jelölje ki a táblákat, amelyekre INSERT utasítást készüljön";
$textres["title_tables_replace"] = "Jelölje ki a táblákat, amelyekre REPLACE utasítás készüljön";

$textres["label_hostname"] = "Hoszt";
$textres["label_database"] = "Adatbázis";
$textres["label_username"] = "Felhasználó";
$textres["label_password"] = "Jelszó";
$textres["label_upload"] = "SQL fájl";
$textres["label_select"] = "Válasszon formátumot";

$textres["label_change_table_type"] = "Tábla típusok változtatása";
$textres["label_alter_table_options"] = "Táblaszerkezet módosító ALTER parancsok";
$textres["label_alter_table_auto_incr"] = "Consider auto_increment parameter";
$textres["label_alter_table_charset"] = "Tábla karakterkészletének változtatása";
$textres["label_alter_comments"] = "ALTER megjegyzések";
$textres["label_alter_changes"] = "Generate hint on changes in attribute format";
$textres["label_merge_statements"] = "Parancsok összevonása";
$textres["label_show_connection_state"] = "Kapcsolat jellemzõk megjelenítése";
$textres["label_syntax_highlighting"] = "Kód szinezés";
$textres["label_cfk_back"] = "Move foreign keys to the end of script";
$textres["label_no_cfk_checks"] = "Deactivate foreign key checks before script run.";
$textres["label_backticks"] = "Backtick használata a tábla és attribútum neveknél";
$textres["label_data"] = "Készíts INSERT vagy REPLACE parancsokat a kijelölt táblákra.";

$textres["link_select_all"] = "Mindet kijelöli";
$textres["link_unselect_all"] = "Kijelölést törli";

$textres["label_field_original"] = "Atribútumok";
$textres["label_field_renamed"] = "átnevezés erre";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Honlap";
$textres["link_start_changes"] = "Változások";
$textres["link_start_downloads"] = "Letöltések";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Hasznos linkek";
$textres["label_start_language"] = "Nyelv";

$textres["button_next"] = "következõ ›››";
$textres["button_prev"] = "‹‹‹ elõzõ";
$textres["button_generate"] = "létrehoz";
$textres["button_reset"] = "újrakezd";
$textres["button_send"] = "fájlba";
$textres["button_switch"] = "felcserél";
$textres["button_apply"] = "alkalmaz";

$textres["comment_create_time"] = "Készült";
$textres["comment_source_info"] = "Módosítandó";
$textres["comment_target_info"] = "Minta";

$textres["error_error"] = "HIBA";
$textres["error_different_connections"] = "Különbözõ kapcsolódások, figyelmen kívül hagy!";
$textres["error_connection_failed"] = "Sikertelen adatbázis kapcsolódás!\nKérem, ellenõrizze a bejelentkezési adatokat.\n(%s)";
$textres["error_txtHost_missing"] = "Hosztnév nincs megadva!";
$textres["error_txtDatabase_missing"] = "Adatbázis nincs megadva!";
$textres["error_txtUser_missing"] = "Felhasználó nincs megadva!";
$textres["error_txtPass_missing"] = "Jelszó nincs megadva!";
$textres["error_txtUpload_missing"] = "Az SQL fájl nincs megadva!";

$textres["info_table_dropped"] = "A(z) %s táblát töröltem!";
$textres["info_fieldformat_changed_single"] = "Megváltozott a formátuma a következõ mezõnek:";
$textres["info_fieldformat_changed_multiple"] = "Megváltozott a formátuma a következõ mezõknek:";
$textres["info_fieldformat_changeinfo"] = "a(z) %s %s-ról %s-ra változott.";
$textres["info_fieldformat_modification_needed"] = "Valószínüleg módosítani kell az adatokat is!";
$textres["info_ddl_start"] = "ADAT DEFINÍCIÓ KEZDÉS";
$textres["info_ddl_stop"] = "ADAT DEFINÍCIÓ VÉGE";
$textres["info_dml_start"] = "ADAT MANIPULÁCIÓ KEZDÉS";
$textres["info_dml_stop"] = "ADAT MANIPULÁCIÓ VÉGE";

$textres["option_yes"] = "Igen";
$textres["option_no"] = "Nem";

?>