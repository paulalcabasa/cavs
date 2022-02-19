<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-08-14 01:01:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'date_updated = NOW()
    			WHERE id = '1'' at line 4 - Invalid query: UPDATE foods
    			SET quantity = 39,
    				update_user = '1'
    				date_updated = NOW()
    			WHERE id = '1'
ERROR - 2016-08-14 01:01:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'date_updated = NOW()
    			WHERE id = '1'' at line 4 - Invalid query: UPDATE foods
    			SET quantity = 39,
    				update_user = '1'
    				date_updated = NOW()
    			WHERE id = '1'
ERROR - 2016-08-14 01:02:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 24 - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-08-14 02:14:25 --> Severity: Compile Error --> Cannot redeclare Person_model::update_employee_meal_allowance() C:\wamp64\www\nsmdih_cms\application\models\Person_model.php 148
ERROR - 2016-08-14 02:16:46 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:16:48 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:18 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:19 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:19 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:19 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:22 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:22 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 02:17:55 --> Query error: Unknown column 'person_id' in 'where clause' - Invalid query: SELECT meal_allowance 
				FROM persons
				WHERE person_id = '2'
ERROR - 2016-08-14 03:27:51 --> Severity: Warning --> Missing argument 1 for CI_Loader::model(), called in C:\wamp64\www\nsmdih_cms\application\controllers\Reports.php on line 7 and defined C:\wamp64\www\nsmdih_cms\system\core\Loader.php 234
