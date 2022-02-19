<?php

class Food_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_foods_list($category){
		$sql = "SELECT fd.id food_id,
		       fd.food_name,
		       fd.barcode_value,
		       fd.quantity,
		       fd.unit_price,
		       fc.category,
		       (SELECT filename 
				FROM food_images 
				WHERE food_id = fd.id 
				ORDER BY date_created DESC 
				LIMIT 1) food_image
		FROM foods fd LEFT JOIN food_categories fc
			ON fd.food_category_id = fc.id
		WHERE fd.transaction_state_id = 4
              AND fd.food_category_id = ?";
		$query = $this->db->query($sql,$category);
		return $query->result();
	}

	public function get_food_categories(){
		$sql = "SELECT id,
					   category
				FROM food_categories fc
				ORDER BY category ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}	

	public function get_unit_of_measure_list(){
		$sql = "SELECT id,
					   description,
					   abbreviation
				FROM unit_of_measure";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add_food($params){
		$sql = "INSERT INTO foods (
					food_category_id,
					food_name,
					initial_quantity,
					quantity,
					unit_price,
					unit_cost,
					mark_up_percentage,
					mark_up_value,
					total_food_cost,
					total_food_price,
					transaction_state_id,
					barcode_value,
                    food_type_id,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
		$query = $this->db->query($sql,$params);
		return $this->db->insert_id();
	}

	public function add_food_item($params){
		$sql = "INSERT INTO food_items (
					food_id,
                    inventory_item_id,
                    inventory_item_stock_id,
                    unit_of_measure_id,
					item_name,
					quantity,
					unit_of_measure,
					unit_cost,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,?,?,NOW())";
		$query = $this->db->query($sql,$params);
       // return $this->db->insert_id();
	}

	public function add_food_image($params){
		$sql = "INSERT INTO food_images (
					food_id,
					filename,
					create_user,
					date_created
				)
				VALUES(?,?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_food_details($food_id){
        $sql = "SELECT fd.id,
                       fd.food_category_id,
                       fd.food_name,
                       fd.initial_quantity,
                       fd.quantity,
                       fd.unit_price,
                       fd.unit_cost,
                       fd.mark_up_percentage,
                       fd.mark_up_value,
                       fd.total_food_cost,
                       fd.total_food_price,
                       fd.barcode_value,
                       fc.category
                FROM foods fd LEFT JOIN food_categories fc
                		ON fd.food_category_id = fc.id
                WHERE fd.id = ?";
        $query = $this->db->query($sql,$food_id);
        return $query->result();
    }

    public function get_latest_food_image($food_id){
    	$sql = "SELECT filename 
				FROM food_images 
				WHERE food_id = ? 
				ORDER BY date_created DESC 
				LIMIT 1";
		 $query = $this->db->query($sql,$food_id);
        return $query->result();
    }

    public function get_food_ingredients($food_id){
    	$sql = "SELECT id,
    				   food_id,
                       inventory_item_id,
                       inventory_item_stock_id,
                       unit_of_measure_id,
    				   item_name,
    				   quantity,
    				   unit_of_measure,
    				   unit_cost
    			FROM food_items
    			WHERE food_id = ?";
    	$query = $this->db->query($sql,$food_id);
    	return $query->result();
    }

    public function update_food_transaction_state($params){
		$sql = "UPDATE foods
				SET transaction_state_id = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
    	$this->db->query($sql,$params);
    }

    public function get_current_food_quantity($food_id){
    	$sql = "SELECT quantity
    			FROM foods
    			WHERE id = ?";
    	$query = $this->db->query($sql,$food_id);
    	return $query->result();
    }

    public function update_food_quantity($params){
    	$sql = "UPDATE foods
    			SET quantity = ?,
    				update_user = ?,
    				date_updated = NOW()
    			WHERE id = ?";
    	$this->db->query($sql,$params);
    }

    public function create_food_qty_adjustments($food_id,$added_qty,$remarks,$create_user){
    	$food_details = $this->get_food_details($food_id);
    	$total_food_cost = $food_details[0]->total_food_cost;
    	$mark_up_value  = $food_details[0]->mark_up_value;
		$initial_quantity = $food_details[0]->initial_quantity;
		$current_qty = $food_details[0]->quantity + $added_qty;
    	$new_unit_cost = ($total_food_cost + $mark_up_value) / ($initial_quantity + $current_qty);
		
    	$sql = "UPDATE foods
    			SET quantity = ?,
    				unit_cost = ?,
    				update_user = ?,
    				date_updated = NOW()
    			WHERE id = ?";
    	$this->db->query($sql,array(
    							$current_qty,
    							$new_unit_cost,
    							$create_user,
    							$food_id
    						  )
    					);
    	$food_qty_adj_params = array(
    								$food_id,
    								$added_qty,
                                    $remarks,
    								$create_user
    						   );
    	$this->insert_food_qty_adjustments($food_qty_adj_params);
    }

    public function insert_food_qty_adjustments($params){
    	$sql = "INSERT INTO food_quantity_adjustments (
    				food_id,
    				added_quantity,
                    remarks,
    				create_user,
    				date_created
    			)
    			VALUES(?,?,?,?,NOW())";
    	$this->db->query($sql,$params);
    }

    public function get_food_qty_adjustments($food_id){
    	$sql = "SELECT fqa.id,
			       	   fqa.added_quantity,
			           DATE_FORMAT(fqa.date_created,'%m/%d/%Y %h:%i %p') date_created,
			           CONCAT(
							p.last_name,', ',
							p.first_name,' ',
							CASE 
							   WHEN p.middle_name IS NOT NULL THEN CONCAT(LEFT(p.middle_name,1),'.')
							   ELSE ''
							END
				       ) person_name
				FROM food_quantity_adjustments fqa LEFT JOIN persons p
					ON fqa.create_user = p.user_id
				WHERE food_id = ?";
    	$query = $this->db->query($sql,$food_id);
    	return $query->result();
    }

    public function update_food_details($params){
    	$sql = "UPDATE foods 
    			SET food_name = ?,
    			    food_category_id = ?,
    			    barcode_value = ?,
    			    update_user = ?,
    			    date_updated = NOW()
    			WHERE id = ?";
    	$query = $this->db->query($sql,$params);
    }

    public function update_food_item_details($params){
    	$sql = "UPDATE food_ingredients
    			SET ingredient_name = ?,
    			    amount = ?,
    			    unit_of_measure = ?,
    			    unit_cost = ?,
    			    update_user = ?,
    			    date_updated = NOW()
    			WHERE id = ?";
    	$this->db->query($sql,$params);
    }

    public function update_food_cost_details($params){
    	$sql = "UPDATE foods
    			SET total_food_cost = ?,
    			    mark_up_value = ?,
    			    unit_cost = ?,
    			    mark_up_percentage = ?,
    			    update_user = ?,
    			    date_updated = NOW()
    			WHERE id = ?";
    	$query = $this->db->query($sql,$params);
    }

    public function update_food_price($params){
    	$sql = "UPDATE foods
    			SET initial_quantity = ?,
    			    quantity = ?,
    			    unit_price = ?,
    			    unit_cost = ?,
    			    total_food_price = ?,
    			    update_user = ?,
    			    date_updated = NOW()
    			WHERE id = ?";
    	$query = $this->db->query($sql,$params);
    }

    public function delete_food_item($item_id){
        $sql = "DELETE
                FROM food_ingredients
                WHERE id = ?";
        $query = $this->db->query($sql,$item_id);
    }

    public function insert_food_quantity_returns($params){
        $sql = "INSERT INTO food_quantity_returns (
                    transaction_header_id,
                    transaction_line_id,
                    food_id,
                    quantity,
                    create_user,
                    date_created
                )
                VALUES(?,?,?,?,?,NOW())";
        $query = $this->db->query($sql,$params);
    }


    public function get_food_details_by_barcode($barcode){
        $sql = "SELECT fd.id food_id,
                       fd.food_category_id,
                       fd.food_name,
                       fd.initial_quantity,
                       fd.quantity,
                       fd.unit_price,
                       fd.unit_cost,
                       fd.mark_up_percentage,
                       fd.mark_up_value,
                       fd.total_food_cost,
                       fd.total_food_price,
                       fd.barcode_value,
                       fc.category,
                       fd.transaction_state_id,
                       ts.status
                FROM foods fd LEFT JOIN food_categories fc
                        ON fd.food_category_id = fc.id
                     LEFT JOIN transaction_states ts
                        ON ts.id = fd.transaction_state_id
                WHERE fd.barcode_value = ?
                      AND fd.transaction_state_id = 4"; // only get food items that is open for transaction
        $query = $this->db->query($sql,$barcode);
        return $query->result();
    }

    public function check_food_barcode($barcode){
        $this->db->select("COUNT(id) ctr");
        $this->db->from("foods fd");
        $this->db->where_in("fd.transaction_state_id",array(4,5));
        $this->db->where("fd.barcode_value",$barcode);
        $this->db->where("fd.barcode_value","IS NOT NULL");
        $query = $this->db->get();
        $data = $query->result();
        return $data[0]->ctr > 0 ? true : false;
    }

    public function cancel_food($params){
        $sql = "UPDATE foods
                SET cancellation_remarks = ?,
                    cancel_user = ?,
                    transaction_state_id = ?,
                    date_cancelled = NOW()
                WHERE id = ?";
        $this->db->query($sql,$params);
    }

    public function categories_for_order(){
        $sql = "SELECT id,
                       category
                FROM food_categories
                WHERE saleable = 1
                ORDER BY sequence";
        $query = $this->db->query($sql);
        return $query->result();
    }
  
}