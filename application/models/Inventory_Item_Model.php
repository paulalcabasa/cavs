<?php

class Inventory_Item_Model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function insert_inventory_items($params){
		$sql = "INSERT INTO inventory_items (
					item_name,
					create_user,
					date_created
				)
				VALUES(?,?,NOW())";
		$this->db->query($sql,$params);
	}

	public function get_inventory_item_details($inventory_item_id){
		$sql = "SELECT inv.id inventory_item_id,
				       CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
				       inv.item_name,
				       st.description status,
				       CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
				       inv_stock.initial_quantity,
				       inv_stock.remaining_quantity,
				       uom.description unit_of_measure,
				       inv_stock.unit_cost,
				       sp.supplier_name,
				       st.id status_id
				FROM inventory_items inv LEFT JOIN status st
					ON inv.status_id = st.id
				     LEFT JOIN inventory_items_stock inv_stock 
					ON inv_stock.id = inv.inventory_item_stock_id
				     LEFT JOIN unit_of_measure uom ON 
					uom.id = inv_stock.unit_of_measure_id
				     LEFT JOIN suppliers sp
					ON sp.id = inv_stock.supplier_id

				WHERE inv.id = ?";
		$query = $this->db->query($sql,$inventory_item_id);
		$data = $query->result();
		return $data;
	}

	public function update_inventory_item($params){
		$sql = "UPDATE inventory_items 
				SET item_name = ?,
				    status_id = ?,
				    update_user = ?,
				    date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function insert_inventory_items_stock($params){
		$sql = "INSERT INTO inventory_items_stock (
					inventory_item_id,
					supplier_id,
					initial_quantity,
					remaining_quantity,
					unit_of_measure_id,
					unit_cost,
					status_id,
					purchase_date,
					create_user,
					date_created
				)
				VALUES(?,?,?,?,?,?,?,CONCAT(?,' ', TIME(NOW())),?,NOW())";
		$this->db->query($sql,$params);
		return $this->db->insert_id();
	}

	public function get_inventory_item_stock_details($stock_id){
		$sql = "SELECT inv_stock.id stock_id,
					   CONCAT('STK',LPAD(inv_stock.id,4,'0')) stock_no,
		               inv_stock.inventory_item_id,
		               inv_stock.supplier_id,
		               inv_stock.initial_quantity,
		               inv_stock.remaining_quantity,
		               inv_stock.unit_of_measure_id,
		               inv_stock.unit_cost,
		               inv_stock.status_id,
		               inv_stock.purchase_date,
		               CONCAT('INV',LPAD(inv.id,4,'0')) inventory_item_no,
		               inv.item_name,
		               st.description inventory_item_status
		        FROM inventory_items_stock inv_stock LEFT JOIN inventory_items inv
		        		ON inv_stock.inventory_item_id = inv.id
		        	 LEFT JOIN status st
		        	 	ON st.id = inv.status_id
		        WHERE inv_stock.id = ?";
		$data = $this->db->query($sql,$stock_id);
		return $data->result();
	}

	public function update_item_stock($params){
		$sql = "UPDATE inventory_items_stock 
				SET supplier_id = ?,
				    initial_quantity = ?,
				    remaining_quantity = ?,
				    unit_of_measure_id = ?,
				    unit_cost = ?,
				    purchase_date = ?,
				    update_user = ?,
				    date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function update_item_stock_status($params){	
		$sql = "UPDATE inventory_items_stock
				SET status_id = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function assign_stock_to_item($params){
		$sql = "UPDATE inventory_items 
				SET inventory_item_stock_id = ?,
					update_user = ?,
					date_updated = NOW()
				WHERE id = ?";
		$this->db->query($sql,$params);
	}

	public function get_inventory_items_list(){
		$sql = "SELECT inv_stock.id inventory_item_stock_id,
						inv.id inventory_item_id,
					  CONCAT('INV',LPAD(inv.id,4,'0')) AS inventory_item_no,
					  inv.item_name               ,
					  inv_stock.remaining_quantity ,
					  uom.abbreviation             ,
					  inv_stock.unit_cost         ,
					  inv_stock.unit_of_measure_id,
					  uom.abbreviation unit_of_measure
				FROM inventory_items inv
				    LEFT JOIN inventory_items_stock inv_stock
				      ON inv.id = inv_stock.inventory_item_id
				   LEFT JOIN unit_of_measure uom
				     ON uom.id = inv_stock.unit_of_measure_id
				WHERE inv.status_id = 1 -- active item
				      AND inv_stock.status_id = 6 -- finalized
				      AND inv_stock.remaining_quantity > 0";
		$query = $this->db->query($sql);
		return $query->result();		
	}

	public function update_item_stock_quantity($stock_id,$quantity,$create_user){
		$sql = "UPDATE inventory_items_stock
				SET remaining_quantity = ?,
				    create_user = ?,
				    date_created = NOW()
				WHERE id = ?";
		$query = $this->db->query($sql,array($quantity,$create_user,$stock_id));
	}

	public function get_current_quantity($stock_id){
		$sql = "SELECT remaining_quantity
				FROM inventory_items_stock
				WHERE id = ?";
		$query = $this->db->query($sql,$stock_id);
		$data = $query->result();
		return $data[0]->remaining_quantity;
	}

	public function get_food_type(){
		$sql = "SELECT id,
		               food_type_name
		        FROM food_type";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function check_item_exist($item_name){
		$sql = "SELECT id
				FROM inventory_items
				WHERE UPPER(item_name) = UPPER(?)";
		$query = $this->db->query($sql,$item_name);
        if($query->num_rows() >= 1) {
            return false;
        }
        else {
            return true;
        }
	}

	public function get_inventory_item_stock_summary($inventory_item_id){
		$sql = "SELECT 
				       SUM(remaining_quantity) quantity,
				       unit_of_measure
				FROM inventory_item_stock_v
				WHERE inventory_item_id = ?
				GROUP BY 
					 unit_of_measure";
		$query = $this->db->query($sql,$inventory_item_id);
		return $query->result();
	}


}