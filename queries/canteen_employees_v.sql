SELECT p.id person_id,
       p.employee_no,
       CONCAT(
	p.last_name,', ',
	p.first_name,' ',
	CASE 
	   WHEN TRIM(p.middle_name) IS NOT NULL THEN CONCAT(LEFT(p.middle_name,1),'.') 
	   ELSE ''
	END
       ) person_name,
       p.salary_deduction
FROM persons p LEFT JOIN person_types pt
	ON p.person_type_id = pt.id
     LEFT JOIN person_state ps 
	ON ps.id = p.person_state_id
WHERE person_type_id = 19
        