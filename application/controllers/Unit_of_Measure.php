<?php

class Unit_of_Measure extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('unit_of_measure_model');
	$this->load->helper('encryption');
    }

    public function index(){
        $content['main_content'] = 'unit_of_measure/all_unit_of_measure';
        $this->load->view('includes/template',$content);
    }

    public function dt_get_unit_of_measures(){
        $this->load->library('dt_ssp');
        
        $this->load->helper('string');
        // DB table to use
        $table = 'unit_of_measure_v';
        // Table's primary key
        $primaryKey = 'uom_id';
        $columns = array(
            array( 'db' => 'uom_no', 'dt' => 'uom_no' ),
            array( 'db' => 'abbreviation',  'dt' => 'abbreviation' ),
            array( 'db' => 'description',  'dt' => 'description' ),
            array( 
                'db' => 'uom_id',   
                'dt' => 'uom_id',
                'formatter' => function( $d, $row ) {
                     $btn_data = '<a href="unit_of_measure/edit_uom/'.encode_string($d).'"><i class="fa fa-edit fa-1x"></i></a></li>';
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
    
        $arr = DT_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns);
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

    public function new_uom(){
        $content['main_content'] = 'unit_of_measure/new_uom';
        $this->load->view('includes/template',$content);
    }

    public function save_new_uom(){

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'abbreviation',
                'label' => 'Abbreviation',
                'rules' => 'trim|required|callback_check_abbreviation_exist',
                'errors' => array(
                    'check_abbreviation_exist' => 'Abbreviation already exists.',
                ) 
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required|callback_check_description_exist',
                'errors' => array(
                    'check_description_exist' => 'Description already exists.',
                ) 
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_uom(); // load new employee view and display errors
        }
        else {
            $abbreviation = $this->input->post('abbreviation');
            $description = $this->input->post('description');
            $create_user = $this->session->userdata('user_id');
            $uom_params = array(
                $description,
                $abbreviation,
                $create_user
            );
            $this->unit_of_measure_model->insert_unit_of_measure($uom_params);
            $this->session->set_flashdata('success_flag', TRUE);
            $this->session->set_flashdata('message', '<strong>'.$description.' ('.$abbreviation.')</strong>  has been successfully added.');
            $this->session->set_flashdata('subject', 'Success');
            redirect('unit_of_measure/new_uom');
        }
    }

    public function edit_uom(){
      //  $this->load->helper('encryption');
        $this->load->model('system_model');
        $uom_id = decode_string($this->uri->segment(3));
        $uom_details = $this->unit_of_measure_model->get_unit_of_measure_details($uom_id);
        $status_list = $this->system_model->get_status();
        $content['main_content'] = 'unit_of_measure/edit_uom';
        $content['uom_details'] = $uom_details;
        $content['status_list'] = $status_list;
        $this->load->view('includes/template',$content);
    }

    public function update_uom(){
        $this->load->library('form_validation');
       // $this->load->helper('encryption');
        $uom_id = $this->input->post('uom_id');
        $abbreviation = $this->input->post('abbreviation');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        $create_user = $this->session->userdata('user_id');
        $uom_params = array(
            $description,
            $abbreviation,
            $status,
            $create_user,
            $uom_id
        );
        $this->unit_of_measure_model->update_uom($uom_params);
        $this->session->set_flashdata('success_flag', TRUE);
        $this->session->set_flashdata('message', '<strong>'.$description.' ('.$abbreviation.')</strong> has been successfully updated.');
        $this->session->set_flashdata('subject', 'Success');
        redirect('unit_of_measure/edit_uom/' . encode_string($uom_id));
              
    }

    public function check_abbreviation_exist(){
        return $this->unit_of_measure_model->check_abbreviation_exist($this->input->post('abbreviation'));
    }

      public function check_description_exist(){
        return $this->unit_of_measure_model->check_description_exist($this->input->post('description'));
    }


}