SELECT sp.id supplier_id,
       CONCAT('SP',LPAD(sp.id,4,'0')) supplier_no,
       sp.supplier_name,
       sp.tin,
       sp.contact_no,
       sp.address,
       sp.status_id,
       st.description state,
       format_person_name(ps.first_name,ps.middle_name,ps.last_name) created_by,
       DATE_FORMAT(sp.date_created,'%m/%d/%Y') date_created
FROM suppliers sp LEFT JOIN STATUS st
	ON sp.status_id = st.id
     LEFT JOIN users u
	ON u.id = sp.create_user
     LEFT JOIN persons ps
	ON ps.user_id = u.id
WHERE sp.status_id = 1;