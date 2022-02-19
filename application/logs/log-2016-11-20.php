<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-11-20 04:02:36 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 100
ERROR - 2016-11-20 04:42:26 --> Severity: Notice --> Undefined property: stdClass::$food_item C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 99
ERROR - 2016-11-20 04:42:26 --> Severity: Notice --> Undefined property: stdClass::$amount C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 100
ERROR - 2016-11-20 04:42:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,NOW())' at line 13 - Invalid query: INSERT INTO food_items (
					food_id,
                    inventory_item_id,
                    inventory_item_stock_id,
                    unit_of_measure_id,
					item_name,
					quantity,
					unit_of_measure,
					unit_cost,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-11-20 04:50:21 --> Severity: Notice --> Undefined property: stdClass::$unit_of_measure_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 101
ERROR - 2016-11-20 04:53:19 --> Severity: Notice --> Undefined property: stdClass::$unit_of_measure_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 101
ERROR - 2016-11-20 05:54:38 --> Severity: Notice --> Undefined variable: inventory_item_stock_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 97
ERROR - 2016-11-20 05:54:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?
ERROR - 2016-11-20 05:54:46 --> Severity: Notice --> Undefined variable: inventory_item_stock_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 97
ERROR - 2016-11-20 05:54:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?
ERROR - 2016-11-20 05:55:01 --> Severity: Notice --> Undefined variable: inventory_item_stock_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 97
ERROR - 2016-11-20 05:55:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?
ERROR - 2016-11-20 05:55:47 --> Severity: Notice --> Undefined variable: inventory_item_stock_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 97
ERROR - 2016-11-20 05:55:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?
ERROR - 2016-11-20 05:56:13 --> Severity: Notice --> Undefined variable: inventory_item_stock_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 97
ERROR - 2016-11-20 05:56:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?
ERROR - 2016-11-20 06:05:15 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '1'
ERROR - 2016-11-20 06:08:05 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '1'
ERROR - 2016-11-20 06:55:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,NOW())' at line 13 - Invalid query: INSERT INTO inventory_items_stock (
					inventory_item_id,
					supplier_id,
					initial_quantity,
					remaining_quantity,
					unit_of_measure_id,
					unit_cost,
					status_id,
					purchase_date,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-11-20 06:55:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,NOW())' at line 13 - Invalid query: INSERT INTO inventory_items_stock (
					inventory_item_id,
					supplier_id,
					initial_quantity,
					remaining_quantity,
					unit_of_measure_id,
					unit_cost,
					status_id,
					purchase_date,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-11-20 14:18:37 --> Query error: Table 'nsmdih_cms_db.food_ingredients' doesn't exist - Invalid query: SELECT id,
    				   food_id,
    				   ingredient_name,
    				   amount,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_ingredients
    			WHERE food_id = '1'
