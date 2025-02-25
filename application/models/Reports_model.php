<?php

class Reports_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function generate_sales_report_detailed($params){
		$customer_type = $params[2];
		$customer_detail = $params[3];
		$query_params[0] = $params[0];
		$query_params[1] = $params[1];
		$start_date = $query_params[0];
		$end_date = $query_params[1];
		$this->db->select("CONCAT('OR',LPAD(th.id,5,0)) transaction_no,
					       pt.person_type_name customer_type,
					       th.customer_name,
					       fd.food_name,
					       tl.selling_price unit_price,
					       tl.quantity,
					       (tl.selling_price * tl.quantity) amount,
					       DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date");
		$this->db->from('transaction_lines tl');
		$this->db->join('transaction_headers th','tl.transaction_header_id = th.id','left');
		$this->db->join('foods fd','fd.id = tl.food_id','left');
		$this->db->join('person_types pt','pt.id = th.person_type_id','left');
		$this->db->join('persons pr','pr.id = th.person_id','left');
		$this->db->where('th.transaction_status', 1);
		$this->db->where('DATE(th.date_created) >=', $start_date);
		$this->db->where('DATE(th.date_created) <=', $end_date);
		if($customer_type != "all"){
			$this->db->where('th.person_type_id', $customer_type);
			if($customer_detail != ""){
				$this->db->group_start();
				if($customer_type == 1 || $customer_type == 8) {
					$this->db->or_like('th.employee_no', $customer_detail,'after');
					$this->db->or_like('th.customer_name', $customer_detail,'after');
				}
				else if($customer_type == 12){
					$this->db->or_like('th.customer_name', $customer_detail,'after');
					$this->db->or_like('th.patient_room_no', $customer_detail,'after');
					$this->db->or_like('th.patient_reference_no', $customer_detail,'after');
				}
				else if($customer_type == 11 || $customer_type == 14){
					$this->db->or_like('th.customer_name', $customer_detail,'after');
				}

				$this->db->group_end();
			}
		}
		$query = $this->db->get();

		return $query->result();
		
	}

