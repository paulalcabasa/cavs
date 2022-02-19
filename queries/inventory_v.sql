SELECT fd.id,
       fc.category,
       fd.food_name,
       fd.unit_price,
       fd.quantity,
       ts.status,
       (
	(
	   fd.initial_quantity + CASE 
				   WHEN SUM(fqa.added_quantity) IS NULL THEN 0
				   ELSE SUM(fqa.added_quantity)
				 END
	) 
	- fd.quantity
       ) no_of_sales,
       DATE_FORMAT(`fd`.`date_created`,'%m/%d/%Y') date_created,
       fd.transaction_state_id transaction_state_id,
       DATE_FORMAT(fd.date_created,'%Y-%m-%d') original_date_created
FROM foods fd
   LEFT JOIN food_categories fc
      ON fd.food_category_id = fc.id
   LEFT JOIN transaction_states ts
     ON ts.id = fd.transaction_state_id
   LEFT JOIN food_quantity_adjustments fqa
     ON fqa.food_id = fd.id
GROUP BY fd.id
