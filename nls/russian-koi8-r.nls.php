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
 *    $RCSfile: russian-koi8-r.nls.php,v $
 *    $Revision: 1.20 $
 *    $Date: 2004/09/20 23:12:32 $
 *    $State: Exp $
 *
 * ------------------------------------- */

$textres_charset = "koi8-r";
$textres_lang = "ru";
$textres_direction = "ltr";

$textres["title_source"] = "Исходная БД (текущая БД):";
$textres["title_target"] = "Конечная БД (БД к которой надо преобразовать):";
$textres["title_options"] = "Параметры:";
$textres["title_field_renamed"] = "Аттрибут переименован";
$textres["title_tables_insert"] = "Выберите таблицу для создания INSERT выражений";
$textres["title_tables_replace"] = "Выберите таблицу для создания REPLACE выражений";

$textres["label_hostname"] = "Хост";
$textres["label_database"] = "Название БД";
$textres["label_username"] = "Пользователь";
$textres["label_password"] = "Пароль";
$textres["label_upload"] = "SQL-File";
$textres["label_select"] = "Select medium";

$textres["label_change_table_type"] = "Изменить тип таблицы";
$textres["label_alter_table_options"] = "Параметры таблицы изменения";
$textres["label_alter_table_auto_incr"] = "Consider auto_increment parameter";
$textres["label_alter_table_charset"] = "Alter table charset";
$textres["label_alter_comments"] = "Комментарии изменений";
$textres["label_alter_changes"] = "Generate hint on changes in attribute format";
$textres["label_merge_statements"] = "Обьединяющие выражения";
$textres["label_show_connection_state"] = "Показать статус соединения";
$textres["label_syntax_highlighting"] = "Подсветка синтаксиса";
$textres["label_cfk_back"] = "Move foreign keys to the end of script";
$textres["label_no_cfk_checks"] = "Deactivate foreign key checks before script run.";
$textres["label_backticks"] = "Используйте предидущие названия для таблиц и названий аттрибутов";
$textres["label_data"] = "Создать INSERT - или REPLACE - выражения для выбранных таблиц.";

$textres["link_select_all"] = "Выделить всё";
$textres["link_unselect_all"] = "Убрать выделение";

$textres["label_field_original"] = "Аттрибут";
$textres["label_field_renamed"] = "переименован в";

$textres["label_start_homepage"] = "MySQLDiff";
$textres["link_start_homepage"] = "Домашняя страница";
$textres["link_start_changes"] = "Изменения";
$textres["link_start_downloads"] = "Загрузить";
$textres["label_start_mysql_homepage"] = "MySQL";
$textres["label_start_useful_links"] = "Интересные ссылки";
$textres["label_start_language"] = "Язык";

$textres["button_next"] = "Далее ⌡⌡⌡";
$textres["button_prev"] = "▀▀▀ Назад";
$textres["button_generate"] = "Сгенерировать";
$textres["button_reset"] = "Сбросить";
$textres["button_send"] = "Отправить";
$textres["button_switch"] = "switch";
$textres["button_apply"] = "apply";

$textres["comment_create_time"] = "Дата создания";
$textres["comment_source_info"] = "Исходные данные";
$textres["comment_target_info"] = "Конечные данные";

$textres["error_error"] = "ОШИБКА";
$textres["error_different_connections"] = "Множественное соединения не удались!";
$textres["error_connection_failed"] = "Ошибка в соединении с базой данных!\nПожалуйста проверьте введённые данные.\n(%s)";
$textres["error_txtHost_missing"] = "Хост указан неверное!";
$textres["error_txtDatabase_missing"] = "Название БД ошибочно!";
$textres["error_txtUser_missing"] = "Имя пользователя не верно!";
$textres["error_txtPass_missing"] = "Пароль не верен!";
$textres["error_txtUpload_missing"] = "The file upload is missing!";

$textres["info_table_dropped"] = "Таблица %s удалена!";
$textres["info_fieldformat_changed_single"] = "Формат поля для";
$textres["info_fieldformat_changed_multiple"] = "Формат поля для";
$textres["info_fieldformat_changeinfo"] = "%s измененно с %s на %s.";
$textres["info_fieldformat_modification_needed"] = "Возможно потребуеться изменение данных!";
$textres["info_ddl_start"] = "DDL START";
$textres["info_ddl_stop"] = "DDL END";
$textres["info_dml_start"] = "DML START";
$textres["info_dml_stop"] = "DML END";

$textres["option_yes"] = "Да";
$textres["option_no"] = "Нет";

?>