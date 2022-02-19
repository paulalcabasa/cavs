<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-10-02 03:11:15 --> Query error: Unknown column 'p.incentive_allowance' in 'field list' - Invalid query: SELECT p.id person_id,
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
			WHERE p.id = '5'
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 19
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 19
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 20
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 20
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 21
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 21
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 34
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 34
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 41
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 41
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 49
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 49
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 57
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 57
ERROR - 2016-10-02 03:54:08 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 65
ERROR - 2016-10-02 03:54:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 65
ERROR - 2016-10-02 03:54:09 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 73
ERROR - 2016-10-02 03:54:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 73
ERROR - 2016-10-02 03:54:09 --> Severity: Notice --> Undefined variable: employee_details C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 83
ERROR - 2016-10-02 03:54:09 --> Severity: Notice --> Trying to get property of non-object C:\wamp64\www\nsmdih_cms\application\views\stockholder\edit_stockholder_view.php 83
ERROR - 2016-10-02 05:43:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'update_user = '1',
					date_updated = NOW()
				WHERE id = '3'' at line 3 - Invalid query: UPDATE persons 
				SET person_type_id = '6'
					update_user = '1',
					date_updated = NOW()
				WHERE id = '3'
ERROR - 2016-10-02 06:15:53 --> Severity: Notice --> Undefined property: stdClass::$user_id C:\wamp64\www\nsmdih_cms\application\views\users\edit_user_view.php 19
ERROR - 2016-10-02 08:05:04 --> Severity: Parsing Error --> syntax error, unexpected 'array' (T_ARRAY), expecting ')' C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 277
ERROR - 2016-10-02 08:07:26 --> Severity: Error --> Call to undefined function encode_string() C:\wamp64\www\nsmdih_cms\application\controllers\Transaction.php 288
