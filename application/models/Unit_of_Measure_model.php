<?php

class Unit_of_Measure_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_unit_of_measure($params){
		$sql = "INSERT INTO unit_of_measure (
					description,
					abbreviation,
					create_user,
					date_created
				)
				VALUES(?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_unit_of_measure_details($uom_id){
		$sql = "SELECT uom.id uom_id,
				       CONCAT('UOM',LPAD(uom.id,4,'0')) uom_no,
				       uom.abbreviation,
				       uom.description,
				       uom.status_id
				FROM unit_of_measure uom
				WHERE uom.id = ?";
		$query = $this->db->query($sql,$uom_id);
		$data = $query->result();
		return $data;
	}

	public function update_uom($params){
		$sql = "UPDATE unit_of_measure 
				SET description = ?,
				    abbreviation = ?,
				    status_id = ?,
				    update_user = ?,
				    date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function get_uom_list(){
		$sql = "SELECT id,
		               description,
		               abbreviation
		        FROM unit_of_measure
		        WHERE status_id = 1
		        ORDER BY description ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function check_abbreviation_exist($abbreviation){
		$sql = "SELECT id
				FROM unit_of_measure
				WHERE UPPER(abbreviation) = UPPER(?)";
		$query = $this->db->query($sql,$abbreviation);
        if($query->num_rows() >= 1) {
            return false;
        }
        else {
            return true;
        }
	}

	public function check_description_exist($description){
		$sql = "SELECT id
				FROM unit_of_measure
				WHERE UPPER(description) = UPPER(?)";
		$query = $this->db->query($sql,$description);
        if($query->num_rows() >= 1) {
            return false;
        }
        else {
            return true;
        }
	}

	


}