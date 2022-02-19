<?php
class Stockholder extends MY_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('encryption');
        $this->load->model('stockholder_model');
        $this->load->model('system_model');
	}

    public function index(){
        $content['main_content'] = 'stockholder/all_stockholders_view';
        $this->load->view('includes/template',$content);
    }

    public function validate_barcode_no($barcode_no){
        $this->load->model('person_model');
        return $this->person_model->check_barcode_no_existence($barcode_no);
    }

    public function check_employee_no(){
        $employee_no = $this->input->post('stockholder_no');
        $sql = "SELECT id 
                FROM persons 
                WHERE employee_no = ?";
        $query = $this->db->query($sql,$employee_no);
        if($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
    }

    public function dt_get_stockholders(){
        $this->load->library('dt_ssp');
        // DB table to use
        $table = 'persons_v';
        // Table's primary key
        $primaryKey = 'person_id';
        $columns = array(
            array( 'db' => 'employee_no', 'dt' => 'employee_no' ),
            array( 'db' => 'person_name',  'dt' => 'person_name' ),
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
            array( 'db' => 'max_allowance_daily', 'dt' => 'max_allowance_daily'),
            array( 'db' => 'ma_weekly_claims_count', 'dt' => 'ma_weekly_claims_count'),
            array( 'db' => 'ma_validity_date', 'dt' => 'ma_validity_date'),
         //   array( 'db' => 'ma_date_created', 'dt' => 'ma_date_created'),
            array( 
                'db' => 'person_id',   
                'dt' => 'person_id',
                'formatter' => function( $d, $row ) {
                    return "<a href='stockholder/edit/" . encode_string($d) ."'><i class='fa fa-edit fa-1x'></i></a>";
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
        
        $where = "person_type_id = 8";

        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
        );
    }

    public function new_stockholder(){
        $content['main_content'] = 'stockholder/new_stockholder_view';
        $this->load->view('includes/template',$content);
    }

    public function save_new_stockholder(){

        $person_image = "default.jpg"; // default image would be used if no image is uploaded
        if(!empty($_FILES['person_image']['name'])) {
            $path = $_FILES['person_image']['name'];
            $person_image = $this->input->post('stockholder_no').".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']          = './assets/images/person_images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 4024;
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
                'field' => 'stockholder_no',
                'label' => 'Stockholder No',
                'rules' => 'trim|required|callback_check_employee_no',
                'errors' => array(
                        'check_employee_no' => 'Stockholder No. already exists.',
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
            array(
                'field' => 'middle_name',
                'label' => 'Middle Name',
                'rules' => 'trim|required'
            ),
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
            $this->new_stockholder(); // load new employee view and display errors
        }
        else {
            $this->load->model('user_model');
            $this->load->model('person_model');
            $this->load->model('system_model');
            $this->load->model('stockholder_model');
            $stockholder_meal_allowance_details = $this->stockholder_model->get_stockholder_allowance_defaults();
            $meal_allowance = $stockholder_meal_allowance_details[2]->config_value;
            $max_daily_allowance = $stockholder_meal_allowance_details[0]->config_value;
            $ma_weekly_claims_count = $stockholder_meal_allowance_details[1]->config_value;
            $create_user = $this->session->userdata('user_id');
            $user_id = $this->user_model->add_user($this->input->post('stockholder_no'),$this->input->post('stockholder_no'));
            $person_type_id = 8; // default ID of stockholder type in persons table
            $params = array(
                $user_id,
                $person_type_id,
                $this->input->post('stockholder_no'),
                $this->input->post('first_name'),
                $this->input->post('middle_name'),
                $this->input->post('last_name'),
                $this->input->post('address'),
                $this->input->post('contact_no'),
                $person_image,
                null,
                $this->input->post('barcode_no'),
                null,
                $create_user
            );
            $this->person_model->add_person($params);
            // redirect to form and show successful operation
            $this->session->set_flashdata('success_flag', TRUE);
            redirect(current_url());
        }
    }

    public function edit(){   
        $this->load->model('person_model');
        $list_of_state = $this->system_model->get_person_state();
        $content['list_of_state'] = $list_of_state;
        $person_id = decode_string($this->uri->segment(3));
        $person_details = $this->person_model->get_person_details($person_id);
        $content['main_content'] = 'stockholder/edit_stockholder_view';
        $content['person_details'] = $person_details[0];
        $content['list_of_state'] = $list_of_state;
        $this->load->view('includes/template',$content);
    }

     public function update_stockholder_details(){
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

        $this->load->model('person_model');
        $update_user = $this->session->userdata('user_id');
        $params = array(
            $this->input->post('first_name'),
            $this->input->post('middle_name'),
            $this->input->post('last_name'),
            $this->input->post('address'),
            $this->input->post('contact_no'),
            $person_image,
            $update_user,
            null,
            $this->input->post('state'),
            $this->input->post('employee_id')
        );
        $this->person_model->update_person_details($params);
        $this->load->helper('encryption');
        // redirect to form and show successful operation
        $this->session->set_flashdata('success_flag', TRUE);
        redirect('stockholder/edit/' . encode_string($this->input->post('employee_id')));
    }


}