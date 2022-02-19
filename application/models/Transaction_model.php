<?php
class Transaction_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_customers_category(){
		$sql = "SELECT id,
				       person_type_name,
				       discount_percent
				FROM person_types
				WHERE id IN(8,11,12,14,1,17,18,19,13,20)
				ORDER BY person_type_name ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_applicable_payment_modes($person_type_id){
		$sql = "SELECT a.id,
					   a.payment_mode_id,
					   b.mode_of_payment,
					   a.is_default_payment_mode
				FROM person_applicable_payment_modes a LEFT JOIN payment_modes b
					ON a.payment_mode_id =  b.id
				WHERE a.person_type_id = ?";
		$query = $this->db->query($sql,$person_type_id);
		return $query->result();
	}

	public function add_transaction_header($params){
		$sql = "INSERT INTO transaction_headers (
					person_type_id,
					person_id,
					employee_no,
					barcode_no,
					customer_name,
					patient_room_no,
					patient_room_type,
					patient_reference_no,
					amount_tendered,
					total_amount,
					discount_percent,
					customer_id_no,
					remarks,
					meal_allowance_id,
					create_user,
					date_created,
					attribute1,
					attribute2,
					attribute3
				) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?,?,?)";
		$result = $this->db->query($sql,$params);
		return $this->db->insert_id();
	}

	public function add_transaction_lines($params){
		$sql = "INSERT INTO transaction_lines(
					transaction_header_id,
					food_id,
					selling_price,
					original_price,
					quantity,
					create_user,
					date_created
				) 
				VALUES(?,?,?,?,?,?,NOW())";
		$result = $this->db->query($sql,$params);
		return $result;
	}

	public function add_transaction_payments($params){
		$sql = "INSERT INTO transaction_payments(
					transaction_header_id,
					payment_mode_id,
					amount,
					meal_allowance_id
				) 
				VALUES(?,?,?,?)";
		$result = $this->db->query($sql,$params);
		return $result;
	}

	public function get_transaction_header($transaction_id){
		$sql = "SELECT th.id transaction_id,
					   CONCAT('OR',LPAD(th.id,5,0)) transaction_no,
				       pt.person_type_name customer_type,
				       CASE 
					  WHEN th.person_id = 0 THEN th.customer_name
					  ELSE CONCAT( pr.last_name,',',
						       pr.first_name,' ',
						       CASE 
							   WHEN pr.middle_name IS NOT NULL THEN CONCAT(LEFT(pr.middle_name,1),'.')
							   ELSE ''
						       END
					       )
				       END customer_name,
				       th.total_amount,
				       DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date,
				       ts.status,
				       th.amount_tendered,
				       th.patient_room_no,
				       th.patient_reference_no,
				       th.create_user,
				       CONCAT( pr_user.last_name,',',
						       pr_user.first_name,' ',
						       CASE 
							   WHEN pr_user.middle_name IS NOT NULL THEN CONCAT(LEFT(pr_user.middle_name,1),'.')
							   ELSE ''
						       END
					       ) transact_user,
					CONCAT( pr_user_cancel.last_name,',',
						       pr_user_cancel.first_name,' ',
						       CASE 
							   WHEN pr_user_cancel.middle_name IS NOT NULL THEN CONCAT(LEFT(pr_user_cancel.middle_name,1),'.')
							   ELSE ''
						       END
					       ) cancel_user_name,
					 DATE_FORMAT(th.date_cancelled, '%m/%d/%Y %l:%i %p') date_cancelled,
					 th.remarks,
					 th.cancellation_remarks,
					 th.transaction_status,
					 th.person_type_id customer_type_id,
					 th.employee_no,
					 th.person_id,
					 th.discount_percent
				FROM transaction_headers th LEFT JOIN person_types pt
					ON th.person_type_id = pt.id
				     LEFT JOIN transaction_states ts
					ON ts.id = th.transaction_status
				     LEFT JOIN persons pr
					ON pr.id = th.person_id
				     LEFT JOIN persons pr_user
					ON pr_user.user_id = th.create_user
				     LEFT JOIN persons pr_user_cancel
					ON pr_user_cancel.user_id = th.cancel_user
				WHERE th.id = ?";
		$query = $this->db->query($sql,$transaction_id);
		return $query->result()[0];
	}

	public function get_transaction_lines($transaction_header_id){
		$sql = "SELECT tl.id,
				       tl.food_id,
				       tl.original_price,
				       tl.selling_price,
				       tl.quantity,
				       fd.food_name,
				       tl.create_user,
				       fd.food_category_id,
					       fc.category
				FROM transaction_lines tl LEFT JOIN foods fd
					ON tl.food_id = fd.id
				     LEFT JOIN food_categories fc
					ON fc.id = fd.food_category_id
				WHERE tl.transaction_header_id = ?";
		$query = $this->db->query($sql,$transaction_header_id);
		return $query->result();
	}

	public function get_payment_details($transaction_header_id){
		$sql = "SELECT tp.id,
					   tp.payment_mode_id,
				       pm.mode_of_payment,
				       tp.amount,
				       tp.meal_allowance_id
				FROM transaction_payments tp LEFT JOIN payment_modes pm
					ON tp.payment_mode_id = pm.id
				WHERE tp.transaction_header_id = ?";
		$query = $this->db->query($sql,$transaction_header_id);
		return $query->result();
	}

	public function cancel_transaction($params){
		$sql = "UPDATE transaction_headers 
				SET transaction_status = 2,
				    cancellation_remarks = ?,
				    date_cancelled = NOW(),
				    cancel_user = ?
				WHERE id = ?";
		$query = $this->db->query($sql,$params);

	}

	public function get_transaction_by_employee($person_id){
		$sql = "SELECT *
				FROM transactions_v
				WHERE person_id = ?";
		$query = $this->db->query($sql,$person_id);
		return $query->result();
	}

	public function insert_temp_transaction_header($create_user){
		$sql = "INSERT INTO temp_transaction_header (
					create_user,
					date_created
				) 
				VALUES(?,NOW())";
		$result = $this->db->query($sql,$create_user);
		return $this->db->insert_id();
	}

	public function insert_temp_transaction_lines($params){
		$sql = "INSERT INTO temp_transaction_lines (
					transaction_header_id,
					food_id,
					quantity
				) 
				VALUES(?,?,?)";
		$this->db->query($sql,$params);
	}

	public function delete_temp_transaction_lines($transaction_header_id,$food_id){
		$sql = "DELETE
				FROM temp_transaction_lines
				WHERE transaction_header_id = ?
					  AND food_id = ?";
		$this->db->query($sql,array($transaction_header_id,$food_id));
	}

	public function count_pending_transactions(){
		$sql = "SELECT COUNT(header_id) ctr
				FROM pending_transactions_v";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result[0]->ctr;
	}

	public function delete_temp_transaction_header($transaction_header_id){
		$sql = "DELETE
				FROM temp_transaction_header
				WHERE id = ?";
		$this->db->query($sql,$transaction_header_id);
	}

	public function count_item_in_orders($food_id,$header_id){
		$sql = "SELECT SUM(quantity) ctr
				FROM temp_transaction_lines 
				WHERE transaction_header_id = ?
				      AND food_id = ?";
		$query = $this->db->query($sql,array($header_id,$food_id));
		$result = $query->result();
		$ctr = $result[0]->ctr;
		return $ctr == null ? 0 : $ctr;
	}
}