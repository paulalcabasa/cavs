<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-11-08 14:03:56 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\wamp64\www\nsmdih_cms\application\models\Supplier_model.php 20
ERROR - 2016-11-08 14:21:26 --> Severity: Notice --> Undefined variable: content C:\wamp64\www\nsmdih_cms\application\controllers\Supplier.php 107
ERROR - 2016-11-08 14:21:26 --> Severity: Error --> Cannot access empty property C:\wamp64\www\nsmdih_cms\application\controllers\Supplier.php 107
ERROR - 2016-11-08 14:54:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 14:57:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 14:58:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 14:58:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 14:59:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:00:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:01:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:01:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:02:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:02:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:03:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:03:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:03:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
ERROR - 2016-11-08 15:05:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '?' at line 18 - Invalid query: SELECT sp.id supplier_id,
				       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
				       sp.supplier_name,
				       sp.tin,
				       sp.contact_no,
				       sp.address,
				       sp.status_id,
				       st.description state,
				       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
				       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
				FROM suppliers sp LEFT JOIN STATUS st
					ON sp.status_id = st.id
				     LEFT JOIN users u
					ON u.id = sp.create_user
				     LEFT JOIN persons ps
					ON ps.user_id = u.id
				WHERE sp.status_id = 1
					  AND sp.id = ?
