<?php

class Transaction extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('food_model');
        $this->load->model('transaction_model');
        $this->load->model('person_model');
        $this->load->helper('date_formatter');
        $this->load->helper('encryption');
    }

    public function index(){
    	//$this->employee();
    }

    public function new_transaction(){
        $this->load->helper('string_helper');
        $create_user = $this->session->userdata('user_id');
        $customer_list = $this->transaction_model->get_customers_category();
        $food_categories = $this->food_model->categories_for_order();
        $temp_transaction_no = $this->transaction_model->insert_temp_transaction_header($create_user);
    	$content['main_content'] = "transactions/new_transaction";
        $content['food_categories'] = $food_categories;
        $content['customer_list'] = $customer_list;
        $content['default_customer'] = 1; // id of Employee type of person
        $content['temp_transaction_no'] = $temp_transaction_no; // id of Employee type of person
    	$this->load->view('includes/template',$content);
    }

    public function new_transaction_v2(){
        $this->load->helper('string_helper');
        $customer_list = $this->transaction_model->get_customers_category();
        $foods_list = $this->food_model->get_foods_list();
        $content['main_content'] = "transactions/new_transaction_v2";
        $content['meal_img_dir'] = $this->config->item('meal_img_dir');
        $content['foods_list'] = $foods_list;
        $content['customer_list'] = $customer_list;
        $content['default_customer'] = 1; // id of Employee type of person
        $this->load->view('includes/template',$content);
    }

    public function ajax_get_applicable_payment_modes(){
        $person_type_id = $this->input->post('person_type_id');
        $payment_modes = $this->transaction_model->get_applicable_payment_modes($person_type_id);
        $data = array();
        foreach($payment_modes as $mode){
            $data[] = array(
                "applicable_payment_mode_id" => $mode->id,
                "payment_mode_id" => $mode->payment_mode_id,
                "mode_of_payment" => $mode->mode_of_payment,
                "is_default_payment_mode" => $mode->is_default_payment_mode
           );
        }
        echo json_encode($data);
    }    

    public function ajax_get_employee_details(){       
    
        $person_details = $this->person_model->get_person_details_by_category(
                            "barcode_value",
                            $this->input->post('barcode_no'),
                            $this->input->post('customer_type')
                          );
        if(!empty($person_details)){
            echo json_encode($person_details);
        }
        else {
            echo "invalid";
        }
        
    }

    public function ajax_add_new_transaction(){
        // error flag
        $is_error = false;

        // message
        $message = "";

        // customer type
        $customer_type = $this->input->post('customer_type');

        // employee or stockholder
        $person_id = $this->input->post('person_id');
        $employee_no = $this->input->post('employee_no');
        $barcode_no = $this->input->post('barcode_no');
        $meal_allowance_id = $this->input->post('meal_allowance_id');

        // guest, patient and employee
        $customer_name = $this->input->post('customer_name');

        // patient
        $patient_ref_no = $this->input->post('patient_ref_no');
        $room_no = $this->input->post('room_no');
        $room_type = $this->input->post('room_type');
       
        // particulars
        $amount_tendered = $this->input->post('amount_tendered');
        $remarks = $this->input->post('remarks');
        $grand_total = $this->input->post('grand_total');

        $orders_list = $this->input->post('orders_list');
        $payments_list = $this->input->post('payments_list');
        $discount_percent = $this->input->post('discount_percent');
        $customer_id_no = $this->input->post('customer_id_no');
        $temp_transaction_id = $this->input->post('temp_transaction_id');

        $create_user = $this->session->userdata('user_id');

        // if stockholder, check first for the meal allowance if still sufficient
        if($customer_type == 8){
            foreach($payments_list as $payment){
                $payment_mode_id = $payment[0];
                $amount = $payment[1];
                // if payment mode is meal allowance, deduct to employees meal allowance
                if($payment_mode_id == 1) {

                    if($meal_allowance_id != ""){
                        $current_meal_allowance_details = $this->person_model->get_employee_meal_allowance($person_id,$meal_allowance_id);
                        $deducted_max_allowance_daily = 0;
                        // employee or stockholder meal allowance
                        $current_meal_allowance = $current_meal_allowance_details[0]->remaining_amount;
                        // stockholder daily allowance
                        $daily_allowance = $current_meal_allowance_details[0]->max_allowance_daily;
                      
                        if($current_meal_allowance > 0 && $daily_allowance > 0){
                            if($amount > $daily_allowance){
                                $message .=  "Insufficient Balance : PHP " . $daily_allowance . " remaining." ;
                                $is_error = true;
                            }
                        }
                        else {
                            $is_error = true;
                            $message .=  "Insufficient Balance : PHP " . $daily_allowance . " remaining." ;
                        }
                    }
                    else {
                        $is_error = true;
                        $message .=  "Insufficient Balance : PHP 0.00 remaining." ;
                    }
                }
            }
        }
        else if($customer_type == 1){ // if employee, check if meal allowance is sufficient in the order amount
            foreach($payments_list as $payment){
                $payment_mode_id = $payment[0];
                $amount = $payment[1];
                // if payment mode is meal allowance, deduct to employees meal allowance
                if($payment_mode_id == 1) {
                    if($meal_allowance_id != ""){
                        $current_meal_allowance_details = $this->person_model->get_employee_meal_allowance($person_id,$meal_allowance_id);
                        $current_meal_allowance = $current_meal_allowance_details[0]->remaining_amount;
                      
                        if($current_meal_allowance > 0){
                            if($amount > $current_meal_allowance){
                                $message .=  "Insufficient Balance : PHP " . $current_meal_allowance . " remaining." ;
                                $is_error = true;
                            }
                        }
                        else {
                            $is_error = true;
                            $message .=  "Insufficient Balance : PHP " . $current_meal_allowance . " remaining." ;
                        }
                    }
                    else {
                        $is_error = true;
                        $message .=  "Insufficient Balance : PHP 0.00 remaining." ;
                    }
                }
            }
        }
      
        if(!$is_error){ // if there is no errors
            // insert new transaction header
            $transaction_header_params = array(
                                        $customer_type,
                                        $person_id,
                                        $employee_no,
                                        $barcode_no,
                                        $customer_name,
                                        $room_no,
                                        $room_type,
                                        $patient_ref_no,
                                        $amount_tendered,
                                        $grand_total,
                                        $discount_percent,
                                        $customer_id_no,
                                        $remarks,
                                        $meal_allowance_id,
                                        $create_user
                                    );
            $transaction_header_id = $this->transaction_model->add_transaction_header($transaction_header_params);
            $this->transaction_model->delete_temp_transaction_header($temp_transaction_id);
            // insert transaction lines
            foreach($orders_list as $ordered_item){
                $food_id = $ordered_item[0];
                $selling_price = $ordered_item[1];
                $original_price = $ordered_item[1];
                $quantity = $ordered_item[2];
                $current_food_quantity_details = $this->food_model->get_current_food_quantity($food_id);
                $current_quantity = $current_food_quantity_details[0]->quantity;
                $new_food_quantity = $current_quantity - $quantity;
               /*
                12-5-2016:
                Quantities are not updated because upon entering of orders, it is already updated
                $food_quantity_params = array(
                                            $new_food_quantity,
                                            $create_user,
                                            $food_id
                                        );
                $this->food_model->update_food_quantity($food_quantity_params);*/
                $transaction_line_params = array(
                                            $transaction_header_id,
                                            $food_id,
                                            $selling_price,
                                            $original_price,
                                            $quantity,
                                            $create_user
                                        );
                $transaction_line_id = $this->transaction_model->add_transaction_lines($transaction_line_params);
                $this->transaction_model->delete_temp_transaction_lines($temp_transaction_id,$food_id);
            }

            // insert payment modes
            foreach($payments_list as $payment){
                $payment_mode_id = $payment[0];
                $amount = $payment[1];
                $payment_params = array(
                                    $transaction_header_id,
                                    $payment_mode_id,
                                    $amount,
                                    $meal_allowance_id
                                  );
                $payment_txn_id = $this->transaction_model->add_transaction_payments($payment_params);
                // if payment mode is meal allowance, deduct to employees meal allowance
                if($payment_mode_id == 1) {
                    $current_meal_allowance_details = $this->person_model->get_employee_meal_allowance($person_id,$meal_allowance_id);
                    $deducted_max_allowance_daily = 0;
                    $ma_weekly_claims_count = 0;
                    // employee or stockholder meal allowance
                    $remaining_amount = $current_meal_allowance_details[0]->remaining_amount;
                    $remaining_amount = $remaining_amount - $amount;

                    if($customer_type == 8){ // if stockholder only
                        // max allowance daily
                        $current_max_allowance_daily = $current_meal_allowance_details[0]->max_allowance_daily;
                        $deducted_max_allowance_daily = $current_max_allowance_daily - $amount;
                        $ma_weekly_claims_count = $current_meal_allowance_details[0]->ma_weekly_claims_count;
                        // weekly claims count
                        if($deducted_max_allowance_daily == 0){
                            $ma_weekly_claims_count--;
                        }
                    }
                   
                   $update_meal_allowance_params = array(
                        $remaining_amount,
                        $deducted_max_allowance_daily,
                        $ma_weekly_claims_count,
                        $create_user,
                        $meal_allowance_id
                    );

                    $this->person_model->update_employee_meal_allowance($update_meal_allowance_params);
                }
                // if payment mode is salary deduction, add employees deduction
                else if($payment_mode_id == 5){
                    $current_salary_deduction = $this->person_model->get_current_salary_deduction($person_id);
                    $new_salary_deduction = $current_salary_deduction + $amount;
                    $update_salary_deduction_params = array(
                        $new_salary_deduction,
                        $create_user,
                        $person_id
                    );
                    $this->person_model->update_salary_deduction($update_salary_deduction_params);
                }
            }

            $message = "Transaction has been succesfully saved.";
        }
        
        // message to user
        echo json_encode(array(
                            "message" => $message,
                            "transaction_status" => $is_error
                         )
            );
    }

    public function get_sales_report($from,$to){
        $sql = "SELECT tl.id transaction_no,
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
                WHERE th.transaction_status = 1
                      AND th.date_created BETWEEN ? AND ?";
        $query = $this->db->query($sql,array($from,$to));
        return $query->result();
    }

    public function all_transactions(){
        $pending_transactions_ctr = $this->transaction_model->count_pending_transactions();
        $content['main_content'] = "transactions/all_transactions";
        $content['pending_ctr'] = $pending_transactions_ctr;
        $this->load->view("includes/template",$content);
    }

    public function dt_all_transactions(){
        $this->load->library('dt_ssp');
        $this->load->helper('encryption');
        $start_date = $this->uri->segment(3);
        $end_date = $this->uri->segment(4);
        $status_id = $this->uri->segment(5);
        
        // DB table to use
        $table = 'transactions_v';
        // Table's primary key
        $primaryKey = 'transaction_id';
        $columns = array(
            array( 'db' => 'transaction_no','dt' => 0 ),
            array( 'db' => 'customer_type','dt' => 1 ),
            array( 'db' => 'customer_name', 'dt' => 2 ),
            array( 
                'db' => 'total_amount', 
                'dt' => 3,
                'formatter' => function($d,$row){
                    return number_format($d,0);
                }
            ),
            array( 'db' => 'transaction_date', 'dt' => 4),
            array( 'db' => 'status', 'dt' => 5),
            array( 
                'db' => 'transaction_id',
                'dt' => 6,
                'formatter' => function($d,$row){
                    $user_type_id = $this->session->userdata('user_type_id');
                    $btn_data = '<div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="view/'.encode_string($d).'">View</a>'.'</li>';
                                    if($row[5] == 'Completed' && ($user_type_id == 6 || $user_type_id == 3) ){
                                        $btn_data .= '<li><a href="cancel/'.encode_string($d).'">Cancel</a></li>';     
                                    }
                    $btn_data .= '                
                                    </ul>
                                </div>';
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

        $where = "DATE(date_created) BETWEEN '".$start_date."' AND '".$end_date."' AND transaction_status = " . $status_id;
    
        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }

    public function cancel(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $transaction_id = decode_string($this->uri->segment(3));
        $transaction_header_details = $this->transaction_model->get_transaction_header($transaction_id);
        $transaction_line_details = $this->transaction_model->get_transaction_lines($transaction_id);
        $payment_details = $this->transaction_model->get_payment_details($transaction_id);
        $content['transaction_header_details'] = $transaction_header_details;
        $content['transaction_line_details'] = $transaction_line_details;
        $content['payment_details'] = $payment_details;
        $content['main_content'] = "transactions/cancel_transaction";
        $this->load->view("includes/template",$content);
    }

    public function ajax_cancel_transaction(){
        $transaction_id = $this->input->post('transaction_id');
        $reason = $this->input->post('reason');
        $cancel_user = $this->session->userdata('user_id');
        $person_id = $this->input->post('person_id');
        $customer_type_id = $this->input->post('customer_type_id');
        $this->load->model('stockholder_model');
        // cancel the transaction
        $cancel_transaction_params = array(
            $reason,
            $cancel_user,
            $transaction_id
        );
        $this->transaction_model->cancel_transaction($cancel_transaction_params);

        // return items to inventory
        $transaction_lines = $this->transaction_model->get_transaction_lines($transaction_id);
        foreach($transaction_lines as $row){
            
            // adjust food quantity
            $current_food_quantity_details = $this->food_model->get_current_food_quantity($row->food_id);
            $current_quantity = $current_food_quantity_details[0]->quantity;
            $new_food_quantity = $current_quantity + $row->quantity;
            $food_quantity_params = array(
                $new_food_quantity,
                $cancel_user,
                $row->food_id
            );
            $this->food_model->update_food_quantity($food_quantity_params);

            // insert quantity adjustment logs
            $food_returns_params = array(
                $transaction_id,
                $row->id,
                $row->food_id,
                $row->quantity,
                $cancel_user
            );
            $this->food_model->insert_food_quantity_returns($food_returns_params);
        }
       
        // return customer meal allowance if stockholder or employee
        // get payment lines
        $payment_details = $this->transaction_model->get_payment_details($transaction_id);

        if($customer_type_id == 1 || $customer_type_id == 8){
            foreach($payment_details as $row){
                if($row->payment_mode_id == 1){ // if payment mode is meal allowance
                    $current_meal_allowance = $this->person_model->get_employee_meal_allowance($person_id,$row->meal_allowance_id);
                    $total_meal_allowance = ($current_meal_allowance[0]->remaining_amount + $row->amount);
                    // update employee meal allowance 
                    if($customer_type_id == 1){
                        $update_meal_allowance_params = array(  
                            $total_meal_allowance,
                            0,
                            0,
                            $cancel_user,
                            $row->meal_allowance_id
                        );
                    }
                    else if($customer_type_id == 8){
                        // increase claims count due to error
                        $new_weekly_claims_count = $current_meal_allowance[0]->ma_weekly_claims_count + 1;
                         $update_meal_allowance_params = array(  
                            $total_meal_allowance,
                            $current_meal_allowance[0]->max_allowance_daily + $row->amount,
                            $new_weekly_claims_count,
                            $cancel_user,
                            $row->meal_allowance_id
                        );
                    }
                    $this->person_model->update_employee_meal_allowance($update_meal_allowance_params);
                    // insert meal allowance return logs
                    $meal_allowance_returns_params = array(
                        $transaction_id,
                        $person_id,
                        $row->meal_allowance_id,
                        $row->amount,
                        $cancel_user
                    );
                    $this->person_model->insert_meal_allowance_returns($meal_allowance_returns_params);
                } // if($row->payment_mode_id == 1){ 
                else if($row->payment_mode_id == 5){ // if salary deduction
                    $current_salary_deduction = $this->person_model->get_current_salary_deduction($person_id);
                    $current_salary_deduction = $current_salary_deduction - $row->amount;
                    $sd_update_params = array(
                        $current_salary_deduction,
                        $cancel_user,
                        $person_id
                    );
                    $this->person_model->update_salary_deduction($sd_update_params);

                }
            } // foreach($payment_details as $row){
        } // if($customer_type_id == 1 || $customer_type_id == 8){
    }

    public function view(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $transaction_id = decode_string($this->uri->segment(3));
        $transaction_header_details = $this->transaction_model->get_transaction_header($transaction_id);
        $transaction_line_details = $this->transaction_model->get_transaction_lines($transaction_id);
        $payment_details = $this->transaction_model->get_payment_details($transaction_id);
        $content['transaction_header_details'] = $transaction_header_details;
        $content['transaction_line_details'] = $transaction_line_details;
        $content['payment_details'] = $payment_details;
        $content['main_content'] = "transactions/view_transaction";
        $this->load->view("includes/template",$content);
    }

    public function ajax_get_food_details_by_barcode(){
        $item_barcode = $this->input->post('item_barcode');
        $food_details = $this->food_model->get_food_details_by_barcode($item_barcode);
        if(!empty($food_details[0])){
            echo json_encode($food_details);
        }
        else {
            echo 'error';
        }
    }

    public function ajax_update_food_quantity(){
        $food_id = $this->input->post('food_id');
        $quantity = $this->input->post('quantity');
        $temp_transaction_id = $this->input->post('temp_transaction_id');
        $create_user = $this->session->userdata('user_id');
        $transaction_params = array(
            $temp_transaction_id,
            $food_id,
            $quantity
        );
        $this->transaction_model->insert_temp_transaction_lines($transaction_params);
        $current_food_quantity_details = $this->food_model->get_current_food_quantity($food_id);
        $current_quantity = $current_food_quantity_details[0]->quantity;
        $new_food_quantity = $current_quantity - $quantity;
        $food_quantity_params = array(
            $new_food_quantity,
            $create_user,
            $food_id
        );
        $this->food_model->update_food_quantity($food_quantity_params);
    } 

    public function ajax_remove_temp_transaction_line(){
        $food_id = $this->input->post('food_id');
        $quantity = $this->input->post('quantity');
        $temp_transaction_id = $this->input->post('temp_transaction_id');
        $create_user = $this->session->userdata('user_id');
        $this->transaction_model->delete_temp_transaction_lines(
            $temp_transaction_id,
            $food_id
        );
        $current_food_quantity_details = $this->food_model->get_current_food_quantity($food_id);
        $current_quantity = $current_food_quantity_details[0]->quantity;
        $new_food_quantity = $current_quantity + $quantity;
        $food_quantity_params = array(
            $new_food_quantity,
            $create_user,
            $food_id
        );
        $this->food_model->update_food_quantity($food_quantity_params);
    } 

    public function ajax_create_transaction_session(){
        $create_user = $this->session->userdata('user_id');
        $temp_transaction_no = $this->transaction_model->insert_temp_transaction_header($create_user);
        echo $temp_transaction_no;
    }
    
    public function dt_pending_transactions(){
          $this->load->helper('string');
        $this->load->library('dt_ssp');
        $this->load->helper('encryption');
        // DB table to use
        $table = 'pending_transactions_v';
        // Table's primary key
        $primaryKey = 'line_id';
        $columns = array(
            array( 'db' => 'transaction_no','dt' => 0 ),
            array( 'db' => 'food_no','dt' => 1 ),
            array( 'db' => 'food_name','dt' => 2 ),
            array( 'db' => 'quantity', 'dt' => 3 ),
            array( 'db' => 'transacted_by', 'dt' => 4 ),
            array( 'db' => 'date_created', 'dt' => 5),
            array( 
                'db' => 'line_id',
                'dt' => 6,
                'formatter' => function($d,$row){
                    $food_id = $row['food_id'];
                    $header_id = $row['header_id'];
                    $quantity = $row['quantity'];
                    return "<a href='#' class='btn_return_to_inventory' data-food_id='".$food_id."' data-header_id='".$header_id."' data-quantity='".$quantity."'>Return to Inventory</a>";
                }
            ),
            array( 'db' => 'food_id', 'dt' => 7),
            array( 'db' => 'header_id', 'dt' => 8)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
     
        $arr = DT_ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }  

    public function ajax_count_pending_transactions(){
        $ctr = $this->transaction_model->count_pending_transactions();
        echo $ctr;
    }  

    public function ajax_check_item_exist(){
        $header_id = $this->input->post('temp_transaction_id');
        $food_id = $this->input->post('food_id');
        $ctr = $this->transaction_model->count_item_in_orders($food_id,$header_id);
        $data = array('ctr' => $ctr);
        echo json_encode($data);
    }

}