<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-08-21 03:29:46 --> Severity: Error --> Call to undefined function decode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 44
ERROR - 2016-08-21 03:29:49 --> Severity: Error --> Call to undefined function decode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 44
ERROR - 2016-08-21 03:30:11 --> Severity: Error --> Call to undefined function decode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 45
ERROR - 2016-08-21 03:49:02 --> Severity: Notice --> Undefined variable: food_categories C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 26
ERROR - 2016-08-21 03:49:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 26
ERROR - 2016-08-21 03:49:12 --> Severity: Notice --> Undefined variable: food_categories C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 26
ERROR - 2016-08-21 03:49:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 26
ERROR - 2016-08-21 03:49:44 --> Severity: Notice --> Undefined variable: food_categories C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 21
ERROR - 2016-08-21 03:49:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 21
ERROR - 2016-08-21 04:03:38 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT fd.id,
                       fd.food_category_id,
                       fd.food_name,
                       fd.initial_quantity,
                       fd.quantity,
                       fd.unit_price,
                       fd.unit_cost,
                       fd.mark_up_percentage,
                       fd.mark_up_value,
                       fd.total_food_cost,
                       fd.total_food_price,
                       fd.barcode_value,
                       fc.category
                FROM foods fd LEFT JOIN food_categories fc
                		ON fd.food_category_id = fc.id
                WHERE id = '1'
ERROR - 2016-08-21 04:06:10 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 19
ERROR - 2016-08-21 04:06:56 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 19
ERROR - 2016-08-21 04:13:14 --> Severity: Notice --> Undefined property: stdClass::$barcode C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 30
ERROR - 2016-08-21 04:52:58 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 53
ERROR - 2016-08-21 05:20:54 --> Severity: Parsing Error --> syntax error, unexpected ')', expecting ';' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 225
ERROR - 2016-08-21 05:25:10 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 160
ERROR - 2016-08-21 05:25:16 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 160
ERROR - 2016-08-21 06:01:52 --> Severity: Notice --> Undefined property: stdClass::$selling_price C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 73
ERROR - 2016-08-21 06:23:17 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 145
ERROR - 2016-08-21 06:32:43 --> Severity: Error --> Call to undefined method Food_model::get_sales_per_item_report() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 50
ERROR - 2016-08-21 06:32:54 --> Severity: Error --> Call to undefined method Food_model::get_sales_per_item_report() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 50
ERROR - 2016-08-21 14:48:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,' at line 2 - Invalid query: SELECT CONCAT('FD',LPAD(fd.id,5,0)) food_no
				       fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,
				       fd.initial_quantity,
				       fd.total_food_cost,
				       (fd.total_food_price - fd.total_food_cost) expected_revenue,
				       (fd.initial_quantity - fd.quantity) sold_quantity,
				       fd.quantity,
				       ((fd.initial_quantity - fd.quantity) * fd.unit_price) total_sales,
				       (((fd.initial_quantity - fd.quantity) * fd.unit_price) - fd.total_food_cost) actual_revenue
				FROM foods fd
				WHERE DATE_FORMAT(fd.date_created,'%Y-%m-%d') BETWEEN '2016-08-01 00:00:00' AND '2016-08-31 23:59:59'
ERROR - 2016-08-21 14:49:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,' at line 2 - Invalid query: SELECT CONCAT('FD',LPAD(fd.id,5,0)) food_no
				       fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,
				       fd.initial_quantity,
				       fd.total_food_cost,
				       (fd.total_food_price - fd.total_food_cost) expected_revenue,
				       (fd.initial_quantity - fd.quantity) sold_quantity,
				       fd.quantity,
				       ((fd.initial_quantity - fd.quantity) * fd.unit_price) total_sales,
				       (((fd.initial_quantity - fd.quantity) * fd.unit_price) - fd.total_food_cost) actual_revenue
				FROM foods fd
				WHERE DATE_FORMAT(fd.date_created,'%Y-%m-%d') BETWEEN '2016-08-01 00:00:00' AND '2016-08-31 23:59:59'
ERROR - 2016-08-21 14:49:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,' at line 2 - Invalid query: SELECT CONCAT('FD',LPAD(fd.id,5,0)) food_no
				       fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,
				       fd.initial_quantity,
				       fd.total_food_cost,
				       (fd.total_food_price - fd.total_food_cost) expected_revenue,
				       (fd.initial_quantity - fd.quantity) sold_quantity,
				       fd.quantity,
				       ((fd.initial_quantity - fd.quantity) * fd.unit_price) total_sales,
				       (((fd.initial_quantity - fd.quantity) * fd.unit_price) - fd.total_food_cost) actual_revenue
				FROM foods fd
				WHERE DATE_FORMAT(fd.date_created,'%Y-%m-%d') BETWEEN NULL AND NULL
ERROR - 2016-08-21 14:51:24 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 112
ERROR - 2016-08-21 14:51:31 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:53:08 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 112
ERROR - 2016-08-21 14:53:15 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:53:23 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 112
ERROR - 2016-08-21 14:55:32 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:55:38 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 112
ERROR - 2016-08-21 14:56:00 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:56:00 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:56:02 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:56:48 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:57:22 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-21 14:57:36 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
