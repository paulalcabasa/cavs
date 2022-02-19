<?php
class User extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
        $this->load->helper('encryption');
        $this->load->model('user_model');
	}

    public function index(){
        $content['main_content'] = 'users/all_users_view';
        $this->load->view('includes/template',$content);
    }

    public function dt_get_users_list(){
        $this->load->library('dt_ssp');
        // DB table to use
        $table = 'persons_v';
        // Table's primary key
        $primaryKey = 'person_id';
        $columns = array(
            array(
                'db'        => 'person_id',
                'dt'        => 'DT_RowId',
                'formatter' => function( $d, $row ) {
                    return 'row_'.$d;
                }
            ),
            array( 'db' => 'person_name',  'dt' => 'person_name' ),
            array( 'db' => 'person_type_name',   'dt' => 'person_type_name' ),
            array( 'db' => 'status',   'dt' => 'status' ),
            array( 'db' => 'last_login',   'dt' => 'last_login' ),
            array( 'db' => 'person_image',   'dt' => 'person_image' ),
            array( 
                'db' => 'person_id',   
                'dt' => 'enc_person_id',
                'formatter' => function( $d, $row ) {
                    return encode_string($d);
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
        
        $where = "person_type_id = 4 OR person_type_id = 6 OR person_type_id = 10 OR person_type_id = 16";

        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
        );
    }

    public function new_user(){
        $content['person_types'] = $this->user_model->get_person_types();
        $content['main_content'] = 'users/new_user_view';
        $this->load->view('includes/template',$content);
    }
    
    public function check_username(){
        $username = $this->input->post('username');
        $sql = "SELECT id 
                FROM users 
                WHERE username = ?";
        $query = $this->db->query($sql,$username);
        if($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
    }

    public function save_new_user(){
        $person_image = "default.jpg"; // default image would be used if no image is uploaded
        if(!empty($_FILES['person_image']['name'])) {
            $path = $_FILES['person_image']['name'];
            $person_image = date('Ymdhis').".".pathinfo($path, PATHINFO_EXTENSION); 
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
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|callback_check_username',
                'errors' => array(
                        'check_user_name' => 'Username already exists.',
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
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'trim|required'
            ),
            array(
                'field'   => 'confirm_password',
                'label'   => 'Confirm Password',
                'rules'   => 'trim|required|matches[password]'
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_user(); // load new employee view and display errors
        }
        else {
            $this->load->model('user_model');
            $this->load->model('person_model');
            $this->load->model('system_model');
            $create_user = $this->session->userdata('user_id');
            $user_id = $this->user_model->add_user($this->input->post('username'),$this->input->post('password'));
            $person_type_id = $this->input->post('sel_user_type'); // default ID of stockholder type in persons table
            $params = array(
                $user_id,
                $person_type_id,
                null,
                $this->input->post('first_name'),
                $this->input->post('middle_name'),
                $this->input->post('last_name'),
                $this->input->post('address'),
                $this->input->post('contact_no'),
                $person_image,
                null, // meal allowance rate
                null, // barcode value
                null, // department id
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
        $person_id = decode_string($this->uri->segment(3));
        $person_details = $this->person_model->get_person_details($person_id);
        $content['person_types'] = $this->user_model->get_person_types();
        $content['main_content'] = 'users/edit_user_view';
        $content['person_details'] = $person_details[0];
        $this->load->view('includes/template',$content);
    }

    public function update_user_details(){
        $person_image = $this->input->post('old_person_image'); // default would be old picture if no picture is uploaded
        if(!empty($_FILES['person_image']['name'])) {
            $path = $_FILES['person_image']['name'];
            $person_image = date('Ymdhis').".".pathinfo($path, PATHINFO_EXTENSION); 
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
            $this->input->post('person_id')
        );
        $this->person_model->update_person_details($params);
        $person_type_params = array(
            $this->input->post('sel_user_type'),
            $update_user,
            $this->input->post('person_id')
        );
        $this->person_model->change_person_type($person_type_params);
        $this->load->helper('encryption');
        // redirect to form and show successful operation
        $this->session->set_flashdata('success_flag', TRUE);
        redirect('user/edit/' . encode_string($this->input->post('person_id')));
    }

    public function ajax_change_password(){
        $this->load->helper('encryption');
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('password');
        $update_user = $this->session->userdata('user_id');
        $encrypted_password = encode_string($password);
        $change_password_params = array(
            $encrypted_password,
            $update_user,
            $user_id
        );
      
        $this->user_model->change_password($change_password_params);

    }


   
}