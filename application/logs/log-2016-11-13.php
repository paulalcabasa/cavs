<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-11-13 01:33:07 --> Severity: Error --> Call to undefined function decode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 184
ERROR - 2016-11-13 02:54:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:00:13 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 231
ERROR - 2016-11-13 03:00:14 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 231
ERROR - 2016-11-13 03:01:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:02:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:02:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:03:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:17:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:18:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT inv.id inventory_item_id,
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
ERROR - 2016-11-13 03:20:16 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-13 03:20:16 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-13 03:20:16 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-13 03:20:16 --> Severity: Notice --> Undefined property: stdClass::$status_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item.php 46
ERROR - 2016-11-13 03:33:42 --> Severity: Notice --> Undefined index: status C:\wamp64\www\nsmdih_cms\application\libraries\Dt_ssp.php 28
ERROR - 2016-11-13 03:33:42 --> Severity: Notice --> Undefined index: status C:\wamp64\www\nsmdih_cms\application\libraries\Dt_ssp.php 28
ERROR - 2016-11-13 03:33:49 --> Severity: Notice --> Undefined index: status C:\wamp64\www\nsmdih_cms\application\libraries\Dt_ssp.php 28
ERROR - 2016-11-13 03:33:49 --> Severity: Notice --> Undefined index: status C:\wamp64\www\nsmdih_cms\application\libraries\Dt_ssp.php 28
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Undefined variable: inventory_item_details C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 23
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 23
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Undefined variable: inventory_item_details C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 27
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 27
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Undefined variable: inventory_item_details C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 31
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 31
ERROR - 2016-11-13 04:01:55 --> Severity: Notice --> Undefined variable: inventory_item_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 47
ERROR - 2016-11-13 04:05:37 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT inv_stock.id,
					   CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
		               inv_stock.inventory_item_id,
		               inv_stock.supplier_id,
		               inv_stock.initial_quantity,
		               inv_stock.remaining_quantity,
		               inv_stock.unit_of_measure_id,
		               inv_stock.unit_cost,
		               inv_stock.status_id,
		               inv_stock.purchase_date,
		               CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
		               inv.item_name,
		               st.description inventory_item_status
		        FROM inventory_items_stock inv_stock LEFT JOIN inventory_items inv
		        		ON inv_stock.inventory_item_id = inv.id
		        	 LEFT JOIN status st
		        	 	ON st.id = inv.status_id
		        WHERE id = '2'
ERROR - 2016-11-13 04:06:02 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT inv_stock.id,
					   CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
		               inv_stock.inventory_item_id,
		               inv_stock.supplier_id,
		               inv_stock.initial_quantity,
		               inv_stock.remaining_quantity,
		               inv_stock.unit_of_measure_id,
		               inv_stock.unit_cost,
		               inv_stock.status_id,
		               inv_stock.purchase_date,
		               CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
		               inv.item_name,
		               st.description inventory_item_status
		        FROM inventory_items_stock inv_stock LEFT JOIN inventory_items inv
		        		ON inv_stock.inventory_item_id = inv.id
		        	 LEFT JOIN status st
		        	 	ON st.id = inv.status_id
		        WHERE id = '2'
ERROR - 2016-11-13 04:06:15 --> Severity: Notice --> Undefined variable: inventory_item_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 47
ERROR - 2016-11-13 04:07:38 --> Severity: Notice --> Undefined property: stdClass::$stock_id C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 47
ERROR - 2016-11-13 04:14:13 --> Severity: Notice --> Undefined property: stdClass::$date_of_purchase C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 92
ERROR - 2016-11-13 04:22:01 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-13 04:22:01 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-13 04:22:01 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-13 04:22:01 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-13 04:22:01 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 40
ERROR - 2016-11-13 04:39:48 --> Severity: Notice --> Undefined property: stdClass::$disp_purchase_date C:\wamp64\www\nsmdih_cms\application\views\inventory_items\edit_item_stock.php 91
ERROR - 2016-11-13 05:12:47 --> Severity: Notice --> Undefined variable: unit_of_measure C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 310
ERROR - 2016-11-13 05:13:37 --> Severity: Notice --> Undefined variable: unit_of_measure C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 310
ERROR - 2016-11-13 05:14:41 --> Severity: Error --> Call to undefined function encode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 320
ERROR - 2016-11-13 05:19:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    initial_quantity = ?,
				    remaining_quantity = ?,
				    unit' at line 2 - Invalid query: UPDATE inventory_items_stock 
				SET supplier_id = ?,
				    initial_quantity = ?,
				    remaining_quantity = ?,
				    unit_of_measure_id = ?,
				    unit_cost = ?,
				    purchase_date = ?,
				    update_user = ?,
				    date_updated = NOW()
				WHERE id = ?
ERROR - 2016-11-13 05:27:09 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:27:21 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:27:32 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:27:54 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:28:12 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:28:22 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '1'
ERROR - 2016-11-13 05:28:27 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '3'
ERROR - 2016-11-13 05:28:33 --> Query error: Unknown column 'stock_id' in 'where clause' - Invalid query: UPDATE inventory_items_stock
				SET status_id = '6',
					update_user = '208',
					date_updated = NOW()
				WHERE stock_id = '3'
ERROR - 2016-11-13 05:37:01 --> Severity: Notice --> Undefined variable: inventory_item_id C:\wamp64\www\nsmdih_cms\application\controllers\Inventory_Items.php 176
ERROR - 2016-11-13 07:48:19 --> Severity: Parsing Error --> syntax error, unexpected '.=' (T_CONCAT_EQUAL) C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 39
ERROR - 2016-11-13 07:49:13 --> Severity: Parsing Error --> syntax error, unexpected '.=' (T_CONCAT_EQUAL) C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 39
