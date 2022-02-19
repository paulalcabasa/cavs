SELECT uom.id uom_id,
       CONCAT('UOM',LPAD(uom.id,4,'0')) uom_no,
       uom.abbreviation,
       uom.description
FROM unit_of_measure uom
WHERE status_id = 1;