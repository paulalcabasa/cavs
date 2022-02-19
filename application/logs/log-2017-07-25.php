<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-07-25 10:20:48 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:23:10 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:23:30 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:26:04 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:26:13 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:26:46 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:26:50 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:31:43 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:05 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:09 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:11 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:13 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:28 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:30 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:32 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:34 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:32:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '?' at line 25 - Invalid query: SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.person_image,
			       p.person_type_id,
			       p.user_id,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       p.department_id,
			       p.barcode_value,
			       p.person_state_id
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.id = ?
ERROR - 2017-07-25 10:32:48 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:33:42 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:33:44 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:33:51 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:33:56 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:00 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:02 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:07 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:08 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:23 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:27 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:34:34 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:18 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:28 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:32 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:38 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:42 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 10:35:44 --> Severity: Error --> Call to undefined function encode_string() C:\xampp\htdocs\nsmdih_cms\application\views\includes\dashboard-navigation.php 63
ERROR - 2017-07-25 17:00:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `ma_weekly_claims_count` >0' at line 2 - Invalid query: UPDATE `meal_allowance` SET `max_allowance_daily` = '150'
WHERE `id` IN()
AND `ma_weekly_claims_count` >0
