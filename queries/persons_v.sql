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
       ma.alloted_amount,
       ma.remaining_amount,
       ma.max_allowance_daily,
       ma.ma_weekly_claims_count,
       CASE WHEN ma.valid_from IS NOT NULL AND ma.valid_until IS NOT NULL
	    THEN CONCAT(
		    DATE_FORMAT(ma.valid_from,'%m/%d/%Y'),
		    ' to ',
		    DATE_FORMAT(ma.valid_until,'%m/%d/%Y')
		 )
            ELSE NULL
       END ma_validity_date,
       CASE 
	   WHEN ma.date_created IS NOT NULL 
	   THEN DATE_FORMAT(ma.date_created,'%m/%d/%Y %h:%i %p') 
	   ELSE NULL 
       END ma_date_created,
       ps.status,
       p.person_image,
       p.person_type_id,
       p.person_state_id,
       u.username,
       u.passcode,
       p.department_id,
       DATE_FORMAT(u.last_login,'%m/%d/%Y %h:%i %p') last_login
FROM persons p LEFT JOIN person_types pt
	ON p.person_type_id = pt.id
     LEFT JOIN person_state ps 
	ON ps.id = p.person_state_id
     LEFT JOIN users u
	ON u.id = p.user_id
     LEFT JOIN departments dp
	ON dp.id = p.department_id
     LEFT JOIN (SELECT id,
		       person_id,
		       alloted_amount,
                       remaining_amount,
                       valid_from,
                       valid_until,
                       date_created,
                       max_allowance_daily,
                       ma_weekly_claims_count
	        FROM meal_allowance_allowance 
                WHERE CURDATE() BETWEEN valid_from AND valid_until
              --  ORDER BY date_created DESC
                ) ma
        ON ma.person_id = p.id
        