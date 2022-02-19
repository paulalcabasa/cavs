<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$CI = & get_instance();
		$CI->load->library('session');
		$CI->load->helper('url');
		$CI->load->helper('form');
		$user_data = $this->session->userdata('user_id');

		if (!isset($user_data)){ 
			redirect('login');
		}
	}

	protected function resize_image($path, $file){
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path . $file;
        $config_resize['width'] = 512;
        $config_resize['height'] = 512;
        $this->load->library('image_lib',$config_resize);
        if (!$this->image_lib->resize()) {
            var_dump($this->image_lib->display_errors());
        }
    }
}