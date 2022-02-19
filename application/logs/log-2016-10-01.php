<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-01 04:38:38 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
ERROR - 2016-10-01 05:16:44 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO) C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 417
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:39:48 --> Severity: Warning --> Wrong parameter count for number_format() C:\wamp64\www\nsmdih_cms\application\views\food_inventory\edit_food_view.php 120
ERROR - 2016-10-01 05:54:54 --> Severity: Notice --> Undefined variable: mark_up_percentage C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 431
ERROR - 2016-10-01 05:54:54 --> Severity: Notice --> Undefined variable: food_id C:\wamp64\www\nsmdih_cms\application\controllers\Food_Inventory.php 434
