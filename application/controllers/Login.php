<?php

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	private function is_logged_in(){
		$user_data = $this->session->userdata('user_id');
		if(isset($user_data)){
			/*redirect('dashboard');*/
			$user_type = $this->session->userdata('user_type_id');
			if($user_type == 6){ // dietitian
				redirect('food_inventory/all_food_sales');
			}
			if($user_type == 4){ // cashier
				redirect('transaction/new_transaction');
			}
			else if($user_type == 10){ // human resources
				redirect('employee');
			}
			else if($user_type == 3){ // administrator
				redirect('employee');
			}
			else if($user_type == 16){
				redirect('employee/credit_management'); // accounting
			}
			else if($user_type == 1 || $user_type == 8){ // employee
				redirect('portal/transaction_history');
			}
		}
	}

	public function index(){
		$this->is_logged_in();
		$data['message'] = null;
		$this->load->view('login_view.php',$data);
	}

	public function validate_credentials(){
		$this->load->model('User_model', 'user_model');

		$this->load->library('form_validation');
		$config = array(
	        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required',
                'errors' => array(
                        'required' => '* Please enter your username',
                ),
	        ),
	        // array(
            //     'field' => 'password',
            //     'label' => 'Password',
            //     'rules' => 'trim|required',
            //     'errors' => array(
            //             'required' => '* Please enter your password',
            //     )
	        // )
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else {
			$is_user = $this->user_model->validate_user($this->input->post('username'),$this->input->post('password'));
			
			
		
			if($is_user){
				$user_type = $this->session->userdata('user_type_id');
			
				if($user_type == 6){ // dietitian
					redirect('food_inventory/all_food_sales');
				}
				if($user_type == 4){ // cashier
					redirect('transaction/new_transaction');
				}
				else if($user_type == 10){ // human resources
					redirect('employee');
				}
				else if($user_type == 3){ // administrator
					redirect('employee');
				}
				else if($user_type == 16){
					redirect('employee/credit_management'); // accounting
				}
				else if($user_type == 1 || $user_type == 8){ // employee
					redirect('portal/transaction_history');
				}

			}
			else {
				$data['message'] = '<span class="text-danger">You have entered an incorrect username or password, please try again.</span>';
				$this->load->view('login_view.php',$data);
			}
		}
	}

	public function logout(){
		$user_data = $this->session->get_userdata();
		foreach($user_data as $key => $value){
			$this->session->unset_userdata($key);
		}
		header('login');
	}
}