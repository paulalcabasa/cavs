<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-09 01:36:25 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting variable (T_VARIABLE) or '$' C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 331
ERROR - 2016-10-09 03:28:36 --> Severity: Notice --> Undefined variable: customer_type_id C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 373
ERROR - 2016-10-09 03:28:36 --> Severity: Notice --> Undefined variable: customer_type_id C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 373
ERROR - 2016-10-09 03:29:11 --> Severity: Notice --> Undefined property: stdClass::$payment_mode_id C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 376
ERROR - 2016-10-09 03:31:46 --> Query error: Unknown column 'tp.payment_model_id' in 'field list' - Invalid query: SELECT tp.id,
					   tp.payment_model_id,
				       pm.mode_of_payment,
				       tp.amount
				FROM transaction_payments tp LEFT JOIN payment_modes pm
					ON tp.payment_mode_id = pm.id
				WHERE tp.transaction_header_id = '49'
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: max_allowance_daily C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 384
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: ma_weekly_claims_count C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 385
ERROR - 2016-10-09 03:31:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: max_allowance_daily C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 384
ERROR - 2016-10-09 03:31:56 --> Severity: Notice --> Undefined index: ma_weekly_claims_count C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 385
ERROR - 2016-10-09 03:31:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:31:57 --> Severity: Notice --> Undefined index: meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:57 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:31:57 --> Severity: Notice --> Undefined index: max_allowance_daily C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 384
ERROR - 2016-10-09 03:31:57 --> Severity: Notice --> Undefined index: ma_weekly_claims_count C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 385
ERROR - 2016-10-09 03:31:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:32:18 --> Severity: Notice --> Undefined index: meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:32:18 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 379
ERROR - 2016-10-09 03:32:18 --> Severity: Notice --> Undefined index: max_allowance_daily C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 384
ERROR - 2016-10-09 03:32:18 --> Severity: Notice --> Undefined index: ma_weekly_claims_count C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 385
ERROR - 2016-10-09 03:32:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:32:58 --> Severity: Notice --> Undefined index: meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 380
ERROR - 2016-10-09 03:32:58 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 380
ERROR - 2016-10-09 03:32:58 --> Severity: Notice --> Undefined index: max_allowance_daily C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 385
ERROR - 2016-10-09 03:32:58 --> Severity: Notice --> Undefined index: ma_weekly_claims_count C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 386
ERROR - 2016-10-09 03:32:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:33:55 --> Severity: Notice --> Undefined variable: added_to_meal_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 380
ERROR - 2016-10-09 03:33:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:34:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:40:50 --> Severity: Notice --> Undefined variable: inputFileName C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 262
ERROR - 2016-10-09 03:41:04 --> Severity: Notice --> Undefined variable: message_subject C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 20
ERROR - 2016-10-09 03:41:04 --> Severity: Notice --> Undefined variable: message_body C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 32
ERROR - 2016-10-09 03:41:11 --> Severity: Notice --> Undefined variable: message_subject C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 20
ERROR - 2016-10-09 03:41:11 --> Severity: Notice --> Undefined variable: message_body C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 32
ERROR - 2016-10-09 03:41:22 --> Severity: Notice --> Undefined variable: inputFileName C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 262
ERROR - 2016-10-09 03:42:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:43:48 --> Severity: Parsing Error --> syntax error, unexpected ')' C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 309
ERROR - 2016-10-09 03:44:07 --> Severity: Notice --> Undefined variable: message_subject C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 20
ERROR - 2016-10-09 03:44:07 --> Severity: Notice --> Undefined variable: message_body C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 32
ERROR - 2016-10-09 03:44:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					' at line 2 - Invalid query: UPDATE persons
				SET meal_allowance = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 03:45:05 --> Severity: Notice --> Undefined variable: update_meal_allowance_query C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 321
ERROR - 2016-10-09 03:45:10 --> Severity: Notice --> Undefined variable: update_meal_allowance_query C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 321
ERROR - 2016-10-09 03:45:43 --> Severity: Notice --> Undefined variable: update_meal_allowance_query C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 321
ERROR - 2016-10-09 04:16:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?' at line 2 - Invalid query: UPDATE persons
				SET weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 04:16:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?' at line 2 - Invalid query: UPDATE persons
				SET weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 04:16:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?' at line 2 - Invalid query: UPDATE persons
				SET weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 04:17:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?' at line 2 - Invalid query: UPDATE persons
				SET ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
ERROR - 2016-10-09 04:17:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?' at line 2 - Invalid query: UPDATE persons
				SET ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?
