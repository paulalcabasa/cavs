<?php

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
      
       /*  $this->load->model('food_model');
        $this->load->model('inventory_item_model');
        $this->load->helper('encryption');
        $this->load->helper('string');
        $this->load->helper('date_formatter');*/
    }

    public function index(){
      echo "test";
    	//redirect('food_inventory');
  /*      $content['main_content'] = 'dashboard_view';
        $this->load->view('includes/template',$content);*/
       // redirect('login/logout');
       // $content['main_content'] = 'food_inventory/all_foods_view';
       //  $this->load->view('includes/template',$content);
    }

}