SELECT CONCAT('OR',LPAD(th.id,5,0)) transaction_no,
       pt.person_type_name customer_type,
       CASE 
	  WHEN th.person_id = 0 THEN th.customer_name
	  ELSE CONCAT( pr.last_name,',',
		       pr.first_name,' ',
		       CASE 
			   WHEN pr.middle_name IS NOT NULL THEN CONCAT(LEFT(pr.middle_name,1),'.')
			   ELSE ''
		       END
	       )
       END customer_name,
       th.total_amount,
       DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date,
       ts.status,
       th.amount_tendered,
       th.patient_room_no,
       th.patient_reference_no,
       th.create_user,
       CONCAT( pr_user.last_name,',',
		       pr_user.first_name,' ',
		       CASE 
			   WHEN pr_user.middle_name IS NOT NULL THEN CONCAT(LEFT(pr_user.middle_name,1),'.')
			   ELSE ''
		       END
	       ) transact_user,
	CONCAT( pr_user_cancel.last_name,',',
		       pr_user_cancel.first_name,' ',
		       CASE 
			   WHEN pr_user_cancel.middle_name IS NOT NULL THEN CONCAT(LEFT(pr_user_cancel.middle_name,1),'.')
			   ELSE ''
		       END
	       ) cancel_user_name,
	 DATE_FORMAT(th.date_cancelled, '%m/%d/%Y %l:%i %p') date_cancelled,
FROM transaction_headers th LEFT JOIN person_types pt
	ON th.person_type_id = pt.id
     LEFT JOIN transaction_states ts
	ON ts.id = th.transaction_status
     LEFT JOIN persons pr
	ON pr.id = th.person_id
     LEFT JOIN persons pr_user
	ON pr_user.id = th.create_user
     LEFT JOIN persons pr_user_cancel
	ON pr_user_cancel.id = th.cancel_user
WHERE th.id = 51;
