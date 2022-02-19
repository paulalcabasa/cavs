<?php

class Supplier_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_supplier($params){
		$sql = "INSERT INTO suppliers (
					supplier_name,
					tin,
					contact_no,
					address,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_supplier_details($supplier_id){
		$sql = "SELECT sp.id supplier_id,
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
				WHERE sp.id = ?";
		$query = $this->db->query($sql,$supplier_id);
		$data = $query->result();
		return $data;
	}

	public function update_supplier($params){
		$sql = "UPDATE suppliers 
				SET supplier_name = ?,
				    tin = ?,
				    contact_no = ?,
				    address = ?,
				    status_id = ?,
				    update_user = ?,
				    date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function get_suppliers_list(){
		$sql = "SELECT id,
		               supplier_name
		        FROM suppliers
		        WHERE status_id = 1
		        ORDER BY supplier_name ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

}