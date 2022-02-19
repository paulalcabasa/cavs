<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-12-07 13:35:58 --> Query error: Unknown column 'person_type_id' in 'where clause' - Invalid query: SELECT person_id,
		               employee_no,
		               person_name,
		               remaining_amount,
		               department_id
		        FROM employees_v
		        WHERE department_id = '1'
		              AND person_type_id = 1
ERROR - 2016-12-07 13:36:06 --> Query error: Unknown column 'person_type_id' in 'where clause' - Invalid query: SELECT person_id,
		               employee_no,
		               person_name,
		               remaining_amount,
		               department_id
		        FROM employees_v
		        WHERE department_id = '1'
		              AND person_type_id = 1
ERROR - 2016-12-07 13:36:42 --> Query error: Unknown column 'person_type_id' in 'where clause' - Invalid query: SELECT person_id,
		               employee_no,
		               person_name,
		               remaining_amount,
		               department_id
		        FROM employees_v
		        WHERE department_id = '1'
		              AND person_type_id = 1
ERROR - 2016-12-07 13:39:24 --> Severity: Notice --> Undefined variable: departments C:\wamp64\www\nsmdih_cms\application\views\employees\credit_management_view.php 14
ERROR - 2016-12-07 13:39:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\wamp64\www\nsmdih_cms\application\views\employees\credit_management_view.php 14
ERROR - 2016-12-07 13:39:55 --> Severity: Notice --> Undefined property: Employee::$system_model C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 576
ERROR - 2016-12-07 13:39:56 --> Severity: Error --> Call to a member function get_departments() on null C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 576
ERROR - 2016-12-07 13:49:47 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:50:25 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:51:15 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:51:19 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:12 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:12 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:13 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:35 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:35 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:35 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:52:36 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:53:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:39 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:39 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:46 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:46 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 20 - Invalid query: SELECT p.id,
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
				      AND pt.id = 1
				      AND p.department_id = ?
ERROR - 2016-12-07 13:54:48 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:48 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 20 - Invalid query: SELECT p.id,
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
				      AND pt.id = 1
				      AND p.department_id = ?
ERROR - 2016-12-07 13:54:51 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:51 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:51 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:51 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:52 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:52 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:52 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:52 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:53 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:53 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:53 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:53 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:54 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:54 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:57 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:57 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:59 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:59 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:59 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:54:59 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:55:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 20 - Invalid query: SELECT p.id,
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
				      AND pt.id = 1
				      AND p.department_id = ?
ERROR - 2016-12-07 13:55:01 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:55:01 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:55:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 20 - Invalid query: SELECT p.id,
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
				      AND pt.id = 1
				      AND p.department_id = ?
ERROR - 2016-12-07 13:55:04 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:55:04 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 784
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:17 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:26 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:26 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:26 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:26 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:56:27 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:58:15 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:58:15 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:58:29 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 13:58:29 --> Severity: Notice --> Undefined property: stdClass::$person_id C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 789
ERROR - 2016-12-07 14:09:43 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:09:43 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:09:55 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:09:55 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:09:55 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:09:55 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:09 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:09 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:09 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:09 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:10:22 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:11:25 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 812
ERROR - 2016-12-07 14:11:25 --> Severity: Notice --> Undefined property: stdClass::$salary_deduction C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 815
ERROR - 2016-12-07 14:13:33 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 811
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Undefined variable: emp C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 868
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 868
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Undefined variable: emp C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 869
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 869
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Undefined variable: emp C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Undefined variable: emp C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 871
ERROR - 2016-12-07 14:28:14 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 871
ERROR - 2016-12-07 14:28:14 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:28:14 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:28:51 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 868
ERROR - 2016-12-07 14:28:51 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:28:51 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:28:51 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:11 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 868
ERROR - 2016-12-07 14:29:11 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:29:12 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:12 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:18 --> Severity: Notice --> Undefined property: stdClass::$person_type_name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 868
ERROR - 2016-12-07 14:29:18 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:29:18 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:18 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:57 --> Severity: Notice --> Undefined property: stdClass::$name C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 870
ERROR - 2016-12-07 14:29:57 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:29:57 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:30:23 --> Severity: Warning --> fopen(): remote host file access not supported, file://./files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:30:23 --> Severity: Warning --> fopen(file://./files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:31:33 --> Severity: Warning --> fopen(): remote host file access not supported, file://files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:31:33 --> Severity: Warning --> fopen(file://files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:32:19 --> Severity: Warning --> fopen(): remote host file access not supported, file://employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:32:19 --> Severity: Warning --> fopen(file://employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:32:39 --> Severity: Warning --> fopen(): remote host file access not supported, file://files/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:32:39 --> Severity: Warning --> fopen(file://files/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:33:23 --> Severity: Warning --> fopen(): remote host file access not supported, file://../../files/exported_employees/employee_credits.pdf C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:33:23 --> Severity: Warning --> fopen(file://../../files/exported_employees/employee_credits.pdf): failed to open stream: no suitable wrapper could be found C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:35:07 --> Severity: Warning --> fopen(file://C:\wamp64\www\nsmdih_cms\application\controllersfiles/employee_credits.pdf): failed to open stream: No such file or directory C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:35:27 --> Severity: Warning --> fopen(file://C:\wamp64\www\nsmdih_cms\application\controllersfiles/employee_credits.pdf): failed to open stream: No such file or directory C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:36:38 --> Severity: Warning --> fopen(file://C:\wamp64\www\nsmdih_cms\application\controllers../files/employee_credits.pdf): failed to open stream: No such file or directory C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
ERROR - 2016-12-07 14:37:11 --> Severity: Warning --> fopen(file://C:\wamp64\www\nsmdih_cms\application\controllers../../files/employee_credits.pdf): failed to open stream: No such file or directory C:\wamp64\www\nsmdih_cms\application\third_party\TCPDF\include\tcpdf_static.php 1854
