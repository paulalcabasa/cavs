<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-11-27 02:36:18 --> Severity: Notice --> Undefined variable: transaction_list C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 33
ERROR - 2016-11-27 04:51:38 --> Severity: Parsing Error --> syntax error, unexpected '$query' (T_VARIABLE) C:\wamp64\www\nsmdih_cms\application\models\Inventory_Item_Model.php 165
ERROR - 2016-11-27 05:02:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 05:02:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 05:02:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 05:02:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 05:02:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 05:30:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
				       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
				       inv.item_name,
				       st.description status,
				       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost,
				       sp.supplier_name
				FROM inventory_items inv LEFT JOIN status st
					ON inv.status_id = st.id
				     LEFT JOIN inventory_items_stock inv_stock 
					ON inv_stock.id = inv.inventory_item_stock_id
				     LEFT JOIN unit_of_measure uom ON 
					uom.id = inv_stock.unit_of_measure_id
				     LEFT JOIN suppliers sp
					ON sp.id = inv_stock.supplier_id
				WHERE inv.id = ?
ERROR - 2016-11-27 05:30:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
				       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
				       inv.item_name,
				       st.description status,
				       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost,
				       sp.supplier_name
				FROM inventory_items inv LEFT JOIN status st
					ON inv.status_id = st.id
				     LEFT JOIN inventory_items_stock inv_stock 
					ON inv_stock.id = inv.inventory_item_stock_id
				     LEFT JOIN unit_of_measure uom ON 
					uom.id = inv_stock.unit_of_measure_id
				     LEFT JOIN suppliers sp
					ON sp.id = inv_stock.supplier_id
				WHERE inv.id = ?
ERROR - 2016-11-27 06:37:06 --> Severity: Notice --> Undefined variable: content C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 22
ERROR - 2016-11-27 06:37:06 --> Severity: Error --> Cannot access empty property C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 21
ERROR - 2016-11-27 06:40:48 --> Severity: Notice --> Undefined variable: food_categories C:\wamp64\www\nsmdih_cms\application\views\transactions\new_transaction.php 19
ERROR - 2016-11-27 06:40:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\transactions\new_transaction.php 19
ERROR - 2016-11-27 07:02:53 --> Severity: Parsing Error --> syntax error, unexpected ''>' (T_CONSTANT_ENCAPSED_STRING), expecting ',' or ';' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 587
ERROR - 2016-11-27 07:03:25 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting ',' or ';' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 588
ERROR - 2016-11-27 07:04:16 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting ',' or ';' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 588
ERROR - 2016-11-27 07:04:28 --> Severity: Parsing Error --> syntax error, unexpected '}' C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 612
ERROR - 2016-11-27 07:26:42 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 07:26:42 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 07:26:42 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 07:26:42 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 07:26:42 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 07:33:40 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:33:40 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:33:40 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:33:40 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:33:40 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:33:43 --> Severity: Error --> Call to undefined method Reports::generate_sales_report() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 463
ERROR - 2016-11-27 07:34:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:34:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:34:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:34:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:34:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:34:53 --> Severity: Error --> Call to undefined method Reports_model::generate_sales_report() C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 432
ERROR - 2016-11-27 07:35:27 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:27 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:27 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:27 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:27 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:31 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:31 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:31 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:31 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 07:35:31 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:55 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:55 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:55 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:55 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:03:55 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:08 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:08 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:08 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:08 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:08 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:14 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:14 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:14 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:14 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:14 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:04:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:04:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:04:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:04:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:04:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:28 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:28 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:28 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:28 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:28 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:12:32 --> Query error: Unknown column 'th.transaction_status' in 'where clause' - Invalid query: SELECT `transaction_no`, `customer_type`, `customer_name`, `total_amount`, `transaction_date`
FROM `transactions_v`
WHERE `th`.`transaction_status` = 1
AND DATE(th.date_created) >= '2016-11-01'
AND DATE(th.date_created) <= '2016-11-30'
ERROR - 2016-11-27 08:14:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:14:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:14:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:14:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:14:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 08:19:24 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT CONCAT('ITEM',LPAD(id,5,0)) item_no,
                       ingredient_name,
                       amount,
                       unit_of_measure,
                       unit_cost,
                       (amount * unit_cost) total_cost,
                       DATE_FORMAT(date_created,'%m/%d/%Y %l:%i %p') date_created
                FROM food_ingredients
                WHERE DATE(date_created) BETWEEN '2016-11-01 00:00:00' AND '2016-11-30 23:59:59'
ERROR - 2016-11-27 08:41:41 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:41:41 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:41:41 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:41:41 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:41:41 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:47:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:47:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:48:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1',' at line 14 - Invalid query: INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					meal_allowance_id
					create_user,
					date_created
				) 
				VALUES('1','5','29-774','29-774-1','ABUNDO, MA. JOELIZA T.','','','','','40','','153','208',NOW())
