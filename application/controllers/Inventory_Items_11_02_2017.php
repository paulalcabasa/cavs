<?php

class Inventory_Items extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('inventory_item_model');
	$this->load->helper('encryption');
    }

    public function index(){
        $content['main_content'] = 'inventory_items/all_inventory_items';
        $this->load->view('includes/template',$content);
    }

    public function dt_get_inventory_items(){
        $this->load->library('dt_ssp');
        
        $this->load->helper('string');
        // DB table to use
        $table = 'inventory_items_v';
        // Table's primary key
        $primaryKey = 'inventory_item_id';
        $columns = array(
            array( 'db' => 'inventory_item_no', 'dt' => 'inventory_item_no' ),
            array( 'db' => 'item_name',  'dt' => 'item_name' ),
            array( 'db' => 'remaining_quantity',  'dt' => 'remaining_quantity' ),
            array( 'db' => 'unit_of_measure',  'dt' => 'unit_of_measure' ),
            array( 
                'db' => 'inventory_item_id',   
                'dt' => 'item_stock',
                'formatter' => function( $d, $row ) {
                    
                     $btn_data = '<a href="inventory_items/all_inventory_items_stock/'.encode_string($d).'" data-state_id="4"><i class="fa fa-edit fa-1x"></i></a>';
                    return $btn_data;
                }
            ),
            array( 
                'db' => 'inventory_item_id',   
                'dt' => 'edit_item',
                'formatter' => function( $d, $row ) {
                    
                     $btn_data = '<a href="inventory_items/edit_item/'.encode_string($d).'" data-state_id="4"><i class="fa fa-edit fa-1x"></i></a>';
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

    public function new_item(){
        $content['main_content'] = 'inventory_items/new_item';
        $this->load->view('includes/template',$content);
    }

    public function save_new_inventory_item(){

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'item_name',
                'label' => 'Item Name',
                'rules' => 'trim|required|callback_check_item_exist',
                'errors' => array(
                    'check_item_exist' => 'Item name already exists.',
                ) 
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            $this->new_item(); // load new employee view and display errors
        }
        else {
            $item_name = $this->input->post('item_name');
            $create_user = $this->session->userdata('user_id');
            $item_params = array(
                $item_name,
                $create_user
            );
            $this->inventory_item_model->insert_inventory_items($item_params);
            $this->session->set_flashdata('success_flag', TRUE);
            $this->session->set_flashdata('message', $item_name . ' has been successfully added.');
            $this->session->set_flashdata('subject', 'Success');
            redirect('inventory_items/new_item');
        }
    }

    public function edit_item(){
        $this->load->helper('encryption');
        $this->load->model('system_model');
        $inventory_item_id = decode_string($this->uri->segment(3));
        $inventory_item_details = $this->inventory_item_model->get_inventory_item_details($inventory_item_id);
        $status_list = $this->system_model->get_status();
        $content['main_content'] = 'inventory_items/edit_item';
        $content['inventory_item_details'] = $inventory_item_details;
        $content['status_list'] = $status_list;
        $this->load->view('includes/template',$content);
    }

    public function update_inventory_item(){
        $this->load->library('form_validation');
        $this->load->helper('encryption');
        $item_name = $this->input->post('item_name');
        $inventory_item_id = $this->input->post('inventory_item_id');
        $status_id = $this->input->post('status');
        $create_user = $this->session->userdata('user_id');
        $inventory_item_params = array(
            $item_name,
            $status_id,
            $create_user,
            $inventory_item_id
        );
        $this->inventory_item_model->update_inventory_item($inventory_item_params);
        $this->session->set_flashdata('success_flag', TRUE);
        $this->session->set_flashdata('message', 'Inventory item has been successfully updated.');
        $this->session->set_flashdata('subject', 'Success');
        redirect('inventory_items/edit_item/' . encode_string($inventory_item_id));              
    }

    public function all_inventory_items_stock(){
        $this->load->helper('encryption');

        $inventory_item_id_enc = $this->uri->segment(3);
        $inventory_item_id = decode_string($inventory_item_id_enc);
        $inventory_item_details = $this->inventory_item_model->get_inventory_item_details($inventory_item_id);
        
        // added as of August 28, 2017
        $remaining_qty_summary = $this->inventory_item_model->get_inventory_item_stock_summary($inventory_item_id);
        

        $content['main_content'] = 'inventory_items/all_inventory_items_stock';
        $content['inventory_item_id'] = $inventory_item_id;
        $content['inventory_item_id_enc'] = $inventory_item_id_enc;
        $content['inventory_item_details'] = $inventory_item_details;
        $content['remaining_qty_summary'] = $remaining_qty_summary;
        $this->load->view('includes/template',$content);
    }

    public function dt_get_inventory_item_stock(){
        $this->load->library('dt_ssp');
        $this->load->helper('encryption');
        $this->load->helper('string');
        $inventory_item_id = $this->uri->segment(3);
        // DB table to use
        $table = 'inventory_item_stock_v';
        // Table's primary key
        $primaryKey = 'stock_id';
        $columns = array(
            array( 'db' => 'stock_no', 'dt' => 'stock_no' ),
            array( 'db' => 'initial_quantity',  'dt' => 'initial_quantity' ),
            array( 'db' => 'remaining_quantity',  'dt' => 'remaining_quantity' ),
            array( 'db' => 'unit_cost',  'dt' => 'unit_cost' ),
            array( 'db' => 'unit_of_measure',  'dt' => 'unit_of_measure' ),
            array( 'db' => 'supplier_name',  'dt' => 'supplier_name' ),
            array( 'db' => 'purchase_date',  'dt' => 'purchase_date' ),
            array( 'db' => 'status',  'dt' => 'status' ),
            array( 
                'db' => 'stock_id',
                'dt' => 'actions',
                'formatter' => function($d,$row){
                    $btn_data = "";
                 
                    if($row['status'] != 'Cancelled'){
                        $btn_data = '<div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">';
                                        if($row['status'] == 'New'){
                                            $btn_data .= '<li><a href="../edit_item_stock/'.encode_string($d).'">Edit</a></li>
                                                          <li><a href="#" class="btn_update_status" data-stock_id='.$d.' data-status_id="6">Finalize</a></li>
                                                          <li><a href="#" class="btn_update_status" data-stock_id='.$d.' data-status_id="7">Cancel</a></li> ';
                                        }
                                        else if($row['status'] == 'Finalized'){
                                            $btn_data .= '<li><a href="#" data-stock_id="'.$d.'" class="btn_set_current">Set as current stock</a></li>';
                                        }                                 
                        $btn_data .= '</ul></div>';
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
        $where = "inventory_item_id = " . $inventory_item_id;
        $arr = DT_ssp::complex($_GET, $sql_details, $table, $primaryKey, $columns,$where);
        $arr['data'] = convert_to_utf8($arr['data']);
        echo json_encode($arr);
    }

    public function new_item_stock(){
        $this->load_new_item_stock_page($this->uri->segment(3));
    }

    public function load_new_item_stock_page($inventory_item_id_enc){
        $this->load->helper('encryption');
        $this->load->model('unit_of_measure_model');
        $this->load->model('supplier_model');
        $inventory_item_id = decode_string($inventory_item_id_enc);
        $inventory_item_details = $this->inventory_item_model->get_inventory_item_details($inventory_item_id);
        $uom_list = $this->unit_of_measure_model->get_uom_list();
        $supplier_list = $this->supplier_model->get_suppliers_list();
        $content['inventory_item_id'] = $inventory_item_id;
        $content['inventory_item_id_enc'] = $inventory_item_id_enc;
        $content['inventory_item_details'] = $inventory_item_details;
        $content['uom_list'] = $uom_list;
        $content['supplier_list'] = $supplier_list;
        $content['main_content'] = 'inventory_items/new_item_stock';
        $this->load->view('includes/template',$content);
    }


    public function save_new_item_stock(){
       // var_dump($_POST);
     //   die();
        $inventory_item_id = $this->input->post('inventory_item_id');
        $this->load->library('form_validation');
        $this->load->helper('encryption');

        $config = array(
            array(
                'field' => 'quantity',
                'label' => 'Quantity',
                'rules' => 'trim|required'   
            ),
            array(
                'field' => 'unit_cost',
                'label' => 'Unit Cost',
                'rules' => 'trim|required'   
            ),
            array(
                'field' => 'date_of_purchase',
                'label' => 'Date of Purchase',
                'rules' => 'trim|required'   
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE){
            //$this->new_item_stock(); // load new employee view and display errors
          $this->load_new_item_stock_page(encode_string($inventory_item_id));
     //       redirect('new_item_stock/' . encode_string($inventory_item_id));

        }
        else {
            $quantity = $this->input->post('quantity');
            $unit_of_measure = $this->input->post('unit_of_measure');
            $unit_cost = $this->input->post('unit_cost');
            $supplier = $this->input->post('supplier');
            $date_of_purchase = $this->input->post('date_of_purchase');
            $create_user = $this->session->userdata('user_id');
            $status_flag = $this->input->post('finalized_flag') == 1 ? 6 : 5;
            $current_stock_flag = $this->input->post('current_stock_flag');
            $item_stock_params = array(
                $inventory_item_id,
                $supplier,
                $quantity, // initial quantity
                $quantity, // remaining quantity
                $unit_of_measure,
                $unit_cost,
                $status_flag,
                $date_of_purchase,
                $create_user
            );
            $stock_id = $this->inventory_item_model->insert_inventory_items_stock($item_stock_params);
            if($current_stock_flag == 1){
                 $item_stock_params = array(
                    $stock_id,
                    $create_user,
                    $inventory_item_id
                );
                $this->inventory_item_model->assign_stock_to_item($item_stock_params);
            }
            $this->session->set_flashdata('success_flag', TRUE);
            $this->session->set_flashdata('message', 'Item has been successfully added.');
            $this->session->set_flashdata('subject', 'Success');
            redirect('inventory_items/new_item_stock/' . encode_string($inventory_item_id));
        }
    }

    public function edit_item_stock(){
        $this->load->helper('encryption');
        $this->load->model('unit_of_measure_model');
        $this->load->model('supplier_model');
        $stock_id = decode_string($this->uri->segment(3));
        $stock_details = $this->inventory_item_model->get_inventory_item_stock_details($stock_id);
        $uom_list = $this->unit_of_measure_model->get_uom_list();
        $supplier_list = $this->supplier_model->get_suppliers_list();
        $disp_purchase_date = $stock_details[0]->purchase_date;
     
        if($disp_purchase_date != "" || $disp_purchase_date != null){
            $disp_purchase_date = new DateTime($disp_purchase_date);
            $disp_purchase_date =  $disp_purchase_date->format('m/d/Y');
        }
        $content['stock_details'] = $stock_details;
        $content['uom_list'] = $uom_list;
        $content['supplier_list'] = $supplier_list;
        $content['disp_purchase_date'] = $disp_purchase_date;
       
        $content['main_content'] = 'inventory_items/edit_item_stock';
        $this->load->view('includes/template',$content);
    }

    public function update_item_stock(){
        $this->load->helper('encryption');
        $stock_id = $this->input->post('stock_id');
        $quantity = $this->input->post('quantity');
        $unit_cost = $this->input->post('unit_cost');
        $unit_of_measure = $this->input->post('unit_of_measure');
        $supplier = $this->input->post('supplier');
        $date_of_purchase = $this->input->post('date_of_purchase');
        $create_user = $this->session->userdata('user_id');
        $item_stock_params = array(
            $supplier,
            $quantity, // initial quantity
            $quantity, // remaining quantity
            $unit_of_measure,
            $unit_cost,
            $date_of_purchase,
            $create_user,
            $stock_id
        );

        $this->inventory_item_model->update_item_stock($item_stock_params);
        $this->session->set_flashdata('success_flag', TRUE);
        $this->session->set_flashdata('message', 'Item has been successfully updated.');
        $this->session->set_flashdata('subject', 'Success');
        redirect('inventory_items/edit_item_stock/' . encode_string($stock_id));
    }


    public function ajax_update_item_stock_status(){
        $stock_id = $this->input->post('stock_id');
        $status = $this->input->post('status');
        $create_user = $this->session->userdata('user_id');
        $item_stock_params = array(
            $status,
            $create_user,
            $stock_id
        );
        $this->inventory_item_model->update_item_stock_status($item_stock_params);
    }

    public function ajax_update_item_stock(){
        $this->load->helper('encryption');
        $stock_id = $this->input->post('stock_id');
        $inventory_item_id = $this->input->post('inventory_item_id');
        $create_user = $this->session->userdata('user_id');
        $item_stock_params = array(
            $stock_id,
            $create_user,
            $inventory_item_id
        );
        $this->inventory_item_model->assign_stock_to_item($item_stock_params);

    }

    public function check_item_exist(){
        return $this->inventory_item_model->check_item_exist($this->input->post('item_name'));
    }
    
}