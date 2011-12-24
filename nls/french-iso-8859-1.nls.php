<?php
/*  ------------------------------------- *
 *
 *    Project:   MySQL Diff
 *    Copyright: Lippe-Net Online-Service
 *               Bielefeld, Lemgo, Germany
 *               (c) 2001-2003
 *    French translations:
 *      St�phane EVAIN <sevain@noos.fr>
 *
 *    $Author: sskus $
 *    $RCSfile: french-iso-8859-1.nls.php,v $
 *    $Revision: 1.27 $
 *    $Date: 2004/09/20 23:12:32 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "iso-8859-1";
$textres_lang = "fr";
$textres_direction = "ltr";

$textres["title_source"] = "Base source (base courante):";
$textres["title_target"] = "Base cible (base � convertir):";
$textres["title_options"] = "Options:";
$textres["title_field_renamed"] = "Attribut renomm�:";
$textres["title_tables_insert"] = "Tables choisies pour cr�er des INSERT statements";
$textres["title_tables_replace"] = "Tables choisies pour cr�er des REPLACE statements";

$textres["label_hostname"] = "Machine";
$textres["label_database"] = "Base de donn�es";
$textres["label_username"] = "Utilisateur";
$textres["label_password"] = "Mot de passe";
$textres["label_upload"] = "SQL-File";
$textres["label_select"] = "Select medium";

$textres["label_change_table_type"] = "Changer le type de table";
$textres["label_alter_table_options"] = "Options des tables";
$textres["label_alter_table_auto_incr"] = "Consider auto_increment parameter";
$textres["label_alter_table_charset"] = "Alter table charset";
$textres["label_alter_comments"] = "Alt�re les commentaires";
$textres["label_alter_changes"] = "Generate hint on changes in attribute format";
$textres["label_merge_statements"] = "Fusionner les blocs";
$textres["label_show_connection_state"] = "Afficher l'�tat de la connexion";
$textres["label_syntax_highlighting"] = "Colorisation syntaxique";
$textres["label_cfk_back"] = "Move foreign keys to the end of script";
$textres["label_no_cfk_checks"] = "Deactivate foreign key checks before script run.";
$textres["label_backticks"] = "Utilise Backticks pour les noms des table et des attributs";
$textres["label_data"] = "Cr�er blocs INSERT- ou REPLACE- pour les tables s�lectionn�es";

$textres["link_select_all"] = "Tout s�lectionner";
$textres["link_unselect_all"] = "Tout d�s�lectionner";

$textres["label_field_original"] = "Attributs";
$textres["label_field_renamed"] = "renommer vers";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Page d'accueil";
$textres["link_start_changes"] = "Changements";
$textres["link_start_downloads"] = "T�l�chargement";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Liens utiles";
$textres["label_start_language"] = "Langue";

$textres["button_next"] = "Suivant ���";
$textres["button_prev"] = "��� Pr�c�dent";
$textres["button_generate"] = "gen�re";
$textres["button_reset"] = "remise � z�ro";
$textres["button_send"] = "transmettre";
$textres["button_switch"] = "echange";
$textres["button_apply"] = "appliquer";

$textres["comment_create_time"] = "Date de cr�ation";
$textres["comment_source_info"] = "Information sur la source";
$textres["comment_target_info"] = "Information sur la cible";

$textres["error_error"] = "ERREUR";
$textres["error_different_connections"] = "Les connexions sont diff�rentes!";
$textres["error_connection_failed"] = "La connexion � la base a �chou�e!\nV�rifiez les infos de connexion.\n(%s)";
$textres["error_txtHost_missing"] = "Nom de machine manquant!";
$textres["error_txtDatabase_missing"] = "Nom de base de donn�es manquant!";
$textres["error_txtUser_missing"] = "Nom d'utilisateur manquant!";
$textres["error_txtPass_missing"] = "Mot de passe manquant!";
$textres["error_txtUpload_missing"] = "The file upload is missing!";

$textres["info_table_dropped"] = "Table %s supprim�e!";
$textres["info_fieldformat_changed_single"] = "Format du champ";
$textres["info_fieldformat_changed_multiple"] = "Format des champs";
$textres["info_fieldformat_changeinfo"] = "%s modifi� de %s vers %s.";
$textres["info_fieldformat_modification_needed"] = "Modifications de donn�es �ventuellment n�cessaires!";
$textres["info_ddl_start"] = "DEBUT DDL";
$textres["info_ddl_stop"] = "FIN DDL";
$textres["info_dml_start"] = "DEBUT DML";
$textres["info_dml_stop"] = "FIN DML";

$textres["option_yes"] = "Oui";
$textres["option_no"] = "Non";

?>