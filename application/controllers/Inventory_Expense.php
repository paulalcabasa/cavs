<?php

class Inventory_Expense extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Food_model', 'food_model');
        $this->load->model('Inventory_Item_Model', 'inventory_item_model');
        $this->load->helper('encryption');
        $this->load->helper('string');
        $this->load->helper('date_formatter');
    }

    public function index(){
        $this->all_inventory_expenses();
    }

    public function all_inventory_expenses(){
        $pageNo = max(1, (int) $this->uri->segment(3));
        $statusId = (int) $this->input->get('status');
        if (!in_array($statusId, array(0, 5, 6, 2), true)) {
            $statusId = 0;
        }
        $search = trim((string) $this->input->get('search', TRUE));
        $recordsPerPage = 10;
        $params = array(
            'status_ids' => $statusId === 0 ? array() : array($statusId),
            'start_date' => null,
            'end_date' => null,
            'search' => $search,
            'limit' => $recordsPerPage,
            'offset' => ($pageNo - 1) * $recordsPerPage
        );
        $totalItems = $this->food_model->count_inventory_expenses($params);
        $totalPages = max(1, (int) ceil($totalItems / $recordsPerPage));
        $pageNo = min($pageNo, $totalPages);
        $params['offset'] = ($pageNo - 1) * $recordsPerPage;

        $content['expenses'] = $this->food_model->get_inventory_expenses_page($params);
        $content['pageNo'] = $pageNo;
        $content['totalPages'] = $totalPages;
        $content['totalItems'] = $totalItems;
        $content['statusId'] = $statusId;
        $content['search'] = $search;
        $content['baseUrl'] = base_url() . 'Inventory_Expense/all_inventory_expenses/';
        $content['main_content'] = 'inventory_expenses/all_inventory_expenses';
        $this->load->view('includes/template', $content);
    }

    public function view_details(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $food_id = decode_string($this->uri->segment(3));
        $food_details = $this->food_model->get_food_details($food_id);
        $food_image = $this->food_model->get_latest_food_image($food_id);
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        if(empty($food_image)){
            $food_image = "default_food_image.png";
        }
        else {
            $food_image = $food_image[0]->filename;
        }
        $content['main_content'] = 'inventory_expenses/view_details';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    }

    public function cancel_expense_item(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $food_id = decode_string($this->uri->segment(3));
        $food_details = $this->food_model->get_food_details($food_id);
        $food_image = $this->food_model->get_latest_food_image($food_id);
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        if(empty($food_image)){
            $food_image = "default_food_image.png";
        }
        else {
            $food_image = $food_image[0]->filename;
        }
        $content['main_content'] = 'inventory_expenses/cancel_expense_item';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $this->load->view('includes/template',$content);
    }  

    public function process_expense_cancellation(){
        $food_id = $this->input->post('food_id');
        $reason = $this->input->post('reason');
        $this->load->model('Inventory_Item_Model', 'inventory_item_model');
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        $transaction_status_id = 2;

        foreach($food_ingredients as $item){
            $remaining_quantity = $this->inventory_item_model->get_current_quantity($item->inventory_item_stock_id);
            $added_qty = $item->quantity;
            $new_qty = $remaining_quantity + $added_qty;
            $create_user = $this->session->userdata('user_id');
            $this->inventory_item_model->update_item_stock_quantity(
                $item->inventory_item_stock_id,
                $new_qty,
                $create_user
            );
        }

        $params = array(
                    $reason,
                    $create_user,
                    $transaction_status_id,
                    $food_id
                  );
        $this->food_model->cancel_food($params);

        redirect('inventory_expense/all_inventory_expenses');

    }

    public function update_food_state(){
        $food_id = $this->input->post('food_id');
        $transaction_state_id = $this->input->post('transaction_state_id');
        $update_user = $this->session->userdata('user_id');
        $params = array(
                    $transaction_state_id,
                    $update_user,
                    $food_id
                  );
        $this->food_model->update_food_transaction_state($params);
    }

 

}   