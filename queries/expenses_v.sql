SELECT CONCAT('EXP',LPAD(fd.id,6,'0')) expense_no,
       fd.food_name description,
       fc.category,
       fd.total_food_cost total_expense,
       ts.status,
       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,
       fd.transaction_state_id
FROM foods fd LEFT JOIN food_categories fc
	ON fd.food_category_id = fc.id
     LEFT JOIN transaction_states ts
	ON ts.id = fd.transaction_state_id
WHERE fd.food_type_id = 2