<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-08-27 00:09:24 --> Severity: Notice --> Undefined variable: inputFileName C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 258
ERROR - 2016-08-27 00:09:41 --> Severity: Notice --> Undefined variable: inputFileName C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 258
ERROR - 2016-08-27 00:12:21 --> Severity: Notice --> Undefined variable: inputFileName C:\wamp64\www\nsmdih_cms\application\controllers\Employee.php 258
ERROR - 2016-08-27 00:12:47 --> Severity: Notice --> Undefined variable: message_subject C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 20
ERROR - 2016-08-27 00:12:47 --> Severity: Notice --> Undefined variable: message_body C:\wamp64\www\nsmdih_cms\application\views\employees\meal_allowance_view.php 32
ERROR - 2016-08-27 00:16:00 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 00:25:20 --> Severity: Error --> Call to undefined function number() C:\wamp64\www\nsmdih_cms\application\views\reports\cost_vs_sales_report.php 67
ERROR - 2016-08-27 00:30:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-27 01:26:24 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 01:46:56 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 01:48:30 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 01:49:00 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 01:49:58 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:54 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 60
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 61
ERROR - 2016-08-27 02:04:55 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 62
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:04 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:05 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:05 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:05 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:31 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:05:31 --> Severity: Notice --> Undefined variable: total_expenses C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 57
ERROR - 2016-08-27 02:05:31 --> Severity: Notice --> Undefined variable: total_revenue C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 58
ERROR - 2016-08-27 02:06:06 --> Severity: Notice --> Undefined variable: total_sales C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 56
ERROR - 2016-08-27 02:06:06 --> Severity: Notice --> Undefined variable: total_expenses C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 57
ERROR - 2016-08-27 02:06:06 --> Severity: Notice --> Undefined variable: total_revenue C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 58
ERROR - 2016-08-27 02:06:34 --> Severity: Notice --> Undefined variable: grand_total C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 74
ERROR - 2016-08-27 02:06:43 --> Severity: Notice --> Undefined variable: grand_total C:\wamp64\www\nsmdih_cms\application\views\reports\monthly_sales_report.php 74
ERROR - 2016-08-27 05:41:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-27 05:41:28 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:41:38 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:41:42 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-119'
ERROR - 2016-08-27 05:41:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-27 05:41:57 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:42:01 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:42:04 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-119'
ERROR - 2016-08-27 05:42:14 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:42:35 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-331'
ERROR - 2016-08-27 05:42:37 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-331'
ERROR - 2016-08-27 05:43:17 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-331'
ERROR - 2016-08-27 05:43:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-27 05:43:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-27 05:44:51 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:44:57 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:47:33 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
ERROR - 2016-08-27 05:53:25 --> Severity: Notice --> Undefined variable: total_actual_revenue C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php 94
ERROR - 2016-08-27 06:28:27 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.employee_no = '29-118'
