<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:16:58 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:11 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:33:38 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 06:34:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `tps`.`payment_mode_id` IN(''' at line 7 - Invalid query: SELECT `tps`.`id` `payment_id`, CONCAT('OR', LPAD(tps.transaction_header_id, 5, '0')) transaction_no, `pt`.`person_type_name` `customer_type`, `th`.`customer_name`, `pm`.`mode_of_payment`, `tps`.`amount`, DATE_FORMAT(th.date_created, '%m/%d/%Y') transaction_date
FROM `transaction_payments` `tps`
LEFT JOIN `payment_modes` `pm` ON `tps`.`payment_mode_id` = `pm`.`id`
LEFT JOIN `transaction_headers` `th` ON `th`.`id` = `tps`.`transaction_header_id`
LEFT JOIN `person_types` `pt` ON `pt`.`id` = `th`.`person_type_id`
WHERE `th`.`transaction_status` = 1
AND DATE(th.date_created) > `IS` `NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `tps`.`payment_mode_id` IN('')
ERROR - 2017-01-19 06:34:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `tps`.`payment_mode_id` IN(''' at line 7 - Invalid query: SELECT `tps`.`id` `payment_id`, CONCAT('OR', LPAD(tps.transaction_header_id, 5, '0')) transaction_no, `pt`.`person_type_name` `customer_type`, `th`.`customer_name`, `pm`.`mode_of_payment`, `tps`.`amount`, DATE_FORMAT(th.date_created, '%m/%d/%Y') transaction_date
FROM `transaction_payments` `tps`
LEFT JOIN `payment_modes` `pm` ON `tps`.`payment_mode_id` = `pm`.`id`
LEFT JOIN `transaction_headers` `th` ON `th`.`id` = `tps`.`transaction_header_id`
LEFT JOIN `person_types` `pt` ON `pt`.`id` = `th`.`person_type_id`
WHERE `th`.`transaction_status` = 1
AND DATE(th.date_created) > `IS` `NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `tps`.`payment_mode_id` IN('')
ERROR - 2017-01-19 07:38:19 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:19 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:19 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:19 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:19 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:31 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:31 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:31 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:31 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:38:31 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:39:43 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:39:43 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:39:43 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:39:43 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:39:43 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:43:42 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:43:42 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:43:42 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:43:42 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:43:42 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:46 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:46 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:46 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:46 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:46 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:48 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:48 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:48 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:48 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:44:48 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:45:45 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:45:45 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:45:45 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:45:45 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 07:45:45 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 08:00:08 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 08:00:08 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 08:00:08 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 08:00:08 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 08:00:08 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\xampp\htdocs\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-01-19 09:46:50 --> Severity: Notice --> Undefined variable: default_customer C:\xampp\htdocs\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
