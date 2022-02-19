SELECT  p.id,
	p.employee_no,
	p.first_name,
	p.middle_name,
	p.last_name,
	(SELECT alloted_amount
	FROM meal_allowance
	WHERE valid_from >= '2016-10-01' AND valid_until <= '2016-10-31'
		AND person_id = p.id
	ORDER BY date_created DESC
	LIMIT 1) alloted_amount,
	(SELECT alloted_amount - remaining_amountitems_inventory
	FROM meal_allowance
	WHERE c
			AND person_id = p.id
	 ORDER BY date_created DESC
	LIMIT 1) consumed_amount
FROM persons p