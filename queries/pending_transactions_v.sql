SELECT tth.id header_id,
       ttl.id line_id,
       CONCAT('TXN',LPAD(tth.id,5,'0')) transaction_no,
       CONCAT('FD',LPAD(ttl.food_id,4,'0')) food_no,
       fd.food_name,
       SUM(ttl.quantity) quantity,
       CONCAT(
	p.last_name,', ',
	p.first_name,' ',
	CASE 
	   WHEN p.middle_name IS NOT NULL THEN CONCAT(LEFT(p.middle_name,1),'.')
	   ELSE ''
	END
       ) transacted_by,
       DATE_FORMAT(tth.date_created,'%m/%d/%Y %h:%i:%p') date_created,
       ttl.food_id
FROM temp_transaction_lines ttl LEFT JOIN temp_transaction_header tth
	ON ttl.transaction_header_id = tth.id
     LEFT JOIN foods fd
	ON fd.id = ttl.food_id
     LEFT JOIN users u 
	ON u.id = tth.create_user
     LEFT JOIN persons p
	ON p.user_id = u.id
GROUP BY tth.id,
	 ttl.food_id;