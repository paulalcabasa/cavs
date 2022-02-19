<?php

class Stockholder_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_stockholder_allowance_defaults(){
		$sql = "SELECT id,
		               config_key,
		               config_name,
		               config_value
		        FROM system_config
		        WHERE id IN(7,8,9)";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function update_weekly_claims_count($params){
		$sql = "UPDATE persons
				SET ma_weekly_claims_count = ?,
					update_user = ?
				WHERE id = ?";
		$query = $this->db->query($sql,$params);
	}

	public function get_all_stockholder(){
		$sql = "SELECT person_id,
				       employee_no,
				       person_name,
				       status,
				       barcode_value,
				       meal_allowance_id
				FROM persons_v
				WHERE person_type_id = 8
				      AND person_state_id = 1";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function reload_stockholder_max_daily_allowance($ids,$max_allowance_daily){
		$this->db->set('max_allowance_daily', $max_allowance_daily);
		$this->db->where_in('id', $ids);
		$this->db->where('ma_weekly_claims_count > ', 0);
		$this->db->update('meal_allowance');	
	}

	public function reload_stockholder_weekly_claims_count($ids,$ma_weekly_claims_count){
		$this->db->set('ma_weekly_claims_count', $ma_weekly_claims_count);
		$this->db->where_in('id', $ids);
		$this->db->update('meal_allowance');
		echo $this->db->last_query();
	}
}