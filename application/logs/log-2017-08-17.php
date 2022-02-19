<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:26:07 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 08:55:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`NULL`
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
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2017-08-17 14:03:44 --> Severity: Notice --> Undefined variable: default_customer C:\wamp\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
