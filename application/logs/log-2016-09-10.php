<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-09-10 01:09:21 --> Severity: Parsing Error --> syntax error, unexpected '.' C:\wamp64\www\nsmdih_cms\application\views\transactions\new_transaction.php 48
ERROR - 2016-09-10 01:09:26 --> Severity: Parsing Error --> syntax error, unexpected ':' C:\wamp64\www\nsmdih_cms\application\views\transactions\new_transaction.php 48
ERROR - 2016-09-10 01:25:20 --> Severity: Parsing Error --> syntax error, unexpected ':', expecting ',' or ';' C:\wamp64\www\nsmdih_cms\application\views\transactions\new_transaction.php 46
ERROR - 2016-09-10 04:03:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 1 - Invalid query: SELECT id FROM persons WHERE employee_no = ?
ERROR - 2016-09-10 04:04:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 3 - Invalid query: SELECT id 
                FROM persons 
                WHERE employee_no = ?
ERROR - 2016-09-10 04:19:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())' at line 18 - Invalid query: INSERT INTO persons(
					user_id,
					person_type_id,
					employee_no,
					first_name,
					middle_name,
					last_name,
					address,
					contact_no,
					person_image,
					meal_allowance,
					meal_allowance_rate,
					max_allowance_daily,
					ma_weekly_claims_count,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-09-10 04:20:46 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.id = '5'
ERROR - 2016-09-10 05:08:18 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.id = '3'
ERROR - 2016-09-10 05:23:54 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp64\www\nsmdih_cms\application\views\users\new_user_view.php 135
ERROR - 2016-09-10 05:24:05 --> Severity: Parsing Error --> syntax error, unexpected end of file C:\wamp64\www\nsmdih_cms\application\views\users\new_user_view.php 135
ERROR - 2016-09-10 05:33:20 --> Severity: Error --> Call to undefined method User::new_stockholder() C:\wamp64\www\nsmdih_cms\application\controllers\User.php 150
ERROR - 2016-09-10 06:43:44 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:44:03 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:44:24 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:44:36 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:44:54 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:45:20 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:45:48 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:46:05 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:46:19 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 06:46:21 --> Severity: Notice --> Undefined variable: current_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 24
ERROR - 2016-09-10 07:28:17 --> Severity: Notice --> Undefined variable: start_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 17
ERROR - 2016-09-10 07:28:17 --> Severity: Notice --> Undefined variable: end_date C:\wamp64\www\nsmdih_cms\application\views\transactions\all_transactions.php 17
ERROR - 2016-09-10 07:37:05 --> Severity: Error --> Call to undefined function format_date_slash() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\active_inventory_view.php 30
ERROR - 2016-09-10 12:50:40 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 116
ERROR - 2016-09-10 12:50:45 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 98
ERROR - 2016-09-10 13:58:25 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 11
ERROR - 2016-09-10 13:58:40 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 11
