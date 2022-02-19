SELECT CONCAT('OR',LPAD(th.id,5,0)) transaction_no,
       pt.person_type_name customer_type,
       CONCAT( pr.last_name,',',
	       pr.first_name,' ',
	       CASE 
		   WHEN pr.middle_name IS NOT NULL THEN CONCAT(LEFT(pr.middle_name,1),'.')
		   ELSE ''
	       END
       ) customer_name,
       fd.food_name,
       tl.selling_price unit_price,
       tl.quantity,
       (tl.selling_price * tl.quantity) amount,
       DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date,
       ts.status,
       th.date_created
FROM transaction_lines tl LEFT JOIN transaction_headers th
	ON tl.transaction_header_id = th.id
     LEFT JOIN foods fd
	ON fd.id = tl.food_id
     LEFT JOIN person_types pt
	ON pt.id = th.person_type_id
     LEFT JOIN persons pr
	ON pr.id = th.person_id
     LEFT JOIN transaction_states ts
	ON ts.id = th.transaction_status	
ORDER BY th.date_created DESC			    