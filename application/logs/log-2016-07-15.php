<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-07-15 23:11:21 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES) C:\wamp64\www\nsmdih_cms\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-07-15 23:11:21 --> Unable to connect to the database
ERROR - 2016-07-15 23:15:19 --> Query error: Unknown column 'meal_allowance_rate' in 'field list' - Invalid query: SELECT id,
					   employee_no,
					   first_name,
					   middle_name,
					   last_name,
					   meal_allowance,
					   meal_allowance_rate
				FROM persons 
				WHERE person_type_id = 1
					  AND person_state_id = 1
ERROR - 2016-07-15 23:54:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'update_user = '1'
					date_updated = NOW()
				WHERE id = '2'' at line 3 - Invalid query: UPDATE persons
				SET meal_allowance = 400
					update_user = '1'
					date_updated = NOW()
				WHERE id = '2'
