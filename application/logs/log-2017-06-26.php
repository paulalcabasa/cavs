<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-06-26 06:03:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '?' at line 25 - Invalid query: SELECT p.id person_id,
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
ERROR - 2017-06-26 06:03:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '?' at line 25 - Invalid query: SELECT p.id person_id,
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
ERROR - 2017-06-26 17:00:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
AND `ma_weekly_claims_count` >0' at line 2 - Invalid query: UPDATE `meal_allowance` SET `max_allowance_daily` = '150'
WHERE `id` IN()
AND `ma_weekly_claims_count` >0
