<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-12-08 13:43:35 --> Severity: Notice --> Undefined variable: departments C:\wamp64\www\nsmdih_cms\application\views\employees\credit_management_view.php 17
ERROR - 2016-12-08 13:43:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\employees\credit_management_view.php 17
ERROR - 2016-12-08 13:55:33 --> Severity: Warning --> Missing argument 1 for Person_model::get_persons_with_credit(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php on line 752 and defined C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 319
ERROR - 2016-12-08 13:55:33 --> Severity: Notice --> Undefined variable: person_type_id C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 339
ERROR - 2016-12-08 13:55:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT p.id person_id,
				       pt.person_type_name,
				       p.employee_no,
				       CONCAT(
				           p.last_name,
				           ',',
				           p.first_name,
				           ' ',
				           (CASE 
						WHEN p.middle_name IS NOT NULL 
						THEN CONCAT(LEFT(p.middle_name,1),'.') 
					    END)
					) name,
					p.salary_deduction credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = ?
ERROR - 2016-12-08 13:59:44 --> Severity: Warning --> Missing argument 1 for Person_model::get_persons_with_credit(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php on line 591 and defined C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 319
ERROR - 2016-12-08 13:59:44 --> Severity: Notice --> Undefined variable: person_type_id C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 339
ERROR - 2016-12-08 13:59:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 19 - Invalid query: SELECT p.id person_id,
				       pt.person_type_name,
				       p.employee_no,
				       CONCAT(
				           p.last_name,
				           ',',
				           p.first_name,
				           ' ',
				           (CASE 
						WHEN p.middle_name IS NOT NULL 
						THEN CONCAT(LEFT(p.middle_name,1),'.') 
					    END)
					) name,
					p.salary_deduction credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = ?
ERROR - 2016-12-08 14:02:16 --> Severity: Notice --> Undefined variable: initial_list C:\wamp64\www\nsmdih_cms\application\views\canteen_employees\credit_management_sruho.php 62
ERROR - 2016-12-08 14:02:38 --> Severity: Notice --> Undefined variable: initial_list C:\wamp64\www\nsmdih_cms\application\views\canteen_employees\credit_management_sruho.php 57
ERROR - 2016-12-08 14:05:41 --> Severity: Notice --> Undefined variable: initial_list C:\wamp64\www\nsmdih_cms\application\views\canteen_employees\credit_management_sruho.php 77
ERROR - 2016-12-08 14:06:43 --> Severity: Notice --> Undefined variable: initial_list C:\wamp64\www\nsmdih_cms\application\views\canteen_employees\credit_management_sruho.php 77
ERROR - 2016-12-08 14:08:25 --> Severity: Notice --> Undefined variable: initial_list C:\wamp64\www\nsmdih_cms\application\views\canteen_employees\credit_management_sruho.php 77
ERROR - 2016-12-08 14:16:16 --> Severity: Notice --> Undefined variable: employees_list C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 787
ERROR - 2016-12-08 14:16:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 787
ERROR - 2016-12-08 14:20:05 --> Query error: Table 'nsmdih_cms_db.canteen_employees' doesn't exist - Invalid query: SELECT `person_id`, `employee_no`, `person_name`, `salary_deduction`, `person_type_name`
FROM `canteen_employees`
WHERE `person_id` IN('243')
ERROR - 2016-12-08 14:20:14 --> Query error: Table 'nsmdih_cms_db.canteen_employees' doesn't exist - Invalid query: SELECT `person_id`, `employee_no`, `person_name`, `salary_deduction`, `person_type_name`
FROM `canteen_employees`
WHERE `person_id` IN('243')
ERROR - 2016-12-08 14:23:10 --> Severity: Notice --> Undefined variable: employees_list C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:23:10 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:23:31 --> Severity: Notice --> Undefined variable: employees_list C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:23:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:23:48 --> Severity: Notice --> Undefined variable: employees_list C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:23:48 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 858
ERROR - 2016-12-08 14:25:59 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 16
ERROR - 2016-12-08 14:32:44 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 16
ERROR - 2016-12-08 14:43:51 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 25
ERROR - 2016-12-08 14:44:59 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 25
ERROR - 2016-12-08 14:45:24 --> Severity: Notice --> Undefined variable: flag C:\wamp64\www\nsmdih_cms\application\views\employees\debit_result_view.php 25
