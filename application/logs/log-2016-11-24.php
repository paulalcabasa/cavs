<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-11-24 10:53:30 --> Severity: Notice --> Undefined property: Reports::$inventory_item_model C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1097
ERROR - 2016-11-24 10:53:30 --> Severity: Error --> Call to a member function get_inventory_items_list() on null C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1097
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined variable: uom C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined variable: uom C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Undefined variable: uom C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:12 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:22 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:22 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 10:57:22 --> Severity: Notice --> Undefined property: stdClass::$id C:\wamp64\www\nsmdih_cms\application\views\reports\supplier_item_price.php 32
ERROR - 2016-11-24 11:08:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 7 - Invalid query: SELECT uom.id uom_id,
				       CONCAT('UOM',LPAD(uom.id,4,'0')) uom_no,
				       uom.abbreviation,
				       uom.description,
				       uom.status_id
				FROM unit_of_measure uom
				WHERE uom.id = ?
ERROR - 2016-11-24 11:08:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 7 - Invalid query: SELECT uom.id uom_id,
				       CONCAT('UOM',LPAD(uom.id,4,'0')) uom_no,
				       uom.abbreviation,
				       uom.description,
				       uom.status_id
				FROM unit_of_measure uom
				WHERE uom.id = ?
ERROR - 2016-11-24 11:13:19 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1144
ERROR - 2016-11-24 11:15:34 --> Severity: Error --> Class 'Pdf' not found C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1145
ERROR - 2016-11-24 11:15:52 --> Severity: Error --> Class 'Pdf' not found C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1145
ERROR - 2016-11-24 11:15:56 --> Severity: Error --> Class 'Pdf' not found C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1145
ERROR - 2016-11-24 11:17:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-24 11:40:02 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '7'
ERROR - 2016-11-24 12:53:41 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '3'
ERROR - 2016-11-24 13:03:31 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '9'
ERROR - 2016-11-24 13:03:59 --> Query error: Unknown column 'ingredient_name' in 'field list' - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_items
    			WHERE food_id = '9'
ERROR - 2016-11-24 13:04:00 --> Query error: Unknown column 'ingredient_name' in 'field list' - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_items
    			WHERE food_id = '9'
ERROR - 2016-11-24 13:04:25 --> Query error: Unknown column 'amount' in 'field list' - Invalid query: SELECT id,
    				   food_id,
    				   item_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_items
    			WHERE food_id = '9'
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 166
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 167
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 170
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 166
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 167
ERROR - 2016-11-24 13:05:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 170
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 73
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 74
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 77
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 73
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 74
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 77
ERROR - 2016-11-24 13:10:40 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 113
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 73
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 74
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 77
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$ingredient_name C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 73
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 74
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 77
ERROR - 2016-11-24 13:10:41 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 113
ERROR - 2016-11-24 13:10:58 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 113
ERROR - 2016-11-24 13:11:58 --> Severity: Notice --> Undefined variable: qty_adjustments C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 66
ERROR - 2016-11-24 13:11:58 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 183
ERROR - 2016-11-24 13:12:05 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:12:30 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:12:49 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:13:11 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 178
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 178
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 179
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 179
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 180
ERROR - 2016-11-24 13:14:13 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 205
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 130
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 130
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 131
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 131
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 132
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 132
ERROR - 2016-11-24 13:15:02 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 157
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 175
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 175
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 176
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 176
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 177
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 177
ERROR - 2016-11-24 13:16:02 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 202
ERROR - 2016-11-24 13:17:11 --> Severity: Notice --> Undefined variable: transaction_header_details C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 174
ERROR - 2016-11-24 13:17:11 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 174
ERROR - 2016-11-24 13:17:11 --> Severity: Notice --> Undefined variable: qty_adjustments_tbl C:\wamp64\www\nsmdih_cms\application\views\food_inventory\cancel_food_item.php 200
ERROR - 2016-11-24 13:31:18 --> Severity: Notice --> Undefined variable: _post C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 530
ERROR - 2016-11-24 13:31:31 --> Severity: Notice --> Undefined variable: _Post C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 530
ERROR - 2016-11-24 13:35:57 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-24 13:35:57 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-24 13:35:57 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-24 13:35:57 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-24 13:35:58 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-24 14:54:45 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:54:45 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:55:44 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:55:44 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:55:50 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:55:50 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:55:55 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:55:55 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:56:00 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:56:00 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:56:07 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:56:07 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:56:16 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:56:16 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:56:37 --> Severity: Notice --> Undefined index: quantity C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 55
ERROR - 2016-11-24 14:56:37 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:57:06 --> Severity: Notice --> Undefined index: food_name C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 59
ERROR - 2016-11-24 14:58:10 --> Severity: Notice --> Undefined index: transaction_state_id C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Expense.php 51
ERROR - 2016-11-24 15:27:05 --> Severity: Notice --> Undefined variable: customer_list C:\wamp64\www\nsmdih_cms\application\views\reports\inventory_expense_report.php 39
ERROR - 2016-11-24 15:27:05 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\reports\inventory_expense_report.php 39
ERROR - 2016-11-24 15:35:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `th`.`person_type_id` IS NULL' at line 8 - Invalid query: SELECT CONCAT('OR', LPAD(th.id, 5, 0)) transaction_no, `pt`.`person_type_name` `customer_type`, `th`.`customer_name`, `fd`.`food_name`, `tl`.`selling_price` `unit_price`, `tl`.`quantity`, (tl.selling_price * tl.quantity) amount, DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date
FROM `transaction_lines` `tl`
LEFT JOIN `transaction_headers` `th` ON `tl`.`transaction_header_id` = `th`.`id`
LEFT JOIN `foods` `fd` ON `fd`.`id` = `tl`.`food_id`
LEFT JOIN `person_types` `pt` ON `pt`.`id` = `th`.`person_type_id`
LEFT JOIN `persons` `pr` ON `pr`.`id` = `th`.`person_id`
WHERE `th`.`transaction_status` = 1
AND DATE(th.date_created) > `IS` `NULL`
AND DATE(th.date_created) < `IS` `NULL`
AND `th`.`person_type_id` IS NULL
ERROR - 2016-11-24 15:36:11 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 1289
