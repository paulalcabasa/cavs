<?php

class Inventory_Expense extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('food_model');
        $this->load->model('inventory_item_model');
        $this->load->helper('encryption');
        $this->load->helper('string');
        $this->load->helper('date_formatter');
    }

    public function index(){
        $content['main_content'] = 'inventory_expenses/all_inventory_expenses';
        $this->load->view('includes/template',$content);
    }

    public function all_inventory_expenses(){
        $content['main_content'] = 'inventory_expenses/all_inventory_expenses';
        $this->load->view('includes/template',$content);
    }

     public function dt_all_inventory_expenses(){
        $this->load->library('dt_ssp');
        $transaction_state_list = $this->uri->segment(3);
        $start_date = $this->uri->segment(4);
        $end_date = $this->uri->segment(5);
        
        // DB table to use
        $table = 'inventory_expenses_v';
       
        // Table's primary key
        $primaryKey = 'food_id';
        $columns = array(
            array( 
                'db' => 'expense_no',
                'dt' => 0
                 
            ),
            array( 'db' => 'category','dt' => 1 ),
            array( 'db' => 'description', 'dt' => 2 ),
            array( 'db' => 'total_expense','dt' => 3 ),
            array( 'db' => 'status', 'dt' => 4 ),
       
            array( 'db' => 'date_created', 'dt' => 5),
            array( 
                'db' => 'food_id', 
                'dt' => 6,
                'formatter' => function($d,$row){
                   
                    $btn_data = "";
                    if($row['status'] == 'New'){ // if status is new
                        $btn_data = '<div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="view_details/'.encode_string($d).'">View Details</a></li>   
                                        <li><a href="#" class="btn_update_status" data-id="'.$d.'" data-state_id="6">Finalize</a></li>
                                        <li><a href="cancel_expense_item/'.encode_string($d).'">Cancel</a></li>      
                                      </ul>
                                    </div>';
              
                    }
                    else if($row['status'] == 'Finalized' || $row['status'] == 'Cancelled'){ // if status is new
                        $btn_data = '<div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="view_details/'.encode_string($d).'">View Details</a></li>   
                                           
                                      </ul>
                                    </div>';
              
                    }
                    return $btn_data;
                }
            )
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        $transaction_state_list = explode('%20',$transaction_state_list);
        $transaction_state_ids = "";
        foreach($transaction_state_list as $id){
            $transaction_state_ids .= $id . ",";
        }

        $transaction_state_ids = rtrim($transaction_state_ids,',');
        
        $where = "transaction_state_id IN(".$transaction_state_ids.") ";
      
        if($start_date != 'null' && $end_date != 'null'){
           $where .= " AND original_date_created BETWEEN '".$start_date."' AND '".$end_date."'";
        }

        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }
    
    public function view_details(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $food_id = decode_string($this->uri->segment(3));
        $food_details = $this->food_model->get_food_details($food_id);
        $food_image = $this->food_model->get_latest_food_image($food_id);
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        if(empty($food_image)){
            $food_image = "default_food_image.png";
        }
        else {
            $food_image = $food_image[0]->filename;
        }
        $content['main_content'] = 'inventory_expenses/view_details';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    }

    public function cancel_expense_item(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $food_id = decode_string($this->uri->segment(3));
        $food_details = $this->food_model->get_food_details($food_id);
        $food_image = $this->food_model->get_latest_food_image($food_id);
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        if(empty($food_image)){
            $food_image = "default_food_image.png";
        }
        else {
            $food_image = $food_image[0]->filename;
        }
        $content['main_content'] = 'inventory_expenses/cancel_expense_item';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    }  

    public function process_expense_cancellation(){
        $food_id = $this->input->post('food_id');
        $reason = $this->input->post('reason');
        $this->load->model('inventory_item_model');
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        $transaction_status_id = 2;

        foreach($food_ingredients as $item){
            $remaining_quantity = $this->inventory_item_model->get_current_quantity($item->inventory_item_stock_id);
            $added_qty = $item->quantity;
            $new_qty = $remaining_quantity + $added_qty;
            $create_user = $this->session->userdata('user_id');
            $this->inventory_item_model->update_item_stock_quantity(
                $item->inventory_item_stock_id,
                $new_qty,
                $create_user
            );
        }

        $params = array(
                    $reason,
                    $create_user,
                    $transaction_status_id,
                    $food_id
                  );
        $this->food_model->cancel_food($params);

        redirect('inventory_expense/all_inventory_expenses');

    }

    public function update_food_state(){
        $food_id = $this->input->post('food_id');
        $transaction_state_id = $this->input->post('transaction_state_id');
        $update_user = $this->session->userdata('user_id');
        $params = array(
                    $transaction_state_id,
                    $update_user,
                    $food_id
                  );
        $this->food_model->update_food_transaction_state($params);
    }

 

}   