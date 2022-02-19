SELECT fd.id food_id,
       fc.category,
       fd.food_name,
       fd.unit_price,
       fd.quantity,
       ts.status,
       fd.date_created
FROM foods fd LEFT JOIN food_categories fc
	ON fd.food_category_id = fc.id
     LEFT JOIN transaction_states ts
	ON ts.id = fd.transaction_state_id
WHERE fd.transaction_state_id = 5;