ERROR - 2016-11-27 08:53:34 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:53:34 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:53:34 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:53:34 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:53:34 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 08:55:56 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row C:\wamp64\www\nsmdih_cms\system\database\drivers\mysqli\mysqli_driver.php 305
ERROR - 2016-11-27 08:55:56 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT inv_stock.id,
				       inv_stock.inventory_item_id,
				       sp.supplier_name,
				      (SELECT unit_cost FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                  )
				       ) price,
				        (SELECT initial_quantity FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                  )
				       ) quantity,
				       (SELECT DATE_FORMAT(MAX(purchase_date),'%m/%d/%Y') FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id) purchase_date
				FROM inventory_items_stock inv_stock INNER JOIN suppliers sp
					ON inv_stock.supplier_id = sp.id
				WHERE inv_stock.inventory_item_id = '1'
				      AND inv_stock.status_id = 6
				      AND inv_stock.unit_of_measure_id = '1'
				      GROUP BY supplier_id
				      ORDER BY price ASC
ERROR - 2016-11-27 09:01:14 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row C:\wamp64\www\nsmdih_cms\system\database\drivers\mysqli\mysqli_driver.php 305
ERROR - 2016-11-27 09:01:14 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT inv_stock.id,
				       inv_stock.inventory_item_id,
				       sp.supplier_name,
				      (SELECT unit_cost FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                  )
				       ) price,
				        (SELECT initial_quantity FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                  )
				       ) quantity,
				       (SELECT DATE_FORMAT(MAX(purchase_date),'%m/%d/%Y') FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id) purchase_date
				FROM inventory_items_stock inv_stock INNER JOIN suppliers sp
					ON inv_stock.supplier_id = sp.id
				WHERE inv_stock.inventory_item_id = '3'
				      AND inv_stock.status_id = 6
				      AND inv_stock.unit_of_measure_id = '6'
				      GROUP BY supplier_id
				      ORDER BY price ASC
