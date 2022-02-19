<?php
class Employee extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('encryption');
        $this->load->model('person_model');
        $this->load->helper('date_formatter');
	}

    public function index(){
       /* $content['main_content'] = 'employees/all_employees_view';
        $this->load->view('includes/template',$content);*/
        $status_id = 1;
        if($this->input->post('status_id')){
            $status_id = $this->input->post('status_id');
        }
        $employees_list = $this->person_model->get_employees_list($status_id);

        $content['main_content'] = 'employees/all_employees_view';
        $content['employees_list'] = $employees_list;
        $content['status_id'] = $status_id;
        $this->load->view('includes/template',$content);
    }

    public function new_employee(){
        $person_type_id = decode_string($this->uri->segment(3));
        if($this->session->userdata('add_employee_type') == null){
            $this->session->set_userdata('add_employee_type', $person_type_id);
        }

        if($this->session->userdata('success_flag')){
           if($person_type_id == false){
                $user_type = $this->session->userdata('user_type_id');
                if($user_type == 10 || $user_type == 3){
                    redirect('employee');
                }
                else if($user_type == 6){
                    redirect('employee/canteen_employees');
                }
            } 
        }
        
        $this->load->model('system_model');
        $content['main_content'] = 'employees/add_employee_view';
        $departments = $this->system_model->get_departments();
        $content['departments'] = $departments;
        $content['person_type_id'] = $person_type_id;
        $this->load->view('includes/template',$content);
    }

    public function check_employee_no(){
        return $this->person_model->check_employee_no_existence($this->input->post('employee_no'));
    }

    public function validate_employee_no($employee_no){
        return $this->person_model->check_employee_no_existence($employee_no);
    }

    public function validate_barcode_no($barcode_no){
        return $this->person_model->check_barcode_no_existence($barcode_no);
    }

    public function save_new_employee(){
        $person_image = "default.jpg"; // default image would be used if no image is uploaded
        if(!empty($_FILES['person_image']['name'])) {
            $path = $_FILES['person_image']['name'];
            $person_image = $this->input->post('employee_no').".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']          = './assets/images/person_images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name'] = $person_image; // set the name here
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('person_image')) {
                var_dump($this->upload->display_errors());
            }
            else {
                $this->resize_image($config['upload_path'],$person_image);
            }
        }
       
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'employee_no',
                'label' => 'Employee No',
                'rules' => 'trim|required|callback_check_employee_no',
                'errors' => array(
                        'check_employee_no' => 'Employee No. already exists.',
                )
            ),
	    array(
                'field' => 'barcode_no',
                'label' => 'Barcode No',
                'rules' => 'trim|required|callback_validate_barcode_no',
                'errors' => array(
                        'validate_barcode_no' => 'Barcode No. already exists.',
                )
            ),
            array(
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ),
        /*    array(
                'field' => 'middle_name',
                'label' => 'Middle Name',
                'rules' => 'trim|required'
            ),*/
            array(
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'contact_no',
                'label' => 'Contact No',
                'rules' => 'trim|required'
               
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required'   
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_employee(); // load new employee view and display errors
        }
        else {
            $this->load->model('user_model');
         
            $this->load->model('system_model');
            $meal_allowance_details = $this->system_model->get_system_config(1);
         
            $create_user = $this->session->userdata('user_id');
            $user_id = $this->user_model->add_user($this->input->post('employee_no'),$this->input->post('employee_no'));
          //  $person_type_id = $this->input->post('person_type_id'); // default ID of employee type in persons table
            $person_type_id = $this->session->userdata('add_employee_type');
            $params = array(
                $user_id,
                $person_type_id,
                $this->input->post('employee_no'),
                $this->input->post('first_name'),
                $this->input->post('middle_name'),
                $this->input->post('last_name'),
                $this->input->post('address'),
                $this->input->post('contact_no'),
                $person_image,
                $meal_allowance_details[0]->config_value,
                $this->input->post('barcode_no'),
                $this->input->post('department'),
                $create_user
            );
            $this->person_model->add_person($params);
            // redirect to form and show successful operation
            $this->session->set_flashdata('success_flag', TRUE);
            redirect(current_url());
        }
    }

    public function get_employees_list(){
        $this->load->library('dt_ssp');
        $this->load->helper('string');
        $person_state_id = $this->uri->segment(3);
        // DB table to use
        $table = 'persons_v';
        // Table's primary key
        $primaryKey = 'person_id';
        $columns = array(
            array( 'db' => 'employee_no', 'dt' => 'employee_no' ),
            array( 'db' => 'person_name',  'dt' => 'person_name' ),
            array( 'db' => 'department_name',  'dt' => 'department_name' ),
            array( 
                'db' => 'alloted_amount',  
                'dt' => 'alloted_amount',
                'formatter' => function( $d, $row){
                    return $d != "" ? $d : 0;
                }
            ),
            array( 
                'db' => 'remaining_amount',  
                'dt' => 'remaining_amount',
                'formatter' => function( $d, $row){
                    return $d != "" ? $d : 0;
                }
            ),
            array( 'db' => 'ma_validity_date', 'dt' => 'ma_validity_date'),
            array( 
                'db' => 'person_id',   
                'dt' => 'person_id',
                'formatter' => function( $d, $row ) {
                    return "<a href='employee/edit/" . encode_string($d) ."'><i class='fa fa-edit fa-1x'></i></a>";
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
        $where = "person_type_id = 1 AND person_state_id = " . $person_state_id;
        $arr = DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where );
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

    public function edit(){
        $this->load->model('system_model');
        $departments = $this->system_model->get_departments();
        $list_of_state = $this->system_model->get_person_state();
        $employee_id = decode_string($this->uri->segment(3));
        $employee_details = $this->person_model->get_person_details($employee_id);
        $content['main_content'] = 'employees/edit_employee_view';
        $content['employee_details'] = $employee_details[0];
        $content['departments'] = $departments;
        $content['list_of_state'] = $list_of_state;
        $this->load->view('includes/template',$content);
    }

    public function update_employee_details(){
        $person_image = $this->input->post('old_person_image'); // default would be old picture if no picture is uploaded
        if(!empty($_FILES['person_image']['name'])) {
        
            $path = $_FILES['person_image']['name'];
            $person_image = $this->input->post('employee_no').".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']          = './assets/images/person_images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 3000;
           // $config['max_width']            = 1024;
          //  $config['max_height']           = 768;
            $config['file_name'] = $person_image; // set the name here
            //unlink($config['upload_path'])
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('person_image')) {
                var_dump($this->upload->display_errors());
            }
            else {
                $this->resize_image($config['upload_path'],$person_image);
            }
        }

        $update_user = $this->session->userdata('user_id');
        $params = array(
            $this->input->post('first_name'),
            $this->input->post('middle_name'),
            $this->input->post('last_name'),
            $this->input->post('address'),
            $this->input->post('contact_no'),
            $person_image,
            $update_user,
            $this->input->post('department'),
            $this->input->post('state'),
            $this->input->post('employee_id')
        );
        $this->person_model->update_person_details($params);
        $this->load->helper('encryption');
        // redirect to form and show successful operation
        $this->session->set_flashdata('success_flag', TRUE);
        redirect('employee/edit/' . encode_string($this->input->post('employee_id')));
    }

    public function meal_allowance(){
        $this->load->model('system_model');
        $departments_list = $this->system_model->get_departments();
        $content['departments'] = $departments_list;
        $content['main_content'] = 'employees/meal_allowance_view';
        $content['message_subject'] = null;
        $content['message_body'] = '<p class="text-center text-muted">Click on the <strong>Upload file</strong> button to start reloading meal allowances.</p>';
        $content['flag'] = null; 
        $this->load->view('includes/template',$content);
    }

    public function read_meal_allowance_xls(){

        if(!empty($_FILES['ma_xls']['name'])) { 
            $allowed =  array('xls','xlsx');
            $filename = $_FILES['ma_xls']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                $content['flag'] = "error";
                $content['message_subject'] = "Invalid file format! <strong>" . $filename . "</strong> is not an excel file.";
                $content['message_body'] = '<p class="text-center text-muted">Please upload a valid file format to proceed.</p>';
            }
            else {
                $path = $_FILES['ma_xls']['name'];
                $xls_file = "ma_reload-" . date("YmdHis") . "." . pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './files/';
                $config['allowed_types']        = 'xls|xlsx';
                $config['file_name'] = $xls_file; // set the name here
                //unlink($config['upload_path'])
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('ma_xls')) {
                    var_dump($this->upload->display_errors());
                }
              
                $employee_recordset = $this->person_model->employees_recordset_array();
                $current_user = $this->session->userdata('user_id');

                $this->load->library('excel');
                try {
                    $xls_file = './files/' . $xls_file;
                    $inputFileType = PHPExcel_IOFactory::identify($xls_file);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($xls_file);
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }

                //  Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                //   <th>Deduction</th>
                $content['message_body'] = "<table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th>Employee No</th>
                                                        <th>Days Worked</th>
                                                        <th>Current Meal Allowance</th>
                                                        <th>Added Meal Allowance</th>
                                                        <th>Total</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                //  Loop through each row of the worksheet in turn
                for ($row = 2; $row <= $highestRow; $row++){  // start from 2 to avoid header
                    //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                    NULL,
                                                    TRUE,
                                                    FALSE);

                    // xls details
                    $employee_no = $rowData[0][0];
                    $no_of_days = $rowData[0][1];
                  //  $deduction = $rowData[0][2];

                    $employee_no = (string)$employee_no;
                    if (array_key_exists($employee_no, $employee_recordset)) { // check if employee exists
                        $employee_id = $employee_recordset[$employee_no]['id'];
                        $current_meal_allowance = $employee_recordset[$employee_no]['meal_allowance'];
                        $added_to_meal_allowance = $employee_recordset[$employee_no]['meal_allowance_rate'] * $no_of_days;
                        // if pumapatong yung allowance
                        //$total_meal_allowance = ($current_meal_allowance + $added_to_meal_allowance);
                        // if hindi pumapatong
                        $total_meal_allowance =  $added_to_meal_allowance;
                        // update employee meal allowance 
                        $update_meal_allowance_params = array( 
                            $total_meal_allowance,
                            0,
                            0,
                            $current_user,
                            $employee_id
                        );

                        $update_meal_allowance_query = $this->person_model->update_employee_meal_allowance($update_meal_allowance_params);
                        // insert record to meal_allowance_reload_logs
                        $params = array(
                                    $employee_id,
                                    $employee_no,
                                    $no_of_days,
                                    $employee_recordset[$employee_no]['meal_allowance_rate'],
                                    $current_user
                                  );
                        $insert_log = $this->person_model->insert_meal_allowance_logs($params);
                        if($update_meal_allowance_query && $insert_log){
                            //  <td>'.$deduction.'</td>
                        $content['message_body'] .= '<tr>
                                                        <td>'.$employee_no.'</td>
                                                        <td>'.$no_of_days.'</td>
                                                        <td>'.$current_meal_allowance.'</td>
                                                        <td>'.$added_to_meal_allowance.'</td>
                                                       
                                                        <td>'.$total_meal_allowance.'</td>
                                                        <td>Success</td>
                                                     </tr>';
                        }
                        else {
                        $content['message_body'] .= '<tr class="ma-tbl-row-error">
                                                        <td colspan="7">Error DB0001 : A database error has occured. Please contact your system administrator</td>
                                                     </tr>';
                        }
                    }
                    else { // output error message when the employee does not exist
                        $content['message_body'] .= '<tr class="ma-tbl-row-error">
                                                        <td>'.$employee_no.'</td>
                                                        <td>'.$no_of_days.'</td>
                                                        <td colspan="5">Error : employee number does not exist.</td>
                                                     </tr>';
                    }
                    
                    //  Insert row data array into your database of choice here
                }

                $content['message_body'] .= "</tbody></table>";
                $content['flag'] = "success";
                $content['message_subject'] = 'Meal allowance has been succesfully reloaded.';
            }
        }
        else {
            $content['flag'] = "error";
            $content['message'] = '<p class="text-center text-muted">No file selected</p>';
        }
        
        $this->session->set_flashdata('message_body', $content['message_body']);
        $this->session->set_flashdata('flag',$content['flag'] );
        $this->session->set_flashdata('message_subject', $content['message_subject']);
        
        unlink($xls_file);
        redirect('employee/meal_allowance');
    }

    public function load_employees(){
        $create_user = $this->session->userdata('user_id');
        $this->load->model('user_model');
        $this->load->model('system_model');
        $this->load->model('stockholder_model');
       //$stockholder_meal_allowance_details = $this->stockholder_model->get_stockholder_allowance_defaults();
      //  $meal_allowance_details = $this->system_model->get_system_config(1);
        $this->load->library('excel');
        try {
            $xls_file = './files/employees/stockholder_masterfile.xlsx';
            $inputFileType = PHPExcel_IOFactory::identify($xls_file);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($xls_file);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0); 
        $highestRow = $sheet->getHighestRow(); 
        $highestColumn = $sheet->getHighestColumn();
        //   <th>Deduction</th>
        echo "<table class='table' border='1'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Person Type</th>
                        <th>Employee No</th>
                        <th>Barcode No</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Employee Image Filename</th>
                        <th>Department ID</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>";
                //  Loop through each row of the worksheet in turn
        for ($row = 4; $row <= $highestRow; $row++){  // start from 2 to avoid header
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);
            $no = $rowData[0][0];
            $person_type = $rowData[0][1];
            $employee_no = $rowData[0][2];
            $barcode_no = $rowData[0][3];
            $first_name = $rowData[0][4];
            $middle_name = $rowData[0][5];
            $last_name = $rowData[0][6];
            $address = $rowData[0][7];
            $contact_no = $rowData[0][8];
            $employee_image_filename = $rowData[0][9];
            $department_id = $rowData[0][10];


            // check flag for employee no
            $is_employee_no_exist = $this->validate_employee_no(trim($employee_no));
            // check flag for barcode no
            $is_barcode_no_exist = $this->validate_barcode_no(trim($barcode_no));
            // add person if the employee no and barcode no does not exist
            if($is_employee_no_exist && $is_barcode_no_exist){

              
                echo "<tr>
                          <td>".$no."</td>
                          <td>".$person_type."</td>
                          <td>".$employee_no."</td>
                          <td>".$barcode_no."</td>
                          <td>".$first_name."</td>
                          <td>".$middle_name."</td>
                          <td>".$last_name."</td>
                          <td>".$address."</td>
                          <td>".$contact_no."</td>
                          <td>".$employee_image_filename."</td>
                          <td>".$department_id."</td>
                          <td>Success</td>
                      </tr>";

                $user_id = $this->user_model->add_user(
                    $employee_no,
                    $employee_no
                );

                $employee_image_filename = $employee_image_filename != "" ? $employee_image_filename : "default.jpg"; 
                // if employee is being added
                if(strtoupper(trim($person_type)) == 'EMPLOYEE'){
                    $person_type_id = 1; // default ID of employee type in persons table
                    $new_person_params = array(
                        $user_id,
                        $person_type_id,
                        $employee_no,
                        $first_name,
                        $middle_name,
                        $last_name,
                        $address,
                        $contact_no,
                        $employee_image_filename,
                        $meal_allowance_details[0]->config_value,
                        $barcode_no,
                        $department_id,
                        $create_user
                    );
                }
                else if(strtoupper(trim($person_type)) == 'CORE STOCKHOLDER') {
                    $person_type_id = 8; // default ID of employee type in persons Table
                    $new_person_params = array(
                        $user_id,
                        $person_type_id,
                        $employee_no,
                        $first_name,
                        $middle_name,
                        $last_name,
                        $address,
                        $contact_no,
                        $employee_image_filename,
                        null, // meal allowance rate
                        $barcode_no,
                        null,
                        $create_user
                    );
                }
                else {
                    // if person type is wrong
                    $person_type_id = 15;
                    $new_person_params = array(
                        $user_id,
                        $person_type_id,
                        $employee_no,
                        $first_name,
                        $middle_name,
                        $last_name,
                        $address,
                        $contact_no,
                        $employee_image_filename,
                        $meal_allowance_details[0]->config_value,
                        $barcode_no,
                        $department_id,
                        $create_user
                    );
                }


                $this->person_model->add_person($new_person_params);
            }
            else {
                $employee_no_message = $is_employee_no_exist ? "" : ":This employee no already exist.";
                $barcode_no_message = $is_barcode_no_exist ? "" : ":This barcode no already exist.";
                echo "<tr style='background-color:red;'>
                          <td>".$no."</td>
                          <td>".$person_type."</td>
                          <td>".$employee_no . $employee_no_message ."</td>
                          <td>".$barcode_no . $barcode_no_message ."</td>
                          <td>".$first_name ."</td>
                          <td>".$middle_name."</td>
                          <td>".$last_name."</td>
                          <td>".$address."</td>
                          <td>".$contact_no."</td>
                          <td>".$employee_image_filename."</td>
                          <td>".$department_id."</td>
                          <td>Error</td>
                      </tr>";
            }
             
        }

        echo '</tbody></table>';
    }

    public function credit_management(){
        $this->load->model('person_model');
        $this->load->model('system_model');
        $departments_list = $this->system_model->get_departments();
        $content['departments'] = $departments_list;
        $content['user_type_id'] = $this->session->userdata('user_type_id');
        $person_type_id = 1; // mdi employees
    //    $credits_ledger_list = $this->person_model->get_persons_with_credit($person_type_id);
        $content['main_content'] = 'employees/credit_management_view';
       // $content['credits_ledger_list'] = $credits_ledger_list;
        $this->load->view('includes/template',$content);       
    }

    public function credit_management_sruho(){
        $this->load->model('person_model');
        $this->load->model('system_model');
        $content['user_type_id'] = $this->session->userdata('user_type_id');
        $credits_ledger_list = $this->person_model->get_persons_with_credit(19);
        $content['main_content'] = 'canteen_employees/credit_management_sruho';
        $content['credits_ledger_list'] = $credits_ledger_list;
        $this->load->view('includes/template',$content);       
    }

    public function import_customer_debits(){
        $employee_type = 0;
        if(!empty($_FILES['xls_debit']['name'])) { 
            $allowed =  array('xls','xlsx');
            $filename = $_FILES['xls_debit']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                $content['flag'] = "error";
                $content['message_subject'] = "Invalid file format! <strong>" . $filename . "</strong> is not an excel file.";
                $content['message_body'] = '<p class="text-center text-muted">Please upload a valid file format to proceed.</p>';
            }
            else {
                $path = $_FILES['xls_debit']['name'];
                $xls_file = "debit-" . date("YmdHis") . "." . pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './files/';
                $config['allowed_types']        = 'xls|xlsx';
                $config['file_name'] = $xls_file; // set the name here
                //unlink($config['upload_path'])
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('xls_debit')) {
                    var_dump($this->upload->display_errors());
                }
                $employee_type = $this->input->post('employee_type');
                $employee_recordset = $this->person_model->employees_recordset($employee_type);
                $current_user = $this->session->userdata('user_id');

                $this->load->library('excel');
                try {
                    $xls_file = './files/' . $xls_file;
                    $inputFileType = PHPExcel_IOFactory::identify($xls_file);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($xls_file);
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }

                //  Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                //   <th>Deduction</th>
                $content['message_body'] = "<table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Employee No</th>
                                                        <th>Name</th>
                                                        <th>Credit Amount</th>
                                                        <th>Debit Amount</th>
                                                        <th>Remaining</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                //  Loop through each row of the worksheet in turn
                for ($row = 4; $row <= $highestRow; $row++){  // start from 2 to avoid header
                    //  Read a row of data into an array
                    $rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
                                                    NULL,
                                                    TRUE,
                                                    FALSE);
                    $no = $rowData[0][0];
                    $person_type_name = $rowData[0][1];
                    $employee_no = $rowData[0][2];
                    $person_name = $rowData[0][3];
                    //$credit_amount = $rowData[0][4];
                    $debit_amount = $rowData[0][5];
                    $difference = $credit_amount - $debit_amount;
                    $employee_no = (string)$employee_no;
                    if (array_key_exists($employee_no, $employee_recordset)) { // check if employee exists
                        $employee_id = $employee_recordset[$employee_no]['id'];
                        $barcode_no = $employee_recordset[$employee_no]['barcode_no'];
                        $current_salary_deduction = $employee_recordset[$employee_no]['salary_deduction'];
                        $new_salary_deduction = $current_salary_deduction  - $debit_amount;
                        $person_debit_params = array(
                            $new_salary_deduction,
                            $current_user,
                            $employee_id
                        );

                        $this->person_model->update_salary_deduction($person_debit_params);
                  
                        $debitted_params = array( 
                            $employee_id,
                            $employee_no,
                            $barcode_no,
                            $person_name,
                            $credit_amount,
                            $debit_amount,
                            $current_user
                        );

                        $this->person_model->insert_person_debitted_credits($debitted_params);

                        $content['message_body'] .= '<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$employee_no. '</td>
                                                        <td>'.$person_name.'</td>
                                                        <td>'.$credit_amount.'</td>
                                                        <td>'.$debit_amount.'</td>
                                                        <td>'.$new_salary_deduction.'</td>
                                                        <td>Success</td>
                                                     </tr>';
                    }
                    else {  // output error message when the employee does not exist
                        $content['message_body'] .= '<tr class="ma-tbl-row-error">
                                                        <td>'.$no.'</td>
                                                        <td>'.$employee_no.' : This employee no does not exist.</td>
                                                        <td>'.$person_name.'</td>
                                                        <td>'.$credit_amount.'</td>
                                                        <td>'.$new_salary_deduction.'</td>
                                                        <td>'.$difference.'</td>
                                                        <td">Error</td>
                                                     </tr>';
                 
                    }
                }

                $content['message_body'] .= "</tbody></table>";
                $content['flag'] = "success";
                $content['message_subject'] = 'Successfully debitted employees salary deductions';
                $this->session->set_flashdata('employee_type', $employee_type);
                $this->session->set_flashdata('debit_message_body', $content['message_body']);
                $this->session->set_flashdata('debit_flag',$content['flag'] );
                $this->session->set_flashdata('debit_message_subject', $content['message_subject']);
                unlink($xls_file);
                redirect('employee/debit_result');

            } //  else {
           
        } // if(!empty($_FILES['xls_debit']['name'])) { 
    } // import_customer_debits(){
    
    public function debit_result(){
        $content['main_content'] = 'employees/debit_result_view';
        $this->load->view('includes/template',$content);
    }

    public function ajax_get_employees_by_department(){
        $department_id = $this->input->post('department_id');
        $employees_list = $this->person_model->get_employee_by_department($department_id);
        foreach($employees_list as $emp){
            echo "<tr>";
                echo "<td><input type='checkbox' class='cb_employee' data-person_id='".$emp->person_id."'/></td>";
                echo "<td>" . $emp->employee_no . "</td>";
                echo "<td>" . $emp->person_name . "</td>";
                echo "<td>" . $emp->remaining_amount . "</td>";
            echo "</tr>";
        }
    }

    public function ajax_get_employees_with_credit_by_department(){
        $department_id = $this->input->post('department_id');
        $from_date = $this->input->post('from_date');
        $end_date = $this->input->post('end_date');

        $person_type_id = 1; // mdi employees
        if($department_id != 0){
            $params = array($from_date,$end_date);
            $employees_list = $this->person_model->get_persons_with_credit_by_cutoff_and_dept($params,$department_id);
        }
        else {
            $params = array($from_date,$end_date);
            $employees_list = $this->person_model->get_persons_with_credit_by_cutoff($params);
        }

        $ctr = 1;
        foreach($employees_list as $emp){
            if($emp->credit_amount > 0){
                echo "<tr>";
                    echo "<td><input type='checkbox' class='cb_employee' data-person_id='".$emp->person_id."'/></td>";
                    echo "<td>" . $ctr . "</td>";
                    echo "<td>" . $emp->person_type_name . "</td>";
                    echo "<td>" . $emp->employee_no . "</td>";
                    echo "<td>" . $emp->name . "</td>";
                    echo "<td>" . $emp->credit_amount . "</td>";
                echo "</tr>";
                $ctr++;
           }
        }
    }
    

    public function ajax_export_selected_employees_credit(){
        $this->load->library('excel');
        $excel = PHPExcel_IOFactory::load("./files/credit_management_template.xlsx");
        $row = 4;
        $ctr = 1;
        $this->load->model('person_model');
        $selected_employees = $this->input->post('selected_employees');
        $employee_type = $this->input->post('employee_type');
        if($employee_type == "mdi"){
            $from_date = $this->input->post('from_date');
            $end_date = $this->input->post('end_date');
            $employees_list = $this->person_model->get_employees_sd_by_cutoff($selected_employees,$from_date,$end_date);
        }
        else if($employee_type == "sruho"){
            $employees_list = $this->person_model->get_canteen_employees_by_id($selected_employees);
        }

        foreach($employees_list as $credit){
            $excel->getActiveSheet()->setCellValue('B' . $row, $ctr)
                                  ->setCellValue('C' . $row , $credit->person_type_name)
                                  ->setCellValue('D' . $row, $credit->employee_no)
                                  ->setCellValue('E' . $row, $credit->person_name)
                                  ->setCellValue('F' . $row, $credit->salary_deduction)
                                  ->setCellValue('G' . $row,0);
            $row++;
            $ctr++;
        }
    
        foreach(range('B','G') as $columnID) {
            $excel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $excel->getActiveSheet()->removeRow($row);

        /** Borders for all data */
       $excel->getActiveSheet()
             ->getStyle('B4:'.'G'.($row - 1))
             ->getBorders()
             ->getAllBorders()
             ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        // download excel file
        if($employee_type == "mdi"){
            $filename = "employee_credits_mdi.xls";
            
        }
        else if($employee_type == "sruho"){
            $filename = "employee_credits_sruho.xls";
        }
        
        $filepath = "./files/exported_employees/";
     
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $writer->save($filepath . $filename);
        return $filepath . $filename;
    }

    public function ajax_print_employee_credits(){

        $this->load->library('pdf');
        $this->load->model('person_model');
        
        $selected_employees = $this->input->post('selected_employees');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $selected_ids = "";
        foreach($selected_employees as $i){
            $selected_ids .= $i . ",";
        }

        $selected_ids = substr($selected_ids,0,-1);     

        $report_title = "Credits Ledger Report";
        $report_content = '<table border="1" cellpadding="3">
                            <thead>
                            <tr>
                                <th style="width:10%;">No</th>
                                <th style="width:15%;">Customer Type</th>
                                <th style="width:20%;">Employee No</th>
                                <th style="width:35%;">Name</th>
                                <th style="width:20%;">Credit Amount</th>
                            </tr>
                        </thead><tbody>';

        $params = array($from_date,$to_date); 
 
        $employee_type = $this->input->post('employee_type');
        if($employee_type == "mdi"){
            $employees_list = $this->person_model->get_persons_with_credit_by_cutoff_and_id($params,$selected_ids);
            
        }
        else if($employee_type == "sruho"){
            $employees_list = $this->person_model->get_canteen_employees_by_id($selected_employees);
        }

        $ctr = 1;
        foreach($employees_list as $credit){
          $report_content .= '<tr>
                                <td  style="width:10%;">' . $ctr . '</td>
                                <td style="width:15%;">' . $credit->person_type_name . '</td>
                                <td style="width:20%;">' . $credit->employee_no . '</td>
                                <td style="width:35%;">' . $credit->person_name . '</td>
                                <td style="width:20%;">' . $credit->salary_deduction . '</td>
                              </tr>';
            $ctr++;
        }
        $report_content .= '</tbody></table>';
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Credits Report');
        $pdf->SetSubject('Credits Report');
        $pdf->SetKeywords('Credits Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title , "As of " . date_format(date_create(date('Y-m-d')),'F d, Y'));
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

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        if($employee_type == "mdi"){
            $pdf->Output(__DIR__.'/../../files/exported_employees/employee_credits_mdi.pdf', 'F');
            
        }
        else if($employee_type == "sruho"){
            $pdf->Output(__DIR__.'/../../files/exported_employees/employee_credits_sruho.pdf', 'F');
        }
        
 
    }

    public function reload_employee_meal_allowance(){
        $valid_from = $this->input->post('txt_valid_from');
        $valid_until = $this->input->post('txt_valid_until');

        if(!empty($_FILES['ma_xls']['name'])) { 
            $allowed =  array('xls','xlsx');
            $filename = $_FILES['ma_xls']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                $content['flag'] = "error";
                $content['message_subject'] = "Invalid file format! <strong>" . $filename . "</strong> is not an excel file.";
                $content['message_body'] = '<p class="text-center text-muted">Please upload a valid file format to proceed.</p>';
            }
            else {
                $path = $_FILES['ma_xls']['name'];
                $xls_file = "ma_reload-" . date("YmdHis") . "." . pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']          = './files/';
                $config['allowed_types']        = 'xls|xlsx';
                $config['file_name'] = $xls_file; // set the name here
                //unlink($config['upload_path'])
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('ma_xls')) {
                    var_dump($this->upload->display_errors());
                }
              
                $employee_recordset = $this->person_model->employees_recordset_array();
                $current_user = $this->session->userdata('user_id');

                $this->load->library('excel');
                try {
                    $xls_file = './files/' . $xls_file;
                    $inputFileType = PHPExcel_IOFactory::identify($xls_file);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($xls_file);
                } catch(Exception $e) {
                    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                }

                //  Get worksheet dimensions
                $sheet = $objPHPExcel->getSheet(0); 
                $highestRow = $sheet->getHighestRow(); 
                $highestColumn = $sheet->getHighestColumn();
                //   <th>Deduction</th>
                $content['message_body'] = "<table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Employee No</th>
                                                        <th>Name</th>
                                                        <th>Days Worked</th>
                                                        <th>Alloted Amount</th>
                                                        <th>Validity Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                $base_row = 4;
                $ctr = 1;
                //  Loop through each row of the worksheet in turn
                for ($row = $base_row; $row <= $highestRow; $row++){  // start from 2 to avoid header
                    //  Read a row of data into an array
                    $row_data = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
                                                    NULL,
                                                    TRUE,
                                                    FALSE);

                    // xls details
                    $employee_no = $row_data[0][0];
                    $employee_name = $row_data[0][1];
                    $no_of_days = $row_data[0][2];
             

                    $employee_no = (string)$employee_no;
                    if (array_key_exists($employee_no, $employee_recordset)) { // check if employee exists
                        $employee_id = $employee_recordset[$employee_no]['id'];
                        $alloted_amount = $employee_recordset[$employee_no]['meal_allowance_rate'] * $no_of_days;
                        $meal_allowance_params = array(
                            $employee_id,
                            1, // employee person type id
                            $employee_recordset[$employee_no]['barcode_no'],
                            $no_of_days,
                            $employee_recordset[$employee_no]['meal_allowance_rate'],
                            $alloted_amount,
                            $alloted_amount,
                            null, // max allowance daily, applicable for stockholder only
                            null, // weekly claims count, applicable for stockholder only
                            $valid_from,
                            $valid_until,
                            $current_user
                        );
                        $this->person_model->insert_employee_meal_allowance($meal_allowance_params);
                        
                        $content['message_body'] .= '<tr>
                                                        <td>'.$ctr.'</td>
                                                        <td>'.$employee_no.'</td>
                                                        <td>'.$employee_name.'</td>
                                                        <td>'.$no_of_days.'</td>
                                                        <td>'.$alloted_amount.'</td>
                                                        <td>'.$valid_from . ' to ' . $valid_until.'</td>
                                                     </tr>';        
                    }
                    else { // output error message when the employee does not exist
                        $content['message_body'] .= '<tr class="ma-tbl-row-error">
                                                        <td>'.$ctr.'</td>
                                                        <td>'.$employee_no.' : Employee No does not exist</td>
                                                        <td>'.$employee_name.'</td>
                                                        <td>'.$no_of_days.'</td>
                                                        <td>'.$alloted_amount.'</td>
                                                        <td>'.$valid_from . ' to ' . $valid_until.'</td>
                                                     </tr>';
                    }
                    
                    $ctr++;
                }

                $content['message_body'] .= "</tbody></table>";
                $content['flag'] = "success";
                $content['message_subject'] = 'Meal allowance has been succesfully reloaded.';
            }
        }
        else {
            $content['flag'] = "error";
            $content['message'] = '<p class="text-center text-muted">No file selected</p>';
        }
        
        $this->session->set_flashdata('message_body', $content['message_body']);
        $this->session->set_flashdata('flag',$content['flag'] );
        $this->session->set_flashdata('message_subject', $content['message_subject']);
        unlink($xls_file);
        redirect('employee/meal_allowance_log');
        //var_dump($_POST);
        //var_dump($_FILES);
    }

    public function meal_allowance_log(){
        $content['main_content'] = 'employees/meal_allowance_load_result';
        $this->load->view('includes/template',$content);
    }

    public function canteen_employees(){
        $content['main_content'] = 'canteen_employees/all_employees_view';
        $this->load->view('includes/template',$content);
    }

    public function dt_canteen_employees_list(){
        $this->load->library('dt_ssp');
        $this->load->helper('string');
        // DB table to use
        $table = 'canteen_employees_v';
        // Table's primary key
        $primaryKey = 'person_id';
        $columns = array(
            array( 'db' => 'employee_no', 'dt' => 'employee_no' ),
            array( 'db' => 'person_name',  'dt' => 'person_name' ),
            array( 
                'db' => 'salary_deduction',  
                'dt' => 'salary_deduction',
                'formatter' => function( $d, $row){
                    return $d != "" ? number_format($d,2,'.',',') : 0;
                }
            ),
            array( 
                'db' => 'person_id',   
                'dt' => 'person_id',
                'formatter' => function( $d, $row ) {
                    return "<a href='edit/" . encode_string($d) ."'><i class='fa fa-edit fa-1x'></i></a>";
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
     
        $arr = DT_ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

     public function ajax_export_selected_employees_ma(){


        $selected_employees = explode(",",$this->input->post('selected_employees'));
    
        $employees_list = $this->person_model->get_employees_by_id($selected_employees);

      
        $this->load->library('excel');
        $excel = PHPExcel_IOFactory::load("./files/templates/meal_allowance_template.xlsx");


        $row = 4;
        $ctr = 1;
 
        foreach($employees_list as $emp){
     
            $excel->getActiveSheet()->setCellValue('B' . $row, $emp->employee_no)
                                  ->setCellValue('C' . $row , $emp->person_name)
                                  ->setCellValue('D' . $row,0);
            $row++;
            $ctr++;
        }


        foreach(range('B','D') as $columnID) {
            $excel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $excel->getActiveSheet()->removeRow($row);

        /** Borders for all data */
       $excel->getActiveSheet()
             ->getStyle('B4:'.'D'.($row - 1))
             ->getBorders()
             ->getAllBorders()
             ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        // download excel file
       // $filename = "ma_employees" . ".xlsx";
       // $filepath = "../files/exported_employees/";
        
        // Redirect output to a client web browser (Excel2007)
       /* header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');*/
       /* $this->output->set_content_type('Content-Type: application/xls');
        $this->output->set_header('Content-Disposition: attachment;filename=$filename');
        $this->output->set_header('Cache-Control: max-age=0');*/

/*
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        //  ob_end_clean();
        $objWriter->save('php://output');*/

        $this->load->helper('download');

        // Save and capture output (into PHP memory)
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_start();
        $objWriter->save('php://output');
        $excelFileContents = ob_get_clean();

        // Download file contents using CodeIgniter
        force_download('ma_allowance-'.date('YmdHis').'.xlsx', $excelFileContents);


    }
}