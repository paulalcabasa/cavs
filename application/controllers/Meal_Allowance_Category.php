<?php
class Meal_Allowance_Category extends MY_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('encryption');
        $this->load->model('Meal_Allowance_Category_model', 'meal_allowance_category_model');
        $this->load->helper('date_formatter');
	}

    public function index(){
      
        $categories = $this->meal_allowance_category_model->get_list();

        $content['main_content'] = 'meal_allowance_category/allowance_category_list';
        $content['categories'] = $categories;
        $this->load->view('includes/template',$content);
    }

    public function create(){
        $category = $this->input->post('category');
        $data = [
            'department_name' => $category['department_name'],
            'meal_allowance_rate' => $category['meal_allowance_rate'],
            'meal_allowance_start_time' => $category['meal_allowance_start_time'],
            'shift_hours' => $category['shift_hours'],
        ];
        $this->meal_allowance_category_model->insert($data);
        echo 'Succesfully added category.';
    }

    public function update(){
        $category = $this->input->post('category');
        $data = [
            'department_name' => $category['department_name'],
            'meal_allowance_rate' => $category['meal_allowance_rate'],
            'meal_allowance_start_time' => $category['meal_allowance_start_time'],
            'shift_hours' => $category['shift_hours'],
            'department_id' => $category['department_id'],
        ];
        $this->meal_allowance_category_model->update($data);
        echo 'Succesfully updated category.';
    }

}