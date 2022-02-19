SELECT p.id employee_id,
       p.employee_no,
       CONCAT(p.last_name,', ',p.first_name,' ',p.middle_name) employee_name,
       p.meal_allowance,
       u.last_login,
       p.person_image
FROM persons p LEFT JOIN users u
	ON p.user_id = u.id
WHERE p.person_type_id = 1 AND p.person_state_id = 1;