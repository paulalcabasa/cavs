<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-08-06 01:50:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 7 - Invalid query: SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_default_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.payment_mode_id =  b.id
				WHERE a.person_type_id = ?
ERROR - 2016-08-06 01:59:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-06 02:44:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-06 03:33:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
