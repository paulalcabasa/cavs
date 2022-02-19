<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-31 00:35:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			  ' at line 20 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.max_allowance_daily,
			       p.ma_weekly_claims_count,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
			       p.salary_deduction,
			       
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.barcode_value = ''
			      AND pt.id = '1'
ERROR - 2016-10-31 00:36:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			  ' at line 20 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.max_allowance_daily,
			       p.ma_weekly_claims_count,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
			       p.salary_deduction,
			       
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.barcode_value = ''
			      AND pt.id = '1'
ERROR - 2016-10-31 04:19:04 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 38
ERROR - 2016-10-31 04:19:04 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 38
ERROR - 2016-10-31 04:19:04 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 38
ERROR - 2016-10-31 04:19:04 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 38
ERROR - 2016-10-31 04:19:04 --> Severity: Notice --> Undefined variable: default_customer C:\wamp64\www\nsmdih_cms\application\views\reports\sales_report.php 38
ERROR - 2016-10-31 05:44:28 --> Severity: Parsing Error --> syntax error, unexpected '$query' (T_VARIABLE) C:\wamp64\www\nsmdih_cms\application\models\Stockholder_model.php 60
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 33
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 35
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: no_of_days C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 36
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_recordset C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: employee_no C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 37
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 38
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: alloted_amount C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 39
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_from C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 42
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: valid_until C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 43
ERROR - 2016-10-31 05:49:30 --> Severity: Notice --> Undefined variable: current_user C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 45
ERROR - 2016-10-31 05:50:15 --> Severity: Error --> Cannot use object of type stdClass as array C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 28
ERROR - 2016-10-31 05:50:21 --> Severity: Parsing Error --> syntax error, unexpected '[', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 28
ERROR - 2016-10-31 05:57:12 --> Query error: Unknown column 'barcode_value' in 'field list' - Invalid query: SELECT person_id,
				       employee_no,
				       person_name,
				       status,
				       barcode_value
				FROM persons_v
				WHERE person_type_id = 8
				      AND person_state_id = 1
ERROR - 2016-10-31 06:27:19 --> Severity: Error --> Call to undefined method Stockholder_model::reload_stockholder_daily_allowance() C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 14
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:27:27 --> Severity: Notice --> Undefined property: stdClass::$meal_allowance_id C:\wamp64\www\nsmdih_cms\application\controllers\Cron.php 16
ERROR - 2016-10-31 06:46:03 --> Severity: Compile Error --> Cannot redeclare Stockholder_model::reload_stockholder_max_daily_allowance() C:\wamp64\www\nsmdih_cms\application\models\Stockholder_model.php 52
ERROR - 2016-10-31 06:55:48 --> Query error: Unknown column 'meal_allowance' in 'field list' - Invalid query: SELECT id,
					   employee_no,
					   first_name,
					   middle_name,
					   last_name,
					   meal_allowance,
					   meal_allowance_rate,
					   barcode_value
				FROM persons 
				WHERE person_type_id = 1
					  AND person_state_id = 1
ERROR - 2016-10-31 06:58:26 --> Query error: Unknown column 'p.meal_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.max_allowance_daily,
			       p.ma_weekly_claims_count,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
			       p.salary_deduction,
			       (SELECT remaining_amount
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) remaining_amount,
					(SELECT CASE 
					 			WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
					 			THEN CONCAT(
										DATE_FORMAT(valid_from,'%m/%d/%Y'),
										' to ',
										DATE_FORMAT(valid_until,'%m/%d/%Y')
									  )
								ELSE NULL
							END ma_validity_date
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) ma_validity_date
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.barcode_value = '29-780-1'
			      AND pt.id = '1'
