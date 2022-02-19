SELECT CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
       inv_items.item_name,
       inv_stock.initial_quantity,
       inv_stock.remaining_quantity,
       uom.description unit_of_measure
FROM inventory_items_stock inv_stock LEFT JOIN inventory_items inv_items
	ON inv_stock.inventory_item_id = inv_items.id
     LEFT JOIN unit_of_measure uom
	ON uom.id = inv_stock.unit_of_measure_id
WHERE inv_stock.status_id = 6
      AND inv_stock.remaining_quantity > 0;