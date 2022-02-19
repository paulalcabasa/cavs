<?php

class Person_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function add_person($params){
		$sql = "INSERT INTO persons(
					user_id,
					person_type_id,
					employee_no,
					first_name,
					middle_name,
					last_name,
					address,
					contact_no,
					person_image,
					meal_allowance_rate,
					barcode_value,
					department_id,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_person_details($person_id){
		$sql = "SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.person_image,
			       p.person_type_id,
			       p.user_id,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       p.department_id,
			       p.barcode_value,
			       p.person_state_id,
			       dpt.department_name
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
				LEFT JOIN departments dpt
				 ON dpt.id = p.department_id
			WHERE p.id = ?";
		$query = $this->db->query($sql,$person_id);
		return $query->result();
	}

	public function update_person_details($params){
		$sql = "UPDATE persons 
				SET first_name = ?,
					middle_name = ?,
					last_name = ?,
					address = ?,
					contact_no = ?,
					person_image = ?,
					update_user = ?,
					date_updated = NOW(),
					department_id = ?,
					person_state_id = ?
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function get_all_employee_nos(){
		$sql = "SELECT employee_no 
				FROM persons 
				WHERE person_type_id = 1
					  AND person_state_id = 1";
		$query = $this->db->query($sql);
		$data = array();
		$index = 0;
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[$index] = $row->employee_no;
				$index++;
			}
			return $data;
		}
	}

	public function get_employees(){
		$sql = "SELECT id,
					   employee_no,
					   first_name,
					   middle_name,
					   last_name,
					   meal_allowance_rate,
					   barcode_value
				FROM persons 
				WHERE person_type_id IN(1,19)
					  AND person_state_id = 1";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_employees_by_type($employee_type){
		$sql = "SELECT id,
					   employee_no,
					   first_name,
					   middle_name,
					   last_name,
					   meal_allowance_rate,
					   barcode_value
				FROM persons 
				WHERE person_type_id = ?
					  AND person_state_id = 1";
		$query = $this->db->query($sql,$employee_type);
		return $query->result();
	}

	public function employees_recordset_array(){
		$employees_list = $this->get_employees();
		$data = array();
		foreach($employees_list as $row){
			$data[$row->employee_no] = array(
							  	"id" => $row->id,
							  	"meal_allowance_rate" => $row->meal_allowance_rate,
							  	"barcode_no" => $row->barcode_value
							  );
		}	
		return $data;
	}

	public function employees_recordset($employee_type){
		$employees_list = $this->get_employees_by_type($employee_type);
		$data = array();
		foreach($employees_list as $row){
			$data[$row->employee_no] = array(
							  	"id" => $row->id,
							  	"meal_allowance_rate" => $row->meal_allowance_rate,
							  	"barcode_no" => $row->barcode_value
							  );
		}	
		return $data;
	}


	public function update_employee_meal_allowance($params){
		$sql = "UPDATE meal_allowance
				SET remaining_amount = ?,
				    max_allowance_daily = ?,
				    ma_weekly_claims_count = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$query = $this->db->query($sql,$params);
		return $query;
	}

	public function insert_meal_allowance_logs($params){
		$sql = "INSERT INTO meal_allowance_reload_logs(employee_id,employee_no,no_of_days,meal_allowance_rate,create_user,date_created)
				VALUES(?,?,?,?,?,NOW())";
		$query = $this->db->query($sql,$params);
		return $query;
	}

	public function get_person_details_by_employee_no($employee_no){
		$sql = "SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.meal_allowance,
			       p.max_allowance_daily,
			       p.max_weekly_claims_count,
			       p.person_image,
			       p.last_meal_allowance_load_date,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.employee_no = ?";
		$query = $this->db->query($sql,$employee_no);
		return $query->result();
	}

	public function get_person_details_by_category($search_category,$search_value,$person_type){
		$sql = "SELECT p.id person_id,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
			       u.username,
			       u.passcode,
			       u.last_login,
			       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
			       p.salary_deduction,
			
			       (SELECT id
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) meal_allowance_id,
			       (SELECT remaining_amount
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) remaining_amount,
					(SELECT CASE 
					 			WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
					 			THEN CONCAT(
										DATE_FORMAT(valid_from,'%m/%d/%Y'),
										' to ',
										DATE_FORMAT(valid_until,'%m/%d/%Y')
									  )
								ELSE NULL
							END ma_validity_date
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) ma_validity_date,
					(SELECT max_allowance_daily
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) max_allowance_daily,
					(SELECT ma_weekly_claims_count
					FROM meal_allowance
					WHERE CURDATE() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) ma_weekly_claims_count
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
			WHERE p.".$search_category." = ?
			      AND pt.id = ?";
		$query = $this->db->query($sql,array($search_value,$person_type));
		return $query->result();
	}

	public function get_employee_meal_allowance($person_id,$meal_allowance_id){
		$sql = "SELECT id,
		 			   person_id,
		 			   alloted_amount,
		 			   remaining_amount,
		 			   max_allowance_daily,
		 			   ma_weekly_claims_count,
		 			   valid_from,
		 			   valid_until,
		 			   date_created
				FROM meal_allowance
				WHERE CURDATE() BETWEEN valid_from AND valid_until
					  AND person_id = ?
				      AND id = ?";
		$query = $this->db->query($sql,array($person_id,$meal_allowance_id));
		return $query->result();
	}

	public function change_person_type($params){
		$sql = "UPDATE persons 
				SET person_type_id = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$query = $this->db->query($sql,$params);
	}

	public function insert_meal_allowance_returns($params){
		$sql = "INSERT INTO person_meal_allowance_returns(
					transaction_header_id,
					person_id,
					meal_allowance_id,
					amount,
					create_user,
					date_created
				)
				VALUE(?,?,?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function update_salary_deduction($params){
		$sql = "UPDATE persons
				SET salary_deduction = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function get_current_salary_deduction($person_id){
		$sql = "SELECT salary_deduction
				FROM persons
				WHERE id = ?";
		$query = $this->db->query($sql,$person_id);
		return $query->result()[0]->salary_deduction;
	}

	public function check_employee_no_existence($employee_no){
		$sql = "SELECT id FROM persons WHERE employee_no = ?";
        $query = $this->db->query($sql,$employee_no);
        if($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
	}

	public function check_barcode_no_existence($barcode_no){
		$sql = "SELECT id FROM persons WHERE barcode_value = ?";
        $query = $this->db->query($sql,$barcode_no);
        if($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
	}

	public function get_persons_with_credit($person_type_id){
		$sql = "SELECT p.id person_id,
				       pt.person_type_name,
				       p.employee_no,
				       CONCAT(
				           p.last_name,
				           ',',
				           p.first_name,
				           ' ',
				           (CASE 
								WHEN p.middle_name IS NOT NULL 
								THEN CONCAT(LEFT(p.middle_name,1),'.') 
					   			ELSE ''
					   		END)
					) name,
					p.salary_deduction credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = ?";
		$query = $this->db->query($sql,$person_type_id);
		return $query->result();
	}

	public function get_persons_with_credit_by_dept($department_id){
		$sql = "SELECT p.id person_id,
				       pt.person_type_name,
				       p.employee_no,
				       CONCAT(
				           p.last_name,
				           ',',
				           p.first_name,
				           ' ',
				           (CASE 
						WHEN p.middle_name IS NOT NULL 
						THEN CONCAT(LEFT(p.middle_name,1),'.') 
					    END)
					) name,
					p.salary_deduction credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = 1
				      AND p.department_id = ?";
		$query = $this->db->query($sql,$department_id);
		return $query->result();
	}


	public function insert_person_debitted_credits($params){
		$sql = "INSERT INTO person_debitted_credits(
					person_id,
					employee_no,
					barcode_no,
					person_name,
					credit_amount,
					debit_amount,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_employee_by_department($department_id){
		$sql = "SELECT person_id,
		               employee_no,
		               person_name,
		               remaining_amount,
		               department_id
		        FROM employees_v
		        WHERE department_id = ?
		              AND person_type_id = 1";
		$query = $this->db->query($sql,$department_id);
		return $query->result();
	}
	
	public function get_employees_by_id($ids){
		$this->db->select('person_id,employee_no,person_name,salary_deduction,person_type_name');
		$this->db->from('employees_v');
		$this->db->where_in('person_id',$ids);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_canteen_employees_by_id($ids){
		$this->db->select('person_id,employee_no,person_name,salary_deduction,person_type_name');
		$this->db->from('canteen_employees_v');
		$this->db->where_in('person_id',$ids);
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_employee_meal_allowance($params){
		$sql = "INSERT INTO meal_allowance(
					person_id,
					person_type_id,
					barcode_no,
					earned_by_no_of_days,
					ma_rate,
					alloted_amount,
					remaining_amount,
					max_allowance_daily,
					ma_weekly_claims_count,
					valid_from,
					valid_until,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	
}