ERROR - 2016-11-27 09:07:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
				                                  )
				       ) price,
				       (SEL' at line 9 - Invalid query: SELECT inv_stock.id,
				       inv_stock.inventory_item_id,
				       sp.supplier_name,
				      (SELECT unit_cost FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) price,
				       (SELECT initial_quantity FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) quantity,
				       (SELECT DATE_FORMAT(MAX(purchase_date),'%m/%d/%Y') FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				       AND unit_of_measure_id = ?) purchase_date
				FROM inventory_items_stock inv_stock INNER JOIN suppliers sp
					ON inv_stock.supplier_id = sp.id
				WHERE inv_stock.inventory_item_id = ?
				      AND inv_stock.status_id = ?
				      AND inv_stock.unit_of_measure_id = ?
				      GROUP BY supplier_id
				      ORDER BY price ASC
ERROR - 2016-11-27 09:07:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
				                                  )
				       ) price,
				       (SEL' at line 9 - Invalid query: SELECT inv_stock.id,
				       inv_stock.inventory_item_id,
				       sp.supplier_name,
				      (SELECT unit_cost FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) price,
				       (SELECT initial_quantity FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) quantity,
				       (SELECT DATE_FORMAT(MAX(purchase_date),'%m/%d/%Y') FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				       AND unit_of_measure_id = ?) purchase_date
				FROM inventory_items_stock inv_stock INNER JOIN suppliers sp
					ON inv_stock.supplier_id = sp.id
				WHERE inv_stock.inventory_item_id = ?
				      AND inv_stock.status_id = ?
				      AND inv_stock.unit_of_measure_id = ?
				      GROUP BY supplier_id
				      ORDER BY price ASC
ERROR - 2016-11-27 09:08:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
				       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
				       inv.item_name,
				       st.description status,
				       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost,
				       sp.supplier_name
				FROM inventory_items inv LEFT JOIN status st
					ON inv.status_id = st.id
				     LEFT JOIN inventory_items_stock inv_stock 
					ON inv_stock.id = inv.inventory_item_stock_id
				     LEFT JOIN unit_of_measure uom ON 
					uom.id = inv_stock.unit_of_measure_id
				     LEFT JOIN suppliers sp
					ON sp.id = inv_stock.supplier_id
				WHERE inv.id = ?
ERROR - 2016-11-27 09:08:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
				       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
				       inv.item_name,
				       st.description status,
				       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost,
				       sp.supplier_name
				FROM inventory_items inv LEFT JOIN status st
					ON inv.status_id = st.id
				     LEFT JOIN inventory_items_stock inv_stock 
					ON inv_stock.id = inv.inventory_item_stock_id
				     LEFT JOIN unit_of_measure uom ON 
					uom.id = inv_stock.unit_of_measure_id
				     LEFT JOIN suppliers sp
					ON sp.id = inv_stock.supplier_id
				WHERE inv.id = ?
ERROR - 2016-11-27 09:26:11 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:26:11 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:26:11 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:26:11 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:26:11 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:09 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:10 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:15 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:15 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:15 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:15 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:15 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:29 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:29 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:29 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:29 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:32:29 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:33:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:33:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:33:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:33:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:33:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:38:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:38:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:38:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:38:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:38:17 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:45:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:45:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:45:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:45:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:45:37 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 09:59:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 09:59:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 09:59:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 09:59:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 09:59:05 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:06:54 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 16
ERROR - 2016-11-27 10:29:26 --> Severity: Warning --> Missing argument 1 for Food_model::get_foods_list(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php on line 31 and defined C:\wamp64\www\nsmdih_cms\application\models\Food_model.php 9
ERROR - 2016-11-27 10:29:26 --> Severity: Notice --> Undefined variable: category C:\wamp64\www\nsmdih_cms\application\models\Food_model.php 25
ERROR - 2016-11-27 10:29:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 15 - Invalid query: SELECT fd.id food_id,
		       fd.food_name,
		       fd.barcode_value,
		       fd.quantity,
		       fd.unit_price,
		       fc.category,
		       (SELECT filename 
				FROM food_images 
				WHERE food_id = fd.id 
				ORDER BY date_created DESC 
				LIMIT 1) food_image
		FROM foods fd LEFT JOIN food_categories fc
			ON fd.food_category_id = fc.id
		WHERE fd.transaction_state_id = 4
              AND fd.food_category_id = ?
ERROR - 2016-11-27 10:47:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:47:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:47:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:47:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:47:50 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report_detailed.php 40
ERROR - 2016-11-27 10:58:47 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 10:58:47 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 10:58:47 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 10:58:47 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 10:58:47 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-27 11:39:02 --> Severity: Parsing Error --> syntax error, unexpected '0' (T_LNUMBER) C:\wamp64\www\nsmdih_cms\application\models\Reports_model.php 358
ERROR - 2016-11-27 13:00:44 --> Severity: Notice --> Undefined variable: transaction_list C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 33
ERROR - 2016-11-27 13:01:41 --> Severity: Notice --> Undefined variable: transaction_list C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 30
ERROR - 2016-11-27 13:06:20 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 32
ERROR - 2016-11-27 13:11:09 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 32
ERROR - 2016-11-27 13:11:55 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 32
ERROR - 2016-11-27 13:12:00 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 84
ERROR - 2016-11-27 13:12:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 84
ERROR - 2016-11-27 13:12:00 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 84
ERROR - 2016-11-27 13:12:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 84
ERROR - 2016-11-27 13:12:28 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:28 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:28 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:28 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:35 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:35 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:35 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:12:36 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:02 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:02 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:33 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:33 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:40 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:40 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:40 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:52 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:52 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:52 --> Severity: Notice --> Undefined variable: txn C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:13:52 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Portal.php 71
ERROR - 2016-11-27 13:36:12 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 34
ERROR - 2016-11-27 13:46:45 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\portal\transaction_history_view.php 32
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 16
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 16
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 20
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 20
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 24
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 24
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 28
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 28
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 32
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 32
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Undefined variable: person_detail C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 36
ERROR - 2016-11-27 14:08:47 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 36
ERROR - 2016-11-27 14:09:06 --> Severity: Notice --> Undefined property: stdClass::$alloted_amount C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 20
ERROR - 2016-11-27 14:09:06 --> Severity: Notice --> Undefined property: stdClass::$valid_from C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 28
ERROR - 2016-11-27 14:09:06 --> Severity: Notice --> Undefined property: stdClass::$valid_until C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 32
ERROR - 2016-11-27 14:10:29 --> Severity: Notice --> Undefined property: stdClass::$alloted_amount C:\wamp64\www\nsmdih_cms\application\views\portal\meal_allowance_history_view.php 20
ERROR - 2016-11-27 14:12:27 --> Severity: Error --> Cannot redeclare format_food_id() (previously declared in C:\wamp64\www\nsmdih_cms\application\helpers\string_helper.php:16) C:\wamp64\www\nsmdih_cms\application\helpers\string_helper.php 39
ERROR - 2016-11-27 14:17:03 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:17:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:17:29 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:17:29 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:18:33 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:18:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:19:41 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:19:42 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:20:33 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:20:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 139
ERROR - 2016-11-27 14:22:31 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 146
ERROR - 2016-11-27 14:22:31 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 146
