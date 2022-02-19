<?php

class Food_Categories_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_food_category($params){
		$sql = "INSERT INTO food_categories (
					category,
					sequence,
					saleable,
					active

				)
				VALUES(?,?,1,'Y')";
		$this->db->query($sql,$params);
	}

	public function get_last_sequence_no(){
		$sql = "SELECT max(sequence) last_sequence
				FROM food_categories";
		$query = $this->db->query($sql);
		$data = $query->result();
		return $data[0]->last_sequence + 1;
	}

	public function get_food_category_details($food_category_id){
		$sql = "SELECT id,
					   category,
					   sequence,
					   active
				FROM food_categories
				WHERE id= ?";
		$query = $this->db->query($sql,$food_category_id);
		$data = $query->result();
		return $data;
	}

	public function update_food_category($params){
		$sql = "UPDATE food_categories 
				SET category = ?,
				    sequence = ?,
				    active = ?
				WHERE id = ?";
		$this->db->query($sql,$params);
	}
	
}