SELECT inv_stock.id stock_id,
       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
       inv_stock.initial_quantity,
       inv_stock.remaining_quantity,
       inv_stock.unit_cost,
       uom.abbreviation unit_of_measure,
       sp.supplier_name,
       DATE_FORMAT(inv_stock.date_created,'%m/%d/%Y') date_added,
       inv_stock.inventory_item_id,
       inv_stock.status_id,
       st.description STATUS
FROM inventory_items_stock inv_stock LEFT JOIN suppliers sp
	ON inv_stock.supplier_id = sp.id
     LEFT JOIN unit_of_measure uom
	ON uom.id = inv_stock.unit_of_measure_id
     LEFT JOIN STATUS st
	ON st.id = inv_stock.status_id;