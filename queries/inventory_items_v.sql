SELECT inv.id inventory_item_id,
       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
       inv.item_name,
       inv_stock.remaining_quantity,
       uom.abbreviation unit_of_measure,
       inv_stock.unit_cost,
       inv.inventory_item_stock_id
FROM inventory_items inv LEFT JOIN inventory_items_stock inv_stock
	ON inv.inventory_item_stock_id = inv_stock.id
     LEFT JOIN unit_of_measure uom
	ON uom.id = inv_stock.unit_of_measure_id
WHERE inv.status_id = 1;
