<?php

class Portal extends MY_Controller {

    private $person_id;

    public function __construct(){
        parent::__construct();
        $this->load->model('transaction_model');
        $this->load->model('person_model');
        $this->person_id = $this->session->userdata('person_id');
        $this->load->helper('encryption');
    }

    public function index(){
        $content['main_content'] = 'portal/transaction_history_view';
        $this->load->view('includes/template',$content);
    }

    public function transaction_history(){
        $this->load->helper('encryption');
        $this->load->helper('date_formatter');
        $content['main_content'] = 'portal/transaction_history_view';
        $this->load->view('includes/template',$content);
    }

    public function meal_allowance_history(){
        $this->load->helper('date_formatter');
        $this->load->helper('string');
        $person_detail = $this->person_model->get_person_details_by_category(
            "id",
            $this->person_id,
            $this->session->userdata('user_type_id')
        );
        $content['person_detail'] = $person_detail;
        $content['main_content'] = 'portal/meal_allowance_history_view';
        $this->load->view('includes/template',$content);
    }

     public function view_transaction(){
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

    public function dt_customer_transactions(){
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
            array( 
                'db' => 'total_amount', 
                'dt' => 1,
                'formatter' => function($d,$row){
                    return $d;
                }
            ),
            array( 'db' => 'transaction_date', 'dt' => 2),
            array( 
                'db' => 'transaction_id',
                'dt' => 3,
                'formatter' => function($d,$row){
                    $btn_data = "<a href='view_transaction/".encode_string($d)."'>View</a>";
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

        $where = "DATE(date_created) BETWEEN '".$start_date."' AND '".$end_date."' 
                  AND transaction_status = " . $status_id ."
                  AND person_id = " . $this->person_id;
    
        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }

    public function dt_person_meal_allowance(){
        $this->load->library('dt_ssp');
        $this->load->helper('encryption');
        $start_date = $this->uri->segment(3);
        $end_date = $this->uri->segment(4);
        $status_id = $this->uri->segment(5);
        
        // DB table to use
        $table = 'meal_allowance_v';
        // Table's primary key
        $primaryKey = 'meal_allowance_id';
        $columns = array(
            array( 'db' => 'meal_allowance_no','dt' => 0 ),
            array( 'db' => 'earned_by_no_of_days', 'dt' => 1),
            array( 
                'db' => 'alloted_amount',
                'dt' => 2,
                'formatter' => function($d, $row){
                    return number_format($d,2,'.',',');
                }
            ),
            array( 
                'db' => 'remaining_amount',
                'dt' => 3,
                'formatter' => function($d, $row){
                    return number_format($d,2,'.',',');
                }
            ),
            array( 'db' => 'validity_date', 'dt' => 4)
        );

        // SQL server connection information
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        $where = "DATE(orig_date_created) BETWEEN '".$start_date."' AND '".$end_date."' 
                  AND status_id = " . $status_id ."
                  AND person_id = " . $this->person_id;
    
        echo json_encode(
            DT_ssp::complex( $_GET, $sql_details, $table, $primaryKey, $columns,$where)
        );
    }

}