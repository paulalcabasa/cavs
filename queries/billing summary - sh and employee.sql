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
	 LIMIT 1
	 ) alloted_amount,
	(SELECT SUM(tp.amount)
	FROM transaction_payments tp LEFT JOIN transaction_headers th
	ON tp.transaction_header_id = th.id
	WHERE tp.payment_mode_id = 1
	AND th.person_id = p.id
	AND th.transaction_status = 1
	AND DATE(th.date_created) BETWEEN '2016-10-01' AND '2016-10-31') consumed_amount
FROM persons p 