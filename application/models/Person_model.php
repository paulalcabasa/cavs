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

	public function get_person_details2($person_id) {
		/*
		remove consumed amount query
		 (SELECT COALESCE(SUM(amount),0)  consumed_amount
						FROM `transaction_payments` tp INNER JOIN `transaction_headers` th
							ON tp.transaction_header_id = th.id
						WHERE payment_mode_id = 1
						AND th.person_id = p.id
						AND th.transaction_status = 1
						AND DATE(th.date_created) BETWEEN ? AND ?) consumed_amount
		*/
		$today = date('Y-m-d');
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
			       dpt.department_name,
				   dpt.meal_allowance_rate,
				   0 consumed_amount
			FROM persons p LEFT JOIN person_types pt
				ON p.person_type_id = pt.id
			     LEFT JOIN person_state ps
				ON ps.id = p.person_state_id
			     LEFT JOIN users u
				ON u.id = p.user_id
				LEFT JOIN departments dpt
				 ON dpt.id = p.department_id
			WHERE p.id = ?";
		$query = $this->db->query($sql, [$person_id]);
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
					person_state_id = ?,
					barcode_value = ?
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function update_person_details2($params){
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
					   barcode_value,
					   salary_deduction
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
							  	"barcode_no" => $row->barcode_value,
							  	"salary_deduction" => $row->salary_deduction
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
		// $sql = "SELECT p.id person_id,	
		// 		   p.barcode_value,
		// 	       p.employee_no,
		// 	       p.first_name,
		// 	       p.middle_name,
		// 	       p.last_name,
		// 	       p.address,
		// 	       p.contact_no,
		// 	       p.person_image,
		// 	       pt.person_type_name,
		// 	       ps.status,
		// 	       u.username,
		// 	       u.passcode,
		// 	       u.last_login,
		// 	       CONCAT(p.last_name,', ',p.first_name,' ',LEFT(p.middle_name,1),'.') full_name1,
		// 	       p.salary_deduction,
		// 		   dept.meal_allowance_rate, 
		// 	       (SELECT id
		// 			FROM meal_allowance
		// 			WHERE NOW() BETWEEN valid_from AND valid_until
		// 			AND person_id = p.id
		// 			ORDER BY date_created DESC
		// 			LIMIT 1
		// 			) meal_allowance_id,
		// 	       (SELECT remaining_amount
		// 			FROM meal_allowance
		// 			WHERE NOW() BETWEEN valid_from AND valid_until
		// 			AND person_id = p.id
		// 			ORDER BY date_created DESC
		// 			LIMIT 1
		// 			) remaining_amount,
		// 			(SELECT CASE 
		// 			 			WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
		// 			 			THEN CONCAT(
		// 								DATE_FORMAT(valid_from,'%m/%d/%Y %h:%i %p'),
		// 								' to ',
		// 								DATE_FORMAT(valid_until,'%m/%d/%Y %h:%i %p')
		// 							  )
		// 						ELSE NULL
		// 					END ma_validity_date
		// 			FROM meal_allowance
		// 			WHERE NOW() BETWEEN valid_from AND valid_until
		// 			AND person_id = p.id
		// 			ORDER BY date_created DESC
		// 			LIMIT 1
		// 			) ma_validity_date,
		// 			(SELECT max_allowance_daily
		// 			FROM meal_allowance
		// 			WHERE CURDATE() BETWEEN valid_from AND valid_until
		// 			AND person_id = p.id
		// 			ORDER BY date_created DESC
		// 			LIMIT 1
		// 			) max_allowance_daily,
		// 			(SELECT ma_weekly_claims_count
		// 			FROM meal_allowance
		// 			WHERE CURDATE() BETWEEN valid_from AND valid_until
		// 			AND person_id = p.id
		// 			ORDER BY date_created DESC
		// 			LIMIT 1
		// 			) ma_weekly_claims_count,
		// 			(SELECT SUM(tp.amount) consumed
		// 			FROM transaction_headers th
		// 			LEFT JOIN transaction_payments tp
		// 			ON th.id = tp.transaction_header_id 
		// 			WHERE th.transaction_status = 1
		// 			AND  tp.payment_mode_id = 1 
		// 			AND person_id = p.id
		// 			AND DATE(th.date_created) BETWEEN DATE(NOW()) AND DATE(NOW())
		// 			) consumed_amount
		// 	FROM persons p LEFT JOIN person_types pt
		// 			ON p.person_type_id = pt.id
		// 		LEFT JOIN person_state ps
		// 			ON ps.id = p.person_state_id
		// 		LEFT JOIN users u
		// 			ON u.id = p.user_id
		// 		LEFT JOIN departments dept
		// 			ON dept.id = p.department_id
		// 	WHERE p.".$search_category." = ?
		// 	      AND pt.id = ?";
				  
			
		$sql = "SELECT p.id person_id,	
				  p.barcode_value,
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
				  dept.meal_allowance_rate, 
				  0 meal_allowance_id,
				  0 remaining_amount,
				  null ma_validity_date,
				  0 max_allowance_daily,
				  0 consumed_amount
		   FROM persons p LEFT JOIN person_types pt
				   ON p.person_type_id = pt.id
			   LEFT JOIN person_state ps
				   ON ps.id = p.person_state_id
			   LEFT JOIN users u
				   ON u.id = p.user_id
			   LEFT JOIN departments dept
				   ON dept.id = p.department_id
		   WHERE p.".$search_category." = ?
				 AND pt.id = ?";
		$query = $this->db->query($sql,array($search_value,$person_type));
		return $query->result();
	}

	public function get_person_details_by_barcode($barcodeValue,$person_type){
		$today = date('Y-m-d');
		$sql = "SELECT p.id person_id,	
						p.barcode_value,
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
						dept.meal_allowance_rate, 
						dept.meal_allowance_rate ma_rate,
						dept.meal_allowance_rate alloted_amount,
						p.meal_allowance_id,
						0 consumed_amount
				FROM persons p LEFT JOIN person_types pt
						ON p.person_type_id = pt.id
					LEFT JOIN person_state ps
						ON ps.id = p.person_state_id
					LEFT JOIN users u
						ON u.id = p.user_id
					LEFT JOIN departments dept
						ON dept.id = p.department_id
				WHERE p.barcode_value = ?
					AND pt.id = ?";
		$query = $this->db->query($sql,array(
				$barcodeValue,
				$person_type
		));
	
		return $query->result();
	}

	public function get_consumed_amount($person_id){
		$today = date('Y-m-d');
		$sql = "SELECT COALESCE(SUM(amount),0)  consumed_amount
				FROM `transaction_payments` tp LEFT JOIN `transaction_headers` th
					ON tp.transaction_header_id = th.id
				WHERE payment_mode_id = 1
				AND th.person_id = ?
				AND th.transaction_status = 1
				AND DATE(th.date_created) BETWEEN ? AND ?";
		$query = $this->db->query($sql,array(
				$person_id,
				$today,
				$today
		));
	
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
				WHERE 1 = 1
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

	public function get_all_persons_with_credit(){
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
					p.person_image,
					p.salary_deduction paid_amount,
					'' remarks
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0";
		$query = $this->db->query($sql);
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

	public function get_persons_with_credit_by_cutoff_and_dept($params,$department_id){
		$department_condition = "";

		if($department_id != "all"){
			$department_condition = "AND p.department_id = " . $department_id;
		} 
		
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
					(SELECT sum(tp.amount)
					FROM transaction_payments tp INNER JOIN transaction_headers th
						ON tp.`transaction_header_id` = th.`id`
					WHERE 1 = 1
					      AND tp.payment_mode_id = 5
					      AND th.transaction_status = 1
					      AND th.person_id = p.id
					      AND DATE(th.date_created) BETWEEN ? AND ?) credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = 1 
				      AND p.person_state_id = 1 -- to get active employees
				      {$department_condition}";
		$query = $this->db->query($sql,$params);
		return $query->result();
	}

	public function get_persons_with_credit_by_cutoff($params){
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
					(SELECT sum(tp.amount)
					FROM transaction_payments tp INNER JOIN transaction_headers th
						ON tp.`transaction_header_id` = th.`id`
					WHERE 1 = 1
					      AND tp.payment_mode_id = 5
					      AND th.transaction_status = 1
					      AND th.person_id = p.id
					      AND DATE(th.date_created) BETWEEN ? AND ?) credit_amount,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0
				      AND pt.id = 1 
				      AND p.person_state_id = 1 -- to get active employees
				     ";
		$query = $this->db->query($sql,$params);
		return $query->result();
	}

	public function get_persons_with_credit_by_cutoff_and_id($params,$selected_employees){
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
					) person_name,
					(SELECT sum(tp.amount)
					FROM transaction_payments tp INNER JOIN transaction_headers th
						ON tp.`transaction_header_id` = th.`id`
					WHERE 1 = 1
					      AND tp.payment_mode_id = 5
					      AND th.transaction_status = 1
					      AND th.person_id = p.id
					      AND DATE(th.date_created) BETWEEN ? AND ?) salary_deduction,
					p.person_image
				FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				WHERE p.salary_deduction > 0 
				      AND p.id IN ($selected_employees)
				      AND p.person_state_id = 1 -- to get active employees
				     ";
		$query = $this->db->query($sql,$params);
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

	public function get_employee_by_department2($department_id){
		$sql = "SELECT pr.id person_id,
					pr.employee_no,
					CONCAT(pr.last_name, ' ', pr.first_name) person_name,
					dp.meal_allowance_rate,
					pr.department_id,
					pr.barcode_value,
					CONCAT(DATE_FORMAT(CURDATE(),'%Y-%m-%d'), '', TIME_FORMAT(dp.meal_allowance_start_time,'T%H:%i')) start_date,
					DATE_FORMAT(DATE_ADD(CONCAT(CURDATE(), ' ', dp.meal_allowance_start_time), INTERVAL dp.shift_hours HOUR), '%Y-%m-%dT%H:%i') end_date,
					pr.meal_allowance_id,
					now() between ma.valid_from and ma.valid_until is_allowance_valid,
					ma.valid_from,
					ma.valid_until,
					ma.date_created last_allowance_loaded
				FROM persons pr
					LEFT JOIN departments dp
						ON pr.department_id = dp.id
					LEFT JOIN meal_allowance ma
						ON ma.id = pr.meal_allowance_id
				WHERE pr.department_id = ?
						AND pr.person_type_id = 1
						AND pr.person_state_id = 1";
		$query = $this->db->query($sql,$department_id);
		return $query->result();
	}

	public function get_single_employee_by_department2($person_id){
		$sql = "SELECT pr.id person_id,
					pr.employee_no,
					CONCAT(pr.last_name, ' ', pr.first_name) person_name,
					dp.meal_allowance_rate,
					pr.department_id,
					pr.barcode_value,
					CONCAT(DATE_FORMAT(CURDATE(),'%Y-%m-%d'), '', TIME_FORMAT(dp.meal_allowance_start_time,'T%H:%i')) start_date,
					DATE_FORMAT(DATE_ADD(CONCAT(CURDATE(), ' ', dp.meal_allowance_start_time), INTERVAL dp.shift_hours HOUR), '%Y-%m-%dT%H:%i') end_date
				FROM persons pr
					LEFT JOIN departments dp
						ON pr.department_id = dp.id
				WHERE pr.id = ?";
		$query = $this->db->query($sql,$person_id);
		return $query->result();
	}
	
	public function get_employees_sd_by_cutoff($ids,$from_date,$end_date){
		//$ids = explode(",",$ids);
		$ids_list = "";

		foreach($ids as $i){
			$ids_list .= $i . ",";
			
		}
		$ids_list = substr($ids_list,0,-1);		
		
		$sql = "SELECT emp.person_id,
					   emp.employee_no,
					   emp.person_name,
					   (SELECT sum(tp.amount)
						FROM transaction_payments tp INNER JOIN transaction_headers th
							ON tp.transaction_header_id = th.`id`
						WHERE 1 = 1
						      AND tp.payment_mode_id = 5
						      AND th.transaction_status = 1
						      AND th.person_id = emp.person_id
						      AND DATE(th.date_created) BETWEEN ? AND ?) salary_deduction,
						emp.person_type_name
				FROM employees_v emp
				WHERE emp.person_id IN ($ids_list)";
		$query = $this->db->query($sql,array($from_date,$end_date));
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
		return $this->db->insert_id();  
	}

	public function get_employees_list($status_id){
		// $sql = "SELECT psv.person_id,
		// 			   psv.employee_no,
		// 		       psv.person_name,
		// 		       psv.alloted_amount,
		// 		       psv.remaining_amount,
		// 		       psv.salary_deduction,
		// 		       psv.ma_validity_date,
		// 			   psv.person_image,
		// 			   psv.department_name
  		// FROM persons_v psv
  		// WHERE psv.person_type_id = 1
  		// 	  AND psv.person_state_id = ?
  		// ORDER BY psv.last_name ASC,
  		//          psv.first_name ASC";

		// $sql = "SELECT person.id person_id,
		// 				person.employee_no,
		// 				CONCAT(person.first_name, ' ', person.last_name) person_name,
		// 				(SELECT alloted_amount
		// 				FROM meal_allowance
		// 				WHERE NOW() BETWEEN valid_from AND valid_until
		// 				AND person_id = person.id
		// 				ORDER BY date_created DESC
		// 				LIMIT 1
		// 				) alloted_amount,
		// 				(SELECT remaining_amount
		// 				FROM meal_allowance
		// 				WHERE NOW() BETWEEN valid_from AND valid_until
		// 				AND person_id = person.id
		// 				ORDER BY date_created DESC
		// 				LIMIT 1
		// 				) remaining_amount,
		// 				NULL salary_deduction,
		// 				(SELECT CONCAT(valid_from, ' ', valid_until) validity_date
		// 				FROM meal_allowance
		// 				WHERE NOW() BETWEEN valid_from AND valid_until
		// 				AND person_id = person.id
		// 				ORDER BY date_created DESC
		// 				LIMIT 1
		// 				) ma_validity_date,
		// 				person.person_image,
		// 				dept.department_name
		// 		FROM persons person
		// 			LEFT JOIN departments dept
		// 			ON person.department_id = dept.id
		// 		WHERE person.person_type_id = 1
		// 						AND person.person_state_id = ?
		// 						ORDER BY person.last_name ASC,
		// 							person.first_name ASC";

		$sql = "SELECT person.id person_id,
						person.employee_no,
						CONCAT(person.first_name, ' ', person.last_name) person_name,
						person.person_image,
						dept.department_name,
						dept.meal_allowance_rate
				FROM persons person
					LEFT JOIN departments dept
					ON person.department_id = dept.id
				WHERE person.person_type_id = 1
								AND person.person_state_id = ?
								ORDER BY person.last_name ASC,
									person.first_name ASC";

  		$query = $this->db->query($sql,$status_id);
  		return $query->result();
	}

	public function get_cashiers(){
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
			WHERE pt.id IN (4)";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_person_allowance_details($person_id){
		$sql = "SELECT p.id person_id,	
				   p.barcode_value,
			       p.employee_no,
			       p.first_name,
			       p.middle_name,
			       p.last_name,
			       p.address,
			       p.contact_no,
			       p.person_image,
			       pt.person_type_name,
			       ps.status,
				   dept.meal_allowance_rate, 
			       (SELECT id
					FROM meal_allowance
					WHERE NOW() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) meal_allowance_id,
			       (SELECT remaining_amount
					FROM meal_allowance
					WHERE NOW() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) remaining_amount,
					(SELECT CASE 
					 			WHEN valid_from IS NOT NULL AND valid_until IS NOT NULL
					 			THEN CONCAT(
										DATE_FORMAT(valid_from,'%m/%d/%Y %h:%i %p'),
										' to ',
										DATE_FORMAT(valid_until,'%m/%d/%Y %h:%i %p')
									  )
								ELSE NULL
							END ma_validity_date
					FROM meal_allowance
					WHERE NOW() BETWEEN valid_from AND valid_until
					AND person_id = p.id
					ORDER BY date_created DESC
					LIMIT 1
					) ma_validity_date
			FROM persons p LEFT JOIN person_types pt
					ON p.person_type_id = pt.id
				LEFT JOIN person_state ps
					ON ps.id = p.person_state_id
				LEFT JOIN users u
					ON u.id = p.user_id
				LEFT JOIN departments dept
					ON dept.id = p.department_id
			WHERE p.id = ?";
		$query = $this->db->query($sql, $person_id);
		return $query->result();
	}

	public function expire_meal_allowance($meal_allowance_id){
		$sql = "UPDATE meal_allowance 
				SET valid_until = NOW()
				WHERE id = ?";
		$this->db->query($sql, $meal_allowance_id);
	}

	public function get_employees_allowance_rates(){
		$sql = "SELECT employees.*
				FROM 
					(SELECT pr.id person_id,
						pr.barcode_value,
						dt.meal_allowance_rate,
						dt.meal_allowance_start_time,
						dt.shift_hours,
						(SELECT id
						FROM meal_allowance
						WHERE NOW() BETWEEN valid_from AND valid_until
						AND person_id = pr.id
						ORDER BY date_created DESC
						LIMIT 1
						) meal_allowance_id
					FROM persons pr INNER JOIN person_types pt
						ON pr.person_type_id = pt.id
					INNER JOIN departments dt
						ON dt.id = pr.department_id
					WHERE pr.person_state_id = 1) employees
				WHERE employees.meal_allowance_id IS NULL";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_employee_meal_allowance_history_by_person_id($person_id){
		$sql = "SELECT ma.id,
		 			   ma.person_id,
		 			   ma.alloted_amount,
		 			   ma.remaining_amount,
		 			   date_format(ma.valid_from, '%m/%d/%Y %h:%i %p') valid_from,
		 			   date_format(ma.valid_until, '%m/%d/%Y %h:%i %p') valid_until,
		 			   date_format(ma.date_created, '%m/%d/%Y %h:%i %p') date_created,
					   CONCAT(p.first_name, ' ', p.last_name) created_by
				FROM meal_allowance ma LEFT JOIN users u 
					ON u.id = ma.create_user
					LEFT JOIN persons p
						ON p.user_id = u.id
				WHERE ma.person_id = ?
				ORDER BY id DESC
				LIMIT 150";
		$query = $this->db->query($sql,array($person_id));
		return $query->result();
	}

	public function get_employee_recent_orders_by_person_id($person_id){
		// 	AND th.date_created >= DATE_ADD(CURDATE(), INTERVAL -7 DAY)
		$sql = 'SELECT th.id order_id,
				fd.food_name,
				DATE_FORMAT(th.date_created, "%m/%d/%Y %h:%i:%s %p") date_created,
				pm.mode_of_payment,
				tp.amount
			FROM transaction_payments tp INNER JOIN transaction_headers th
				ON tp.transaction_header_id = th.id
				INNER JOIN transaction_lines tl
					ON tl.transaction_header_id = th.id 
				INNER JOIN foods fd
					ON fd.id = tl.food_id
				INNER JOIN payment_modes pm
					ON pm.id = tp.payment_mode_id
			WHERE 1 = 1
			AND th.person_id = ?
			AND pm.id = 1
			AND th.transaction_status = 1
			AND date(th.date_created) >= DATE(NOW())
			ORDER BY th.date_created DESC';
		$query = $this->db->query($sql,array($person_id));
		return $query->result();
	}

	public function update_person_meal_allowance_id($person_id, $meal_allowance_id){
		$sql = "UPDATE persons
				SET meal_allowance_id = ?
				WHERE id = ?";
		$query = $this->db->query($sql, [$meal_allowance_id, $person_id]);  
		return $query;
	}

	public function get_employee_last_allowance(){
		$sql = "SELECT id person_id,
					employee_no,
					first_name,
					middle_name,
					last_name,
					meal_allowance_rate,
					barcode_value,
					salary_deduction,
					(SELECT id FROM meal_allowance WHERE person_id = p.id ORDER BY id DESC LIMIT 1) meal_allowance_id
				FROM persons p
				WHERE person_type_id = 1
					AND person_state_id = 1";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function update_consumed_amount($consumed_amount, $person_id){
		$sql = "UPDATE persons 
				SET consumed_amount = ?
				WHERE id = ?";
		$query = $this->db->query($sql, [$consumed_amount, $person_id]);  
		return $query;
	}

	public function update_date_consumed($person_id, $date){
		$sql = "UPDATE persons 
				SET date_consumed = ?
				WHERE id = ?";
		$query = $this->db->query($sql, [$date, $person_id]);  
		return $query;
	}

	public function get_consumed_data($person_id){
		$sql = "SELECT consumed_amount, date_consumed 
				FROM persons
				WHERE id = ?";
		$query = $this->db->query($sql, [$person_id]);  
		return $query->result();
	}
}