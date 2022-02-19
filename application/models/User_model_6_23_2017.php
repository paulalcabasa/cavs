<?php

class User_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function validate_user($username,$password){
		$this->load->helper('encryption');
		$sql = "SELECT u.id user_id,
				       p.first_name,
				       p.middle_name,
				       p.last_name,
				       pt.id person_type_id,
				       pt.person_type_name,
				       p.employee_no,
				       p.person_image,
				       u.last_login,
				       p.id person_id
				FROM users u LEFT JOIN persons p
						ON u.id = p.user_id
					 LEFT JOIN person_types pt
						ON pt.id = p.person_type_id
				WHERE u.username = ? and u.passcode = ?
				LIMIT 1";
		$password = encode_string($password);
		$params = array($username,$password);
		$query = $this->db->query($sql,$params);
		if($query->num_rows() == 1){
			$data = $query->result();
			$user_data = array(
				'user_id' => $data[0]->user_id,
				'person_id' => $data[0]->person_id,
				'first_name' => $data[0]->first_name,
				'middle_name' => $data[0]->middle_name,
				'last_name' => $data[0]->last_name,
				'user_type_id' => $data[0]->person_type_id,
				'user_type_name' => $data[0]->person_type_name,
				'employee_no' => $data[0]->employee_no,
				'person_image' => $data[0]->person_image,
			);
			$this->update_last_login($data[0]->user_id);
			$this->session->set_userdata($user_data);
			return true;
		}
		else {
			return false;
		}
	}

	private function update_last_login($user_id){
		$sql = "UPDATE users
				SET last_login = NOW()
				WHERE id = ?";
		$this->db->query($sql,$user_id);
	}

	public function add_user($username,$password){
		$this->load->helper('encryption');
		$create_user = $this->session->userdata('user_id');
		$password = encode_string($password);
		$sql = "INSERT INTO users(username,passcode,create_user,date_created) VALUES(?,?,?,NOW())";
		$params = array($username,$password,$create_user);
		$this->db->query($sql,$params);
		return $this->db->insert_id();
	}

	public function get_person_types(){
		 $sql = "SELECT id,
                       person_type_name
                FROM person_types
                ORDER BY person_type_name ASC";
        $query = $this->db->query($sql);
        return $query->result();
	}

	public function change_password($params){
		$sql = "UPDATE users
				SET passcode = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$query = $this->db->query($sql,$params);
	}
}