	public function generate_sales_report($params){
	
		$customer_type = $params[2];
		$customer_detail = $params[3];
		$transacted_by = $params[4];
		$query_params[0] = $params[0];
		$query_params[1] = $params[1];
		$start_date = $query_params[0];
		$end_date = $query_params[1];

		$where = "";

		if($customer_type != "all"){
			$where .= " AND th.person_type_id = ". $customer_type;
		}
		if($transacted_by != 'all') {
			$where .= " AND th.create_user = ". $transacted_by;
		}

		// if($customer_type != "all"){
		// 	$this->db->where('person_type_id', $customer_type);
		// 	if($customer_detail != ""){
		// 		$this->db->group_start();
		// 		if($customer_type == 1 || $customer_type == 8) {
		// 			$this->db->or_like('employee_no', $customer_detail,'after');
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 		}
		// 		else if($customer_type == 12){
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 			$this->db->or_like('patient_room_no', $customer_detail,'after');
		// 			$this->db->or_like('patient_reference_no', $customer_detail,'after');
		// 		}
		// 		else if($customer_type == 11 || $customer_type == 14){
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 		}

		// 		$this->db->group_end();
		// 	}
		// }

		// $sql = "SELECT th.id transaction_header_id,
		// 			pt.person_type_name,
		// 			CONCAT(cashier_person.first_name,' ', cashier_person.last_name) cashier_name,
		// 			th.barcode_no,
		// 			CONCAT(customer.first_name,' ', customer.last_name) customer_name,
		// 			th.discount_percent,
		// 			SUM(CASE WHEN tp.payment_mode_id = 1 THEN tp.amount ELSE 0 END) consumed_allowance,
		// 			SUM(CASE WHEN tp.payment_mode_id = 2 THEN tp.amount ELSE 0 END) added_cash,
		// 			DATE_FORMAT(th.date_created,'%M, %d %Y') date_created,
		// 			DATE_FORMAT(th.date_created,'%h:%i %p') time_created,
		// 			th.person_id,
		// 			th.total_amount
		// 		FROM transaction_headers th 
		// 			LEFT JOIN person_types pt
		// 				ON pt.id = th.person_type_id
		// 			LEFT JOIN users cashier_user
		// 				ON cashier_user.id = th.create_user
		// 			LEFT JOIN persons cashier_person
		// 				ON cashier_person.user_id = cashier_user.id
		// 			LEFT JOIN persons customer
		// 				ON customer.id = th.person_id
		// 			LEFT JOIN  transaction_payments tp
		// 				ON tp.transaction_header_id = th.id
		// 			LEFT JOIN payment_modes pm	
		// 				ON pm.id = tp.payment_mode_id
		// 		WHERE DATE(th.date_created) BETWEEN '$start_date' AND '$end_date' 
		// 		". $where ."
		// 		GROUP BY th.person_id,th.id
		// 		ORDER BY customer.last_name, customer.first_name";

			$sql = "SELECT th.id transaction_header_id,
					pt.person_type_name,
					th.barcode_no,
					CONCAT(customer.first_name,' ', customer.last_name) customer_name,
					SUM(CASE WHEN tp.payment_mode_id = 1 THEN tp.amount ELSE 0 END) consumed_allowance,
		 			SUM(CASE WHEN tp.payment_mode_id = 2 THEN tp.amount ELSE 0 END) added_cash,
					th.discount_percent,
					DATE_FORMAT(th.date_created,'%M, %d %Y') date_created,
					DATE_FORMAT(th.date_created,'%h:%i %p') time_created,
					th.person_id,
					th.total_amount
				FROM transaction_headers th 
					LEFT JOIN person_types pt
						ON pt.id = th.person_type_id
					LEFT JOIN persons customer
						ON customer.id = th.person_id
					LEFT JOIN  transaction_payments tp
						ON tp.transaction_header_id = th.id
					WHERE DATE(th.date_created) BETWEEN '$start_date' AND '$end_date' 
					". $where ."
					GROUP BY th.person_id,th.id ";	
			$query = $this->db->query($sql);
		
			return $query->result();

	
		// $this->db->select("transaction_no,
		// 			       customer_type,
		// 			       customer_name,
		// 			       total_amount,
		// 			       transaction_date");
		// $this->db->from('transactions_v');
		// $this->db->where('	transaction_status', 1);
		// $this->db->where('DATE(date_created) >=', $start_date);
		// $this->db->where('DATE(date_created) <=', $end_date);
		// if($transacted_by != '') {
		// 	$this->db->where('create_user', $transacted_by);
		// }
		// if($customer_type != "all"){
		// 	$this->db->where('person_type_id', $customer_type);
		// 	if($customer_detail != ""){
		// 		$this->db->group_start();
		// 		if($customer_type == 1 || $customer_type == 8) {
		// 			$this->db->or_like('employee_no', $customer_detail,'after');
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 		}
		// 		else if($customer_type == 12){
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 			$this->db->or_like('patient_room_no', $customer_detail,'after');
		// 			$this->db->or_like('patient_reference_no', $customer_detail,'after');
		// 		}
		// 		else if($customer_type == 11 || $customer_type == 14){
		// 			$this->db->or_like('customer_name', $customer_detail,'after');
		// 		}

		// 		$this->db->group_end();
		// 	}
		// }
		// $query = $this->db->get();
		return $query->result();
	}


	public function get_sales_per_item_report($food_id){
	    $sql = "SELECT CONCAT('OR',LPAD(th.id,5,0)) transaction_no,
					       pt.person_type_name customer_type,
					       CONCAT( pr.last_name,',',
						       pr.first_name,' ',
						       CASE 
							   WHEN pr.middle_name IS NOT NULL THEN CONCAT(LEFT(pr.middle_name,1),'.')
							   ELSE ''
						       END
					       ) customer_name,
					       fd.food_name,
					       tl.selling_price unit_price,
					       tl.quantity,
					       (tl.selling_price * tl.quantity) amount,
					       DATE_FORMAT(th.date_created, '%m/%d/%Y %l:%i %p') transaction_date
					FROM transaction_lines tl LEFT JOIN transaction_headers th
						ON tl.transaction_header_id = th.id
					     LEFT JOIN foods fd
						ON fd.id = tl.food_id
					     LEFT JOIN person_types pt
						ON pt.id = th.person_type_id
					     LEFT JOIN persons pr
						ON pr.id = th.person_id
					WHERE tl.food_id = ?";
		$query = $this->db->query($sql,$food_id);
		return $query->result();
    }

    public function get_cost_vs_sales_summary_report($params){
    	$sql = "SELECT CONCAT('FD',LPAD(fd.id,5,0)) food_no,
				       fd.food_name,
				       DATE_FORMAT(fd.date_created,'%m/%d/%Y') date_created,
				       fd.mark_up_percentage,
				       fd.mark_up_value,
				       fd.initial_quantity,
				       fd.total_food_cost,
				       (fd.total_food_price - fd.total_food_cost) expected_revenue,
				       (fd.initial_quantity - fd.quantity) sold_quantity,
				       fd.quantity,
				       ((fd.initial_quantity - fd.quantity) * fd.unit_price) total_sales,
				       (((fd.initial_quantity - fd.quantity) * fd.unit_price) - fd.total_food_cost) actual_revenue
				FROM foods fd
				WHERE DATE(fd.date_created) BETWEEN ? AND ?";
		$query = $this->db->query($sql,$params);
		return $query->result();	
    }

    public function get_monthly_expense_report_sum($date){
    	$sql = "SELECT SUM(total_food_cost) total_food_cost
				FROM foods
				WHERE DATE(date_created) = ?
				      AND transaction_state_id <> 2";
		$query = $this->db->query($sql,$date);
		$result =  $query->result();
		return $result[0]->total_food_cost != "" ? $result[0]->total_food_cost : 0;
    }

    public function get_sales_report_by_month_year($month,$year){
    	$sql = "SELECT SUM(total_amount) total_amount
				FROM transaction_headers
				WHERE YEAR(date_created) = ?
				      AND MONTH(date_created) = ?
				      AND transaction_status = 1";
		$query = $this->db->query($sql,array($year,$month));
		$result =  $query->result();
		return $result[0]->total_amount != "" ? $result[0]->total_amount : 0;
    }

    public function get_expense_report_by_month_year($month,$year){
    	$sql = "SELECT SUM(total_food_cost) total_food_cost
				FROM foods
				WHERE YEAR(date_created) = ?
				      AND MONTH(date_created) = ?
				      AND transaction_state_id <> 2";
		$query = $this->db->query($sql,array($year,$month));
		$result =  $query->result();
		return $result[0]->total_food_cost != "" ? $result[0]->total_food_cost : 0;
    }

    public function get_inventory_item_report($date_from,$date_to){
        $sql = "SELECT CONCAT('ITEM',LPAD(id,5,0)) item_no,
                       ingredient_name,
                       amount,
                       unit_of_measure,
                       unit_cost,
                       (amount * unit_cost) total_cost,
                       DATE_FORMAT(date_created,'%m/%d/%Y %l:%i %p') date_created
                FROM food_ingredients
                WHERE DATE(date_created) BETWEEN ? AND ?";
        $query = $this->db->query($sql,array($date_from,$date_to));
        return $query->result();
    }

    public function get_employee_stockholder_billing_summary($start_date,$end_date,$customer_type,$department){

    	$sql = "SELECT  p.id,
					    p.employee_no,
					    CONCAT(
							p.last_name,', ',
							p.first_name,' ',
							CASE 
								WHEN p.middle_name IS NOT NULL THEN CONCAT(LEFT(p.middle_name,1),'.')
							ELSE ''
						END
						) person_name,
					    (SELECT alloted_amount
					     FROM meal_allowance
					     WHERE valid_from >= ? AND valid_until <= ?
					     AND person_id = p.id
					     ORDER BY date_created DESC
					     LIMIT 1
					    ) alloted_amount,
					    (SELECT SUM(tp.amount)
					     FROM transaction_payments tp LEFT JOIN transaction_headers th
					     ON tp.transaction_header_id = th.id
						 WHERE tp.payment_mode_id = 1
						 AND th.person_id = p.id
					     AND th.transaction_status = 1
					     AND DATE(th.date_created) BETWEEN ? AND ?
					    ) consumed_amount
				FROM persons p 
				WHERE p.person_type_id = ?";
    	
    	if($customer_type == 1){ // if employee, add this department filter
    		$sql .= " AND department_id = " . $department;
    	}

    	$query = $this->db->query($sql,array(
    										$start_date,
    										$end_date,
    										$start_date,
    										$end_date,
    										$customer_type
    		                           )
    	         			     );
    	return $query->result();
    }

    public function get_patient_billing_summary($start_date,$end_date){
    	$sql = "SELECT th.id,
				       th.customer_name patient_name,
				       th.patient_room_no room_no,
				       th.patient_room_type room_type,
				       th.total_amount,
				       DATE_FORMAT(th.date_created,'%m/%d/%Y') date_created,
				       th.remarks
				FROM transaction_headers th
				WHERE th.person_type_id = 12
				      AND th.transaction_status = 1
				      AND DATE(th.date_created) BETWEEN ? AND ?
				      ORDER BY th.customer_name ASC";
		$query = $this->db->query($sql,array($start_date,$end_date));
		return $query->result();
    }

    public function get_mdi_billing_summary($start_date,$end_date){
    	$sql = "SELECT th.id,
				       th.customer_name,
				       th.total_amount,
				       DATE_FORMAT(th.date_created,'%m/%d/%Y') date_created,
				       th.remarks
				FROM transaction_headers th
				WHERE th.person_type_id = 14
				      AND th.transaction_status = 1
				      AND DATE(th.date_created) BETWEEN ? AND ?
				      ORDER BY th.customer_name ASC";
		$query = $this->db->query($sql,array($start_date,$end_date));
		return $query->result();	  
    }

    public function get_monthly_sales_report_sum($date){
    	$sql = "SELECT SUM(total_amount) total_amount
				FROM transaction_headers
				WHERE DATE(date_created) = ?
				      AND transaction_status = 1";
		$query = $this->db->query($sql,$date);
		$result =  $query->result();
		return $result[0]->total_amount != "" ? $result[0]->total_amount : 0;
    }

 	public function get_inventory_items_onhand(){
		$sql = "SELECT CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_items.item_name,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost
				FROM inventory_items_stock inv_stock LEFT JOIN inventory_items inv_items
					ON inv_stock.inventory_item_id = inv_items.id
				     LEFT JOIN unit_of_measure uom
					ON uom.id = inv_stock.unit_of_measure_id
				WHERE inv_stock.status_id = 6
				      AND inv_stock.remaining_quantity > 0";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_food_sales_items_onhand(){
		$sql = "SELECT CONCAT('FD',LPAD(fd.id,5,'0')) food_no,
				       fc.category,
				       fd.food_name,
				       fd.initial_quantity,
				       fd.quantity remaining_quantity,
				       (fd.initial_quantity - fd.quantity) sold_quantity
				FROM foods fd LEFT JOIN food_categories fc
					ON fd.food_category_id = fc.id
				WHERE 1 = 1
				    AND fd.quantity > 0
					AND fd.transaction_state_id IN(1,3,4)
					AND fd.food_type_id = 1";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_supplier_item_price($params){
		$sql = "SELECT inv_stock.id,
				       inv_stock.inventory_item_id,
				       sp.supplier_name,
				      (SELECT unit_cost FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) price,
				       (SELECT initial_quantity FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				             AND purchase_date = (SELECT MAX(purchase_date) 
				                                  FROM inventory_items_stock 
				                                  WHERE supplier_id = inv_stock.supplier_id
				                                        AND unit_of_measure_id = ?
				                                  )
				       ) quantity,
				       (SELECT DATE_FORMAT(MAX(purchase_date),'%m/%d/%Y') FROM inventory_items_stock 
				       WHERE supplier_id = inv_stock.supplier_id
				       AND unit_of_measure_id = ?
				       ) purchase_date
				FROM inventory_items_stock inv_stock INNER JOIN suppliers sp
					ON inv_stock.supplier_id = sp.id
				WHERE inv_stock.inventory_item_id = ?
				      AND inv_stock.status_id = 6
				      AND inv_stock.unit_of_measure_id = ?
				      GROUP BY supplier_id
				      ORDER BY price ASC";
		$query = $this->db->query($sql,$params);
  		return $query->result();
	}

	public function get_inventory_expense($params){
		$sql = "SELECT food_id,
				       expense_no,
				       description,
				       category,
				       total_expense,
				       date_created
				FROM inventory_expenses_v
				WHERE transaction_state_id = 6
				      AND original_date_created BETWEEN ? AND ?";
		$query = $this->db->query($sql,$params);
  		return $query->result();
	}

	public function get_sales_report_per_payment_type($start_date,$end_date,$payment_modes){
		// $this->db->select("tps.id payment_id,
		// 			       CONCAT('OR',LPAD(tps.transaction_header_id,5,'0')) transaction_no,
		// 			       pt.person_type_name customer_type,
		// 			       CASE WHEN th.customer_name is null THEN p.first_name else th.customer_name e customer_name,
		// 			       pm.mode_of_payment,
		// 			       tps.amount,
		// 			       DATE_FORMAT(th.date_created,'%m/%d/%Y') transaction_date");
		// $this->db->from('transaction_payments tps');
		// $this->db->join('payment_modes pm','tps.payment_mode_id = pm.id','left');
		// $this->db->join('transaction_headers th','th.id = tps.transaction_header_id','left');
		// $this->db->join('person_types pt','pt.id = th.person_type_id','left');
		// $this->db->join('persons p','p.id = th.person_id','left');
		// $this->db->where('th.transaction_status', 1);
		// $this->db->where('DATE(th.date_created) >=', $start_date);
		// $this->db->where('DATE(th.date_created) <=', $end_date);
		// $this->db->where_in('tps.payment_mode_id',$payment_modes);
		// $query = $this->db->get();
		$where_pmode = "";

		foreach($payment_modes as $p) {
			$where_pmode .= $p . ",";
		}

		$where_pmode = substr($where_pmode, 0, strlen($where_pmode) -1);

		$sql = "SELECT
					tps.id
					payment_id,
					CONCAT('OR', LPAD(tps.transaction_header_id, 5, '0'))
					transaction_no,
					pt.person_type_name
					customer_type,
					CASE 
						WHEN th.customer_name = '' THEN CONCAT(p.first_name,' ', p.last_name) 
						ELSE th.customer_name 
					END customer_name,
					pm.mode_of_payment,
					tps.amount,
					DATE_FORMAT(th.date_created, '%m/%d/%Y')
						transaction_date
					FROM   transaction_payments tps
						LEFT JOIN payment_modes pm
								ON tps.payment_mode_id = pm.id
						LEFT JOIN transaction_headers th
								ON th.id = tps.transaction_header_id
						LEFT JOIN person_types pt
								ON pt.id = th.person_type_id
						LEFT JOIN persons p
								ON p.id = th.person_id
					WHERE  th.transaction_status = 1
						AND DATE(th.date_created) >= '$start_date'
						AND DATE(th.date_created) <= '$end_date'
						AND tps.payment_mode_id IN($where_pmode) ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_employee_allowance_report($date, $category) {
		$where = "";

		if($category != "") {
			$where = " AND person.department_id = '$category'";
		}
		$sql = "SELECT allowance.alloted_amount,
						person.first_name,
						person.last_name,
						allowance_category.department_name meal_allowance_category,
						DATE_FORMAT(allowance.valid_from, '%m/%d/%Y %h:%i %p') valid_from,
						DATE_FORMAT(allowance.valid_until, '%m/%d/%Y %h:%i %p') valid_until,
						allowance.id meal_allowance_id
				FROM meal_allowance allowance
				LEFT JOIN persons person
					ON allowance.person_id = person.id
				LEFT JOIN departments allowance_category
					ON allowance_category.id = person.department_id
				WHERE DATE(allowance.date_created) BETWEEN '$date' AND '$date'
				".$where."
				ORDER BY person.last_name, person.first_name, person.department_id";
		$query = $this->db->query($sql);
		return $query->result();
	}
}