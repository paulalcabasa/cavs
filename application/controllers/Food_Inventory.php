<?php

class Food_Inventory extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('food_model');
        $this->load->model('inventory_item_model');
        $this->load->helper('encryption');
        $this->load->helper('string');
        $this->load->helper('date_formatter');
    }

    public function index(){
        $content['main_content'] = 'food_inventory/all_foods_view';
        $this->load->view('includes/template',$content);
    }

    public function new_food2(){
        $list_of_uom = $this->food_model->get_unit_of_measure_list();
        
        $index = 0;
        $data = array();
        foreach($list_of_uom as $row){
            $data[] = array(
                        "id" => $row->id,
                    //  "description" => $row->description,
                        "name" => $row->abbreviation
                      );
        }
        $content['uom_list'] = json_encode($data);
        $content['food_categories'] = $this->food_model->get_food_categories();
        $content['main_content'] = 'food_inventory/new_food_view2';
        $this->load->view('includes/template',$content);
          
     
    }

    public function new_food(){
    	$list_of_items = $this->inventory_item_model->get_inventory_items_list(); 
        $list_of_food_types = $this->inventory_item_model->get_food_type();   	
        $items_index = 0;
        $items_list = array();
        $food_items_options = '<option value="">Select food item</option>';
        foreach($list_of_items as $item){
            $food_items_options .= '<option value="'.$item->inventory_item_id.'" 
                                        data-remaining_quantity="'.$item->remaining_quantity.'" 
                                        data-unit_of_measure="'.$item->unit_of_measure.'" 
                                        data-unit_of_measure_id="'.$item->unit_of_measure_id.'" 
                                        data-unit_cost="'.$item->unit_cost.'" 
                                        data-inventory_item_no="'.$item->inventory_item_no.'" 
                                        data-inventory_item_stock_id="'.$item->inventory_item_stock_id.'">'
                                        . 'STK' . sprintf('%04d',$item->inventory_item_stock_id) . ' | '.$item->remaining_quantity. ' ' . $item->unit_of_measure.' | '. $item->item_name .
                                    '</option>';
        }
        $content['food_categories'] = $this->food_model->get_food_categories();
        $content['food_items_options'] = $food_items_options;
        $content['list_of_food_types'] = $list_of_food_types;
    	$content['main_content'] = 'food_inventory/new_food_view';
        $this->load->view('includes/template',$content);
    }

    public function add_food(){
        $food_category_id = $this->input->post('sel_category');
        $food_name = $this->input->post('txt_food_name');
        $quantity = $this->input->post('quantity');
        $unit_price = $this->input->post('unit_price');
        $unit_cost = $this->input->post('unit_cost');
        $total_price = $this->input->post('total_price');
        $total_cost = $this->input->post('total_cost');
        $food_type = $this->input->post('sel_food_type');
        $barcode = trim($this->input->post('txt_barcode')) != "" ? trim($this->input->post('txt_barcode')) : null;
        $mark_up_percentage = $this->input->post('mark_up_percentage');
        $mark_up_value = $this->input->post('mark_up_value');
        $create_user = $this->session->userdata('user_id');
        // initial state when a food is created
       
        $is_barcode_exist = $this->food_model->check_food_barcode($barcode);

        if($is_barcode_exist){
            echo "<strong>" . $barcode ."</strong> : Barcode already exists.";
        }
        else {

            $transaction_state_id = 5;
            // adding details for food
            $food_details_params = array(
                                $food_category_id,
                                $food_name,
                                $quantity,
                                $quantity,
                                $unit_price,
                                $unit_cost,
                                $mark_up_percentage,
                                $mark_up_value,
                                $total_cost,
                                $total_price,
                                $transaction_state_id,
                                $barcode,
                                $food_type,
                                $create_user
                            );

            $food_id = $this->food_model->add_food($food_details_params);

            // adding ingredients
            $list_of_items = json_decode($this->input->post('items'));
            foreach($list_of_items as $item){
                $current_quantity = $this->inventory_item_model->get_current_quantity($item->inventory_item_stock_id);
                if($item->quantity <= $current_quantity){ // checks if there is still quantity for item
                    $food_ingredient_params = array(
                        $food_id,
                        $item->inventory_item_id,
                        $item->inventory_item_stock_id,
                        $item->unit_of_measure_id,
                        $item->inventory_item_name,
                        $item->quantity,
                        $item->unit_of_measure,
                        $item->unit_cost,
                        $create_user
                    );

                    $this->food_model->add_food_item($food_ingredient_params);
                    
                    $new_quantity = $current_quantity - $item->quantity;
                    
                    $this->inventory_item_model->update_item_stock_quantity(
                        $item->inventory_item_stock_id,
                        $new_quantity,
                        $create_user
                    );

                }
                else {
                    echo "Insufficient quantity for " . $item->inventory_item_name . ", entered quantity is " . $item->quantity . " while remaining quantity is " . $current_quantity . "<br/>";
                }
            }
        
            // adding images
            // check first if there are images uploaded
            if(!empty($_FILES['txt_food_image']['name'])) {
                $path = $_FILES['txt_food_image']['name'];
                $food_image = 'food_'.date('Ymdhis').".".pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './assets/images/foods/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name'] = $food_image; // set the name here
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('txt_food_image')) {
                    var_dump($this->upload->display_errors());
                }
                else {
                    $this->resize_image($config['upload_path'],$food_image);
                    $food_image_params = array(
                                            $food_id,
                                            $food_image,
                                            $create_user
                                        );
                    $this->food_model->add_food_image($food_image_params);
                } 
            }

            // update barcode
            if($barcode == null){
                $food_bcode_params = array(
                    format_food_id($food_id),
                    $create_user,
                    $food_id   
                );
                $this->food_model->update_food_barcode($food_bcode_params);
            }

            echo "Successfully added " . $food_name . "!";
        }
    }

    public function all_food_sales(){
        $content['main_content'] = 'food_inventory/all_food_sales';
        $this->load->view('includes/template',$content);
    }

    public function edit_food(){
        $list_of_uom = $this->food_model->get_unit_of_measure_list();
        $food_id = decode_string($this->uri->segment(3));
        $food_image_details = $this->food_model->get_latest_food_image($food_id);
        $food_image = "default_food_image.png";
        if(!empty($food_image_details)){
            $food_image = $food_image_details[0]->filename;
        }
        $index = 0;
        $data = array();
        foreach($list_of_uom as $row){
            $data[] = array(
                        "id" => $row->id,
                    //  "description" => $row->description,
                        "name" => $row->abbreviation
                      );
        }
        $content['uom_list'] = json_encode($data);
        $content['food_image'] = $food_image;
        $content['food_categories'] = $this->food_model->get_food_categories();
        $content['food_details'] = $this->food_model->get_food_details($food_id);
        $content['food_ingredients'] = $this->food_model->get_food_ingredients($food_id);
        $content['main_content'] = 'food_inventory/edit_food_view';
        $this->load->view('includes/template',$content);
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

    public function dt_all_inventory_list(){
        $this->load->library('dt_ssp');
        $transaction_state_list = $this->uri->segment(3);
        $start_date = $this->uri->segment(4);
        $end_date = $this->uri->segment(5);
        
        // DB table to use
        $table = 'inventory_v';
       
        // Table's primary key
        $primaryKey = 'food_id';
        $columns = array(
            array( 
                'db' => 'food_id',
                'dt' => 0,
                'formatter' => function($d,$row){
                    return "<input type='checkbox' value='".$d."' class='cb_food'/>";
                } 
            ),
            array( 
                'db' => 'food_id',
                'dt' => 1,
                'formatter' => function($d,$row){
                    return format_food_id($d);
                } 
            ),
            array( 'db' => 'food_name','dt' => 2 ),
            array( 'db' => 'category', 'dt' => 3 ),
            array( 'db' => 'unit_price','dt' => 4 ),
            array( 'db' => 'quantity', 'dt' => 5 ),
            array( 
                'db' => 'no_of_sales', 
                'dt' => 6,
                'formatter' => function($d,$row){
                    return number_format($d,0);
                }
            ),
            array( 'db' => 'status', 'dt' => 7),
            array( 'db' => 'date_created', 'dt' => 8),
            array( 
                'db' => 'food_id', 
                'dt' => 9,
                'formatter' => function($d,$row){
                    // if new = Open, Closed, Edit
                    // if open = closed
                    // if closed = disable
                    $status = $row['transaction_state_id'];
                    $current_quantity = $row['quantity'];
                    $food_id = $d;

                    $formatted_food_id = format_food_id($food_id);
                    $food_name = $row['food_name'];
                    $user_type_id = $this->session->userdata('user_type_id');
                    $btn_data = "";
                    if($status == 5){ // if status is new
                        $btn_data = '<div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" class="btn_update_status" data-id="'.$d.'" data-state_id="4">Open</a></li>
                                        <li><a href="cancel_food_item/'.encode_string($d).'">Cancel</a></li>      
                                      </ul>
                                    </div>';
                    /*
                        Edit Menu: Removed by Paul last November 23, 2016 8:59 PM
                        <li><a href="edit_food/'.encode_string($d).'">Edit</a></li>
                        Pwede nang wala ito kasi may cancellation naman, kung may mali si 
                        dietitian cancel na lang yung menu then create ng bago.
                    */
                    }
                    else if($status == 4) {  // if status is open
                        $enc_food_id = encode_string($d);
                        $no_of_sales = $row['no_of_sales'];
                        $btn_data = '<div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="'.base_url().'reports/cost_vs_sales_report/'.$enc_food_id.'" target="_blank">View Details</a></li>';
                                        /*if($user_type_id == 6 || $user_type_id == 3){
                                            if(in_array($row['category'],array('Breakfast','Lunch','Dinner','Rice'))) { */// Stock adjustment is only avaialble in these categories  
                                                $btn_data .= '<li><a href="#" data-food_name="'.$food_name.'" data-current_qty="'.$current_quantity.'" data-food_id="'.$food_id.'" data-formatted_food_id="'.$formatted_food_id.'" class="btn_adjust_qty">Stock Adjustment</a></li>';
                                         /*   }
                                        }*/
                                        
                        if($current_quantity > 0){
                            $btn_data .= ' <li><a href="close_food_item/'.$enc_food_id.'" data-id="'.$d.'">Close</a></li>';
                        }
                        else {
                             $btn_data .= ' <li><a href="#" class="btn_update_status" data-id="'.$d.'" data-state_id="3">Close</a></li>';
                        }
                       
                        if($no_of_sales == 0){
                            $btn_data .= ' <li><a href="cancel_food_item/'.$enc_food_id.'">Cancel</a></li> ';
                        }

                        $btn_data .= '</ul></div>';
                    }
                    else if($status == 3){ // if status is closed
                        $enc_food_id = encode_string($d);

                        $btn_data = '<div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu dropdown-menu-right">';
                                    if($user_type_id == 6 || $user_type_id == 3){
                                      $btn_data .= '<li><a href="#" class="btn_update_status" data-id="'.$d.'" data-state_id="4">Open</a></li>';  
                                    }
                                    $btn_data .= '<li><a href="'.base_url().'reports/cost_vs_sales_report/'.$enc_food_id.'" >View Details</a></li>      
                                                  </ul>
                                                </div>';
                    }
                    return $btn_data;
                }
            ),
            array( 'db' => 'transaction_state_id', 'dt' => 10)
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
        
        /*echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );*/

        $arr =  DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where);
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

    public function ajax_adjust_quantity(){
        $food_id = $this->input->post("food_id");
        $added_qty = $this->input->post("added_qty");
        $remarks = $this->input->post('remarks');
        $create_user = $this->session->userdata('user_id');
        $this->food_model->create_food_qty_adjustments(
                                $food_id,
                                $added_qty,
                                $remarks,
                                $create_user
                            );
        
    }

    public function ajax_update_food_details(){
        $food_id = $this->input->post('food_id');
        $food_name = $this->input->post('food_name');
        $category = $this->input->post('category');
        $barcode = $this->input->post('barcode_value');
        $update_user = $this->session->userdata('user_id');
        $params = array(
                    $food_name,
                    $category,
                    $barcode,
                    $update_user,
                    $food_id
                  );
        $this->food_model->update_food_details($params);
    }

    public function ajax_update_food_pic(){
        $update_user = $this->session->userdata('user_id');
        // check first if there are images uploaded
        if(!empty($_FILES['txt_food_image']['name'])) {
            $path = $_FILES['txt_food_image']['name'];
            $food_image = 'food_'.date('Ymdhis').".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']          = './assets/images/foods/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] = $food_image; // set the name here
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('txt_food_image')) {
                var_dump($this->upload->display_errors());
            }
            else {
                $this->resize_image($config['upload_path'],$food_image);
                $food_image_params = array(
                                        $this->input->post('food_id'),
                                        $food_image,
                                        $update_user
                                    );
                $this->food_model->add_food_image($food_image_params);
            } 
        }
    }

    public function ajax_update_food_item(){
        $food_id = $this->input->post('food_id');
        $item_id = $this->input->post('item_id');
        $item_name = $this->input->post('item_name');
        $amount = $this->input->post('amount');
        $unit_of_measure = $this->input->post('unit_of_measure');
        $unit_cost = $this->input->post('unit_cost');
        $total_cost = $this->input->post('total_cost');
        $mark_up_value = $this->input->post('mark_up_value');
        $cost_per_serving = $this->input->post('cost_per_serving');
        $mark_up_percentage = $this->input->post('mark_up_percentage');
        $update_user = $this->session->userdata('user_id');

        $food_item_params = array(
            $item_name,
            $amount,
            $unit_of_measure,
            $unit_cost,
            $update_user,
            $item_id
        );
        $this->food_model->update_food_item_details($food_item_params);

        $food_cost_param = array(
            $total_cost,
            $mark_up_value,
            $cost_per_serving,
            $mark_up_percentage,
            $update_user,
            $food_id
        );

        $this->food_model->update_food_cost_details($food_cost_param);
    }

    public function ajax_update_food_cost_details(){
        $food_id = $this->input->post('food_id');
        $mark_up_value = $this->input->post('mark_up_value');
        $mark_up_percentage = $this->input->post('mark_up_percentage');
        $cost_per_serving = $this->input->post('cost_per_serving');
        $update_user = $this->session->userdata('user_id');
        $total_cost = $this->input->post('total_cost');
        $food_cost_param = array(
            $total_cost,
            $mark_up_value,
            $cost_per_serving,
            $mark_up_percentage,
            $update_user,
            $food_id
        );
        $this->food_model->update_food_cost_details($food_cost_param);
    }

    public function ajax_update_food_price_details(){
        $food_id = $this->input->post('food_id');
        $cost_per_serving = $this->input->post('cost_per_serving');
        $dine_in_price = $this->input->post('dine_in_price');
        $total_dine_in_price = $this->input->post('total_dine_in_price');
        $quantity = $this->input->post('quantity');
        $update_user = $this->session->userdata('user_id');
        $params = array(
            $quantity,
            $quantity,
            $dine_in_price,
            $cost_per_serving,
            $total_dine_in_price,
            $update_user,
            $food_id
        );
        $this->food_model->update_food_price($params);
    }

    public function ajax_add_food_item(){
        $food_id = $this->input->post('food_id');
        $create_user = $this->session->userdata('user_id');
        $food_item = "New Item";
        $amount = 0;
        $unit_of_measure = "PC";
        $unit_cost = 0;
        $food_ingredient_params = array(
            $food_id,
            $food_item,
            $amount,
            $unit_of_measure,
            $unit_cost,
            $create_user
        );

        $item_id = $this->food_model->add_food_ingredient($food_ingredient_params);
        $food_ingredient_params[6] = $item_id;
        echo json_encode($food_ingredient_params);
    }

    public function ajax_delete_food_item(){
        $item_id = $this->input->post('item_id');
        $food_id = $this->input->post('food_id');
        $total_cost = $this->input->post('total_cost');
        $mark_up_value = $this->input->post('mark_up_value');
        $cost_per_serving = $this->input->post('cost_per_serving');
        $mark_up_percentage = $this->input->post('mark_up_percentage');
        $update_user = $this->session->userdata('user_id');
        $this->food_model->delete_food_item($item_id);
        $food_cost_param = array(
            $total_cost,
            $mark_up_value,
            $cost_per_serving,
            $mark_up_percentage,
            $update_user,
            $food_id
        );
        $this->food_model->update_food_cost_details($food_cost_param);
    }

    public function cancel_food_item(){
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
        $content['main_content'] = 'food_inventory/cancel_food_item';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    } 

    public function close_food_item(){
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
        $content['main_content'] = 'food_inventory/close_food_item';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    }  

    public function process_food_cancellation(){
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

        redirect('food_inventory/all_food_sales');

    }

    public function process_food_closing(){
        $food_id = $this->input->post('food_id');
        $reason = $this->input->post('reason');
        $this->load->model('inventory_item_model');
        $transaction_status_id = 3;
        $params = array(
                    $reason,
                    $create_user,
                    $transaction_status_id,
                    $food_id
                  );
        $this->food_model->close_food($params);
        redirect('food_inventory/all_food_sales');
    }


    public function ajax_get_foods_menu(){
        $category = $this->input->post('category');
        $foods_list = $this->food_model->get_foods_list($category);
        $meal_img_dir = $this->config->item('meal_img_dir');
        if(!empty($foods_list)){
            echo '<div class="row">';
            foreach($foods_list as $food){
                $food_image = $food->food_image != "" ? $food->food_image : "default_food_image.png";
                $food_js_id = "fd_" . $food->food_id;
                $food_js_qty_id = "fd_qty_" . $food->food_id;
                $item_price_qty_width = ($food->quantity > 0) ? "8" : "12";

                echo '<div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="box box-danger food-container"  id="'.$food_js_id.'">
                            <div class="box-body">
                                <div class="food-img-wrapper">
                                    <img src="'.$meal_img_dir . $food_image.'" class="img-responsive"/>
                                </div>
                                <div class="food-description">
                                    <div class="food-name-wrapper">
                                        <span class="food-name">'.strip_str_ellipsis($food->food_name,47).'</span><br/>   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-'.$item_price_qty_width.'">
                                            <span class="food-price text-danger">Price : '.$food->unit_price.'</span><br/>
                                            <span class="food-available-quantity text-muted">Quantity : 
                                                <span class="food-qty" data-orig_qty="'.$food->quantity.'" id="'.$food_js_qty_id.'">'.($food->quantity != 0 ? $food->quantity : "Out of stock!").'</span>
                                            </span>
                                        </div>
                                        ';
                            if($food->quantity > 0) {
                                echo '<div class="col-md-4">
                                            <button type="button" 
                                                    data-food_name="'.$food->food_name.'"
                                                    data-price="'.$food->unit_price.'"
                                                    data-qty="'.$food->quantity.'" 
                                                    data-orig_qty="'.$food->quantity.'" 
                                                    data-food_id="'.$food->food_id.'"
                                                    class="btn btn-primary btn-sm btn-add-to-order">Add to order</button>
                                            
                                        </div>';
                            }
                echo            '   </div>
                                </div>
                            </div>
                        </div>
                    </div>';
       
            } //  foreach($foods_list as $food){       
            echo "</div>";    
        } // if(!empty($foods_list)){
        else {
            echo "<h1 class='text-center'>No items found</h1>";
        }
    } // public function ajax_get_foods_menu(){

    public function print_food_barcode(){
        $food_ids = explode(',',$this->input->post('food_ids'));
        $food_details = $this->food_model->get_food_by_ids($food_ids);
       

       
        $this->load->library('pdf');
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Food Item Barcode');
        $pdf->SetSubject('Food Item Barcode');
        $pdf->SetKeywords('Food Item Barcode');
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
   //     $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Food Barcode" , "As of " . date_format(date_create(date('Y-m-d')),'F d, Y'));
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();


        // define barcode style
        $style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => true,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255), falsearray(0,0,0)
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );

        $style4 = array('L' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)),
                'T' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)),
                'B' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0))
                );// Rect

        $index = 1;

        $barcode_x = 25;
        $barcode_y = 15;
        $barcodes_per_page = 14;
        $ctr = 0;
        
        $food_count = count($food_details);
        $page = 1;


        $style6 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'color' => array(0, 0, 0));

        
        foreach($food_details as $food){
            $left_additional = 0;

           /* $vehicle_id = $unit[0];
            $cs_no = $unit[1];
            $plate_no = $unit[2];
            $assignee_name = $unit[3];
            $classification = $unit[4];
            $model = $unit[5];

            $plate_no = ($plate_no != "" ? $plate_no . " - " : "");

            $label = $plate_no . $cs_no;
            $left_additional = 0;
            if(empty($plate_no)){
                $left_additional = 25;
            }
            else {
                $left_additional = 15;
            }
            $assignee = "";
            if($classification == "Carplan"){
                $assignee = Format::makeUpperCase($assignee_name);
                $assignee = str_replace('Iv','IV',$assignee);
            }
            else {
                $assignee = $classification;
            }

            $assignee_length = strlen($assignee);
            $add_space = 0;
            if($assignee_length > 10){
                $add_space = $assignee_length/4;
            }
            $space_left = (30 - $assignee_length + $add_space);*/

            $x = $pdf->GetX();
            $y = $pdf->GetY();

            if($index <= 2){
                //$pdf->writeHTMLCell(0, 0, $barcode_x + $space_left, $barcode_y -5, '<span>' . $assignee  . '</span>', 0, 0, false, true, 'B',false);
                //$pdf->writeHTMLCell(0, 0, $barcode_x, $barcode_y -5, '<span>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span>', 0, 0, false, true, 'B',false);

            //  $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
            //  $pdf->RoundedRect(50, 255, 40, 30, 6.50, '1000');
            //  $pdf->RoundedRect(95, 255, 40, 30, 10.0, '1111', null, $style6);
            //  $pdf->RoundedRect(140, 255, 40, 30, 8.0, '0101', 'DF', $style6, array(200, 200, 200));
               // $pdf->RoundedRect($x + 9.5, $y - 13, 75, 26, 3.50, '1111', 'DF',$style6,array(255,255,255),array(255,255,255));
                $pdf->writeHTMLCell(0, 0, $barcode_x + $left_additional, $barcode_y + 18, '<span>' . $food->food_name . '</span>', 0, 0, false, true, 'B',false);

                $pdf->write1DBarcode($food->barcode_value, 'C39', $barcode_x, $barcode_y, '', 18, 0.3, $style, 'M');
                $pdf->SetXY($x,$y);
                //$pdf->setCellPaddings(0,10,50,0);
                $pdf->Cell(94.5, 35, '', 1, 0, 'C', FALSE, '', 0, FALSE, 'C', 'B');
                
                $barcode_x+= 95;    
            }
            else {
                $barcode_x = 25;
                $barcode_y += 35;
                //$pdf->writeHTMLCell(0, 0, $barcode_x + $space_left, $barcode_y - 5, '<span>' . $assignee . '</span>', 0, 0, false, true, 'B',false);
                //$pdf->RoundedRect($barcode_x - 6, $barcode_y - 3, 75, 26, 3.50, '1111', 'DF',$style6,array(255,255,255),array(255,255,255));
                $pdf->writeHTMLCell(100, 50, $barcode_x + $left_additional, $barcode_y + 18, '<span>' . $food->food_name . '</span>', 0, 0, false, true, 'M',true);
                $pdf->write1DBarcode($food->barcode_value, 'C39', $barcode_x, ($barcode_y), '', 18, 0.3, $style, 'M');       
                $pdf->Ln();
                $pdf->SetY($barcode_y+10);
                //$pdf->setCellPaddings(0,10,50,0);
                $pdf->Cell(94.5, 35, '', 1, 0, 'C', FALSE, '', 0, FALSE, 'C', 'B');
            
                $barcode_x += 95;
                //$barcode_y += 2.5;
                $index = 1;
            }

            $ctr++;
            $index++;
            if($ctr == $barcodes_per_page){
                $barcode_x = 25;
                $barcode_y = 15;
                if($page < ($food_count/$barcodes_per_page) ){
                    $pdf->AddPage();
                }
                $ctr = 0;
                $index = 1;
                $page++;
            }
            

        }

        // set some text to print
       // $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('food_barcode-'.date('YmdHis').'.pdf', 'I');

    }

    public function ajax_update_food_barcode(){
        $food_id = $this->input->post('food_id');
        $new_barcode = $this->input->post('new_barcode');
        $is_barcode_exist = $this->food_model->check_food_barcode($new_barcode);
        if($is_barcode_exist){
            echo 'exists';
        }
        else {
            $update_user = $this->session->userdata('user_id');
            $params = array($new_barcode,$update_user,$food_id);
            $this->food_model->update_food_barcode($params);

            echo "Barcode sucessfully updated!";
        }
    }

}   