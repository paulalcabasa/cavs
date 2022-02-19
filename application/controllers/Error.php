<?php

class Error extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	
	public function index(){
        $this->load->view('errors/custom/error_404.php');
	}
}