ERROR - 2016-10-31 06:58:31 --> Query error: Unknown column 'p.meal_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.max_allowance_daily,
			       p.ma_weekly_claims_count,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
			       p.salary_deduction,
			       (SELECT remaining_amount
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) remaining_amount,
					(SELECT CASE 
					 			WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
					 			THEN CONCAT(
										DATE_FORMAT(valid_from,'%m/%d/%Y'),
										' to ',
										DATE_FORMAT(valid_until,'%m/%d/%Y')
									  )
								ELSE NULL
							END ma_validity_date
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) ma_validity_date
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.barcode_value = '29-780-1'
			      AND pt.id = '1'
ERROR - 2016-10-31 09:00:34 --> Severity: Warning --> Missing argument 2 for Person_model::get_employee_meal_allowance(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php on line 126 and defined C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 236
ERROR - 2016-10-31 09:00:34 --> Severity: Notice --> Undefined variable: meal_allowance_id C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 250
ERROR - 2016-10-31 09:00:34 --> Severity: Notice --> Undefined offset: 0 C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 127
ERROR - 2016-10-31 09:00:34 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 127
ERROR - 2016-10-31 09:01:02 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 09:01:06 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 09:02:02 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 09:02:03 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 09:02:06 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 09:02:22 --> Severity: Notice --> Undefined variable: daily_allowance C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 130
ERROR - 2016-10-31 10:00:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,?,?,NOW())' at line 15 - Invalid query: INSERT INTO transaction_headers(
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-10-31 10:00:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,?,?,NOW())' at line 15 - Invalid query: INSERT INTO transaction_headers(
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-10-31 10:03:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,?,?,NOW())' at line 15 - Invalid query: INSERT INTO transaction_headers(
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-10-31 10:20:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,?,?,?,?,?,?,?,NOW())' at line 15 - Invalid query: INSERT INTO transaction_headers(
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_reference_no,
					amount_tendered,
					total_amount,
					remarks,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,NOW())
ERROR - 2016-10-31 11:09:36 --> Severity: Notice --> Undefined variable: remaining_amount C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 204
ERROR - 2016-10-31 11:09:36 --> Query error: Unknown column 'update_user' in 'field list' - Invalid query: UPDATE meal_allowance
				SET remaining_amount = -270,
				    max_allowance_daily = 0,
				    ma_weekly_claims_count = 0,
					update_user = '208',
					date_updated = NOW()
				WHERE id = '31'
ERROR - 2016-10-31 11:09:41 --> Severity: Notice --> Undefined variable: remaining_amount C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 204
ERROR - 2016-10-31 11:09:41 --> Query error: Unknown column 'update_user' in 'field list' - Invalid query: UPDATE meal_allowance
				SET remaining_amount = -270,
				    max_allowance_daily = 0,
				    ma_weekly_claims_count = 0,
					update_user = '208',
					date_updated = NOW()
				WHERE id = '31'
ERROR - 2016-10-31 11:10:49 --> Query error: Unknown column 'update_user' in 'field list' - Invalid query: UPDATE meal_allowance
				SET remaining_amount = 0,
				    max_allowance_daily = 0,
				    ma_weekly_claims_count = 0,
					update_user = '208',
					date_updated = NOW()
				WHERE id = '31'
ERROR - 2016-10-31 11:10:55 --> Query error: Unknown column 'update_user' in 'field list' - Invalid query: UPDATE meal_allowance
				SET remaining_amount = 0,
				    max_allowance_daily = 0,
				    ma_weekly_claims_count = 0,
					update_user = '208',
					date_updated = NOW()
				WHERE id = '31'
ERROR - 2016-10-31 13:35:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,NOW())' at line 9 - Invalid query: INSERT INTO person_meal_allowance_returns(
					transaction_header_id,
					person_id,
					meal_allowance_id,
					amount,
					create_user,
					date_created
				)
				VALUE(?,?,?,?,NOW())
ERROR - 2016-10-31 13:35:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?,?,?,?,NOW())' at line 9 - Invalid query: INSERT INTO person_meal_allowance_returns(
					transaction_header_id,
					person_id,
					meal_allowance_id,
					amount,
					create_user,
					date_created
				)
				VALUE(?,?,?,?,NOW())
