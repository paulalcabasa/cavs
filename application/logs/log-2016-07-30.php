<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-07-30 01:15:56 --> Severity: Warning --> json_decode() expects parameter 1 to be string, array given C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 39
ERROR - 2016-07-30 01:24:19 --> Severity: Parsing Error --> syntax error, unexpected '"charge_type_name"' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 37
ERROR - 2016-07-30 01:31:52 --> Query error: Unknown column 'a.is_default' in 'field list' - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 01:31:57 --> Query error: Unknown column 'a.is_default' in 'field list' - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 01:32:04 --> Query error: Unknown column 'a.is_default' in 'field list' - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 01:32:11 --> Query error: Unknown column 'a.is_default' in 'field list' - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 04:59:58 --> Severity: Warning --> Missing argument 1 for Transaction::ajax_get_employee_details() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 45
ERROR - 2016-07-30 04:59:58 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:00:01 --> Severity: Warning --> Missing argument 1 for Transaction::ajax_get_employee_details() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 45
ERROR - 2016-07-30 05:00:01 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:00:08 --> Severity: Warning --> Missing argument 1 for Transaction::ajax_get_employee_details() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 45
ERROR - 2016-07-30 05:00:08 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:04:16 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:04:23 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:05:42 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:05:44 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:06:05 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:06:07 --> Severity: Error --> Call to undefined method Transaction::input_post() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 46
ERROR - 2016-07-30 05:11:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 23 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 05:11:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 23 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 05:21:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types' at line 17 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = '29-118'
ERROR - 2016-07-30 05:21:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types' at line 17 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = '29-119'
ERROR - 2016-07-30 05:21:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types' at line 17 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' '.LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = '29-118'
ERROR - 2016-07-30 07:46:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 08:21:27 --> Query error: Table 'nsmdih_cms_db.person_applicable_charge_types' doesn't exist - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default_charge
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:21:29 --> Query error: Table 'nsmdih_cms_db.person_applicable_charge_types' doesn't exist - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default_charge
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '11'
ERROR - 2016-07-30 08:22:04 --> Query error: Table 'nsmdih_cms_db.person_applicable_charge_types' doesn't exist - Invalid query: SELECT a.id,
					   a.charge_type_id,
					   b.charge_type,
					   a.is_default_charge
				FROM person_applicable_charge_types a LEFT JOIN transaction_charge_type b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:23:56 --> Query error: Unknown column 'a.is_payment_mode' in 'field list' - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:25:37 --> Query error: Unknown column 'a.is_payment_mode' in 'field list' - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:25:41 --> Query error: Unknown column 'a.is_payment_mode' in 'field list' - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.charge_type_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:26:31 --> Query error: Unknown column 'a.is_payment_mode' in 'field list' - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.payment_mode_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 08:27:44 --> Query error: Unknown column 'a.is_payment_mode' in 'field list' - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.payment_mode_id =  b.id
				WHERE a.person_type_id = '1'
ERROR - 2016-07-30 09:10:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 09:47:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 09:48:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
ERROR - 2016-07-30 09:49:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.person_image,
			       p.incentive_allowance,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?
