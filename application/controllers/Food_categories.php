<?php

class Food_Categories extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('food_categories_model');
        $this->load->helper('encryption');
    }

    public function index(){
        $content['main_content'] = 'food_categories/all_food_categories';
        $this->load->view('includes/template',$content);
    }

    public function dt_get_food_categories(){
        $this->load->library('dt_ssp');
        
        $this->load->helper('string');
        // DB table to use
        $table = 'food_categories';
        // Table's primary key
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 'id' ),
            array( 'db' => 'category',  'dt' => 'category' ),
            array( 'db' => 'sequence',  'dt' => 'sequence' ),
            array( 'db' => 'active',  'dt' => 'active' ),
            array( 
                'db' => 'id',   
                'dt' => 'id',
                'formatter' => function( $d, $row ) {
                     $btn_data = '<a href="food_categories/edit_food_categories/'.encode_string($d).'"><i class="fa fa-edit fa-1x"></i></a>';
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
        
        $arr = DT_ssp::complex($_GET, $sql_details, $table, $primaryKey, $columns,"saleable = 1");
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

    public function new_food_category(){
        $last_sequence = $this->food_categories_model->get_last_sequence_no();
        $content['main_content'] = 'food_categories/new_food_category';
        $content['last_sequence_no'] = $last_sequence;
        $this->load->view('includes/template',$content);
    }

    public function save_new_food_category(){

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'category_name',
                'label' => 'Category Name',
                'rules' => 'trim|required'   
            ),
            array(
                'field' => 'sequence_no',
                'label' => 'Sequence',
                'rules' => 'trim|required'   
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_food_category(); // load new employee view and display errors
        }
        else {
            $category_name = $this->input->post('category_name');
            $sequence_no = $this->input->post('sequence_no');
           
            $food_category_params = array(
                $category_name,
                $sequence_no
            );

            $this->food_categories_model->insert_food_category($food_category_params);
            $this->session->set_flashdata('success_flag', TRUE);
            $this->session->set_flashdata('message', $category_name . ' has been successfully added.');
            $this->session->set_flashdata('subject', 'Success');
            redirect('food_categories/new_food_category');
        }
    }

    public function edit_food_categories(){
       // $this->load->helper('encryption');
        
        $food_category_id = decode_string($this->uri->segment(3));
        $food_category_details = $this->food_categories_model->get_food_category_details($food_category_id);

        $content['main_content'] = 'food_categories/edit_food_category';
        $content['food_category_details'] = $food_category_details;

        $this->load->view('includes/template',$content);
    }

    public function update_food_category(){
       // $this->load->library('form_validation');
       // $this->load->helper('encryption');
        
        $category_name = $this->input->post('food_category_name');
    
        $sequence = $this->input->post('sequence');
        $status = $this->input->post('sel_status');

        $food_category_id = $this->input->post('food_category_id');
    
        $food_category_params = array(
            $category_name,
            $sequence,
            $status,
            $food_category_id
        );
        $this->food_categories_model->update_food_category($food_category_params);
        $this->session->set_flashdata('success_flag', TRUE);
        $this->session->set_flashdata('message', $category_name . ' has been successfully updated.');
        $this->session->set_flashdata('subject', 'Success');
        redirect('food_categories/edit_food_categories/' . encode_string($food_category_id));
              
    }

}