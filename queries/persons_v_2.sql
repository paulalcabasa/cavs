SELECT p.id person_id,
       p.employee_no,
       pt.person_type_name,
       p.first_name,
       p.middle_name,
       p.last_name,
       CONCAT(
	p.last_name,', ',
	p.first_name,' ',
	CASE 
	   WHEN p.middle_name IS NOT NULL THEN CONCAT(LEFT(p.middle_name,1),'.')
	   ELSE ''
	END
       ) person_name,
       dp.department_name,
       (SELECT alloted_amount
	FROM meal_allowance
	WHERE CURDATE() BETWEEN valid_from AND valid_until
	AND person_id = p.id
	ORDER BY date_created DESC
	LIMIT 1
	) alloted_amount,
	(SELECT remaining_amount
	FROM meal_allowance
	WHERE CURDATE() BETWEEN valid_from AND valid_until
	AND person_id = p.id
	ORDER BY date_created DESC
	LIMIT 1
	) remaining_amount,
        CASE WHEN p.person_type_id = 8 
             THEN (SELECT max_allowance_daily
		   FROM meal_allowance
		   WHERE CURDATE() BETWEEN valid_from AND valid_until
		   AND person_id = p.id
		   ORDER BY date_created DESC
		   LIMIT 1
		   )
	      ELSE NULL
	 END max_allowance_daily,
	 CASE WHEN p.person_type_id = 8 
             THEN (SELECT ma_weekly_claims_count
		   FROM meal_allowance
		   WHERE CURDATE() BETWEEN valid_from AND valid_until
		   AND person_id = p.id
		   ORDER BY date_created DESC
		   LIMIT 1
		   )
	      ELSE NULL
	 END ma_weekly_claims_count,
	 (SELECT CASE 
		    WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
		    THEN CONCAT(
				DATE_FORMAT(valid_from,'%m/%d/%Y'),
				' to ',
			        DATE_FORMAT(valid_until,'%m/%d/%Y')
			  )
	             ELSE NULL
	         END ma_validity_date
	   FROM meal_allowance
	   WHERE CURDATE() BETWEEN valid_from AND valid_until
	   AND person_id = p.id
	   ORDER BY date_created DESC
	   LIMIT 1
	) ma_validity_date,
	(SELECT id
	FROM meal_allowance
	WHERE CURDATE() BETWEEN valid_from AND valid_until
	AND person_id = p.id
	ORDER BY date_created DESC
	LIMIT 1
	) meal_allowance_id,
       ps.status,
       p.person_image,
       p.person_type_id,
       p.person_state_id,
       u.username,
       u.passcode,
       p.department_id,
       DATE_FORMAT(u.last_login,'%m/%d/%Y %h:%i %p') last_login,
       p.barcode_value
FROM persons p LEFT JOIN person_types pt
	ON p.person_type_id = pt.id
     LEFT JOIN person_state ps 
	ON ps.id = p.person_state_id
     LEFT JOIN users u
	ON u.id = p.user_id
     LEFT JOIN departments dp
	ON dp.id = p.department_id