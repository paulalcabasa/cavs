<?php

class Meal_Allowance_Category_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_list(){
		$sql = "SELECT id,
		               department_name,
		               meal_allowance_rate,
                       meal_allowance_start_time,
                       shift_hours,
					   active_flag
		        FROM departments
				WHERE active_flag = 'y'";
		$query = $this->db->query($sql);
		return $query->result();
	}

    public function insert($params){
        $sql = "INSERT INTO departments (
            department_name,
            meal_allowance_rate,
            meal_allowance_start_time,
            shift_hours
        )
        VALUES(?,?,?,?)";
        $this->db->query($sql,$params);
    }

    public function update($params){
		$sql = "UPDATE departments 
				SET department_name = ?,
                meal_allowance_rate = ?,
                meal_allowance_start_time = ?,
                shift_hours = ?,
				active_flag = ?
				WHERE id = ?";
		$this->db->query($sql,$params);
	}
	
}