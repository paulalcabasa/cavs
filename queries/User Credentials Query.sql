SELECT u.id user_id,
       p.first_name,
       p.middle_name,
       p.last_name,
       ut.user_type_name,
       p.employee_no,
       u.username,
       u.passcode,
       u.last_login
FROM users u LEFT JOIN persons p
	ON u.id = p.user_id
     LEFT JOIN user_types ut
	ON ut.id = u.user_type_id;
