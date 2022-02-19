<?php

class System_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_system_config($config_id){
		$sql = "SELECT config_key,
					   config_value,
					   config_name
				FROM system_config
				WHERE id = ?";
		$query = $this->db->query($sql,$config_id);
		return $query->result();
	}

	public function get_departments(){
		$sql = "SELECT id,
		               department_name
		        FROM departments
		        ORDER BY department_name ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_status(){
		$sql = "SELECT id,
		               description
		        FROM status
		        ORDER BY description ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_payment_modes(){
		$sql = "SELECT id,
		        	   mode_of_payment
		       	FROM payment_modes
		       	WHERE active = 1
		       	ORDER BY mode_of_payment ASC";
		$query = $this->db->query($sql);
		return $query->result();    
	}

	public function count_temp_transaction_lines(){
		$sql = "SELECT id
				FROM temp_transaction_lines";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function truncate_temp_tables(){
		$this->db->truncate('temp_transaction_header');
		$this->db->truncate('temp_transaction_lines');
	}
	
	public function get_person_state(){
		$sql = "SELECT id,
		               status
		        FROM person_state 
		        WHERE id IN(1,2)";
		$query = $this->db->query($sql);
		return $query->result();
	}

}