<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-12-04 11:43:22 --> Severity: Parsing Error --> syntax error, unexpected '}', expecting identifier (T_STRING) C:\wamp64\www\nsmdih_cms\application\models\Transaction_model.php 202
ERROR - 2016-12-04 11:46:59 --> Severity: Warning --> Missing argument 1 for Transaction_model::insert_temp_transaction_header(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php on line 21 and defined C:\wamp64\www\nsmdih_cms\application\models\Transaction_model.php 191
ERROR - 2016-12-04 11:46:59 --> Severity: Notice --> Undefined variable: create_user C:\wamp64\www\nsmdih_cms\application\models\Transaction_model.php 197
ERROR - 2016-12-04 11:46:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,NOW())' at line 5 - Invalid query: INSERT INTO temp_transaction_header (
					create_user,
					date_created
				) 
				VALUES(?,NOW())
ERROR - 2016-12-04 12:10:34 --> Severity: Notice --> Undefined variable: create_user C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 531
ERROR - 2016-12-04 13:03:27 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:03:27 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:03:27 --> Severity: Notice --> Undefined variable: create_user C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 553
ERROR - 2016-12-04 13:05:24 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:05:24 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:05:55 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:05:55 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 549
ERROR - 2016-12-04 13:37:30 --> Severity: Parsing Error --> syntax error, unexpected '$arr' (T_VARIABLE) C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 596
ERROR - 2016-12-04 13:38:22 --> Severity: Error --> Call to undefined function convert_to_utf8() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 596
ERROR - 2016-12-04 13:38:35 --> Severity: Error --> Call to undefined function convert_to_utf8() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 596
ERROR - 2016-12-04 13:38:45 --> Severity: Error --> Call to undefined function convert_to_utf8() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 596
ERROR - 2016-12-04 13:53:44 --> Severity: Notice --> Undefined index: food_id C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 583
ERROR - 2016-12-04 14:05:45 --> Severity: Notice --> Undefined variable: pending_transactions_ctr C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 13
ERROR - 2016-12-04 14:25:53 --> Severity: Parsing Error --> syntax error, unexpected '{' C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 219
ERROR - 2016-12-04 14:40:42 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 242
ERROR - 2016-12-04 14:40:42 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 242
ERROR - 2016-12-04 15:00:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:00:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 2 - Invalid query: UPDATE `meal_allowance` SET `ma_weekly_claims_count` = '3'
WHERE `id` IN()
ERROR - 2016-12-04 15:00:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `ma_weekly_claims_count` >0' at line 2 - Invalid query: UPDATE `meal_allowance` SET `max_allowance_daily` = '150'
WHERE `id` IN()
AND `ma_weekly_claims_count` >0
ERROR - 2016-12-04 15:01:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:03:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:05:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:05:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:05:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:05:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:07:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:07:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:07:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:07:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:08:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:08:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
ERROR - 2016-12-04 15:08:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?
                      AND fd.transaction_state_id = 4' at line 20 - Invalid query: SELECT fd.id food_id,
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
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4
