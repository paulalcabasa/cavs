SELECT id meal_allowance_id,
       CONCAT('MA',LPAD(id,5,'0')) meal_allowance_no,
       barcode_no,
       earned_by_no_of_days,
       alloted_amount,
       remaining_amount,
       CONCAT(
	DATE_FORMAT(valid_from,'%m/%d/%Y'),' - ',
	DATE_FORMAT(valid_until,'%m/%d/%Y')
       ) validity_date,
       DATE_FORMAT(date_created,'%m/%d/%Y') date_created,
       date_created orig_date_created,
       status_id,
       person_id
FROM meal_allowance ma
WHERE status_id = 1;