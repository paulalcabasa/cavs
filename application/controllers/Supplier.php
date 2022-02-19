<?php

class Supplier extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
	$this->load->helper('encryption');
    }

    public function index(){
        $content['main_content'] = 'suppliers/all_suppliers';
        $this->load->view('includes/template',$content);
    }

    public function dt_get_suppliers(){
        $this->load->library('dt_ssp');
        
        $this->load->helper('string');
        // DB table to use
        $table = 'suppliers_v';
        // Table's primary key
        $primaryKey = 'supplier_id';
        $columns = array(
            array( 'db' => 'supplier_no', 'dt' => 'supplier_no' ),
            array( 'db' => 'supplier_name',  'dt' => 'supplier_name' ),
            array( 'db' => 'tin',  'dt' => 'tin' ),
            array( 'db' => 'address',  'dt' => 'address' ),
            array( 'db' => 'contact_no', 'dt' => 'contact_no'),
            array( 
                'db' => 'supplier_id',   
                'dt' => 'supplier_id',
                'formatter' => function( $d, $row ) {
                	
                     $btn_data = '<a href="supplier/edit_supplier/'.encode_string($d).'" data-state_id="4"><i class="fa fa-edit fa-1x"></i></a>';
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

    public function new_supplier(){
        $content['main_content'] = 'suppliers/new_supplier';
        $this->load->view('includes/template',$content);
    }

    public function save_new_supplier(){

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'supplier_name',
                'label' => 'Supplier Name',
                'rules' => 'trim|required'   
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_supplier(); // load new employee view and display errors
        }
        else {
            $supplier_name = $this->input->post('supplier_name');
            $tin = $this->input->post('tin');
            $contact_no = $this->input->post('contact_no');
            $address = $this->input->post('address');
            $create_user = $this->session->userdata('user_id');
            $supplier_params = array(
                $supplier_name,
                $tin,
                $contact_no,
                $address,
                $create_user
            );
            $this->supplier_model->insert_supplier($supplier_params);
            $this->session->set_flashdata('success_flag', TRUE);
            $this->session->set_flashdata('message', 'Supplier has been successfully added.');
            $this->session->set_flashdata('subject', 'Success');
            redirect('supplier/new_supplier');
        }
    }

    public function edit_supplier(){
       // $this->load->helper('encryption');
        $this->load->model('system_model');
        $supplier_id = decode_string($this->uri->segment(3));
        $supplier_details = $this->supplier_model->get_supplier_details($supplier_id);
        $status_list = $this->system_model->get_status();
        $content['main_content'] = 'suppliers/edit_supplier';
        $content['supplier_details'] = $supplier_details;
        $content['status_list'] = $status_list;
        $this->load->view('includes/template',$content);
    }

    public function update_supplier(){
        $this->load->library('form_validation');
       // $this->load->helper('encryption');
        $supplier_name = $this->input->post('supplier_name');
        $tin = $this->input->post('tin');
        $contact_no = $this->input->post('contact_no');
        $address = $this->input->post('address');
        $supplier_id = $this->input->post('supplier_id');
        $create_user = $this->session->userdata('user_id');
        $status = $this->input->post('status');
        $supplier_params = array(
            $supplier_name,
            $tin,
            $contact_no,
            $address,
            $status,
            $create_user,
            $supplier_id
        );
        $this->supplier_model->update_supplier($supplier_params);
        $this->session->set_flashdata('success_flag', TRUE);
        $this->session->set_flashdata('message', 'Supplier has been successfully updated.');
        $this->session->set_flashdata('subject', 'Success');
        redirect('supplier/edit_supplier/' . encode_string($supplier_id));
              
    }

}