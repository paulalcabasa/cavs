<?php

class TransactionList extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Food_model', 'food_model');
        $this->load->model('Transaction_model', 'transaction_model');
        $this->load->model('Person_model', 'person_model');
        $this->load->helper('date_formatter');
        $this->load->helper('encryption');
    }

    public function index(){
        $this->load->library('pagination');

        $date = trim((string) $this->input->get('transaction_date', true));
        $customer_name = trim((string) $this->input->get('customer_name', true));
        $customer_type = (int) $this->input->get('customer_type', true);
        $status = trim((string) $this->input->get('status', true));
        $page = max(0, (int) $this->input->get('page', true));
        $date_start = '';
        $date_end = '';

        $date_object = DateTime::createFromFormat('!Y-m-d', $date);
        if ($date_object && $date_object->format('Y-m-d') === $date) {
            $date_start = $date_object->format('Y-m-d 00:00:00');
            $date_end = $date_object->modify('+1 day')->format('Y-m-d 00:00:00');
        } else {
            $date = '';
        }

        $filters = array(
            'date_start' => $date_start,
            'date_end' => $date_end,
            'customer_name' => $customer_name,
            'customer_type' => $customer_type,
            'status' => $status
        );
        $per_page = 10;
        $total_rows = $this->transaction_model->count_transaction_headers($filters);
        $content['transactions'] = $this->transaction_model->get_transaction_headers($filters, $per_page, $page);
        $content['customer_types'] = $this->transaction_model->get_customers_category();

        $this->pagination->initialize(array(
            'base_url' => site_url('transactions'),
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'page_query_string' => true,
            'query_string_segment' => 'page',
            'reuse_query_string' => true,
            'use_page_numbers' => false,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => false,
            'prev_link' => false,
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'first_tag_open' => '<li class="pagination-first">',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li class="pagination-last">',
            'last_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>'
        ));

        $content['pagination_links'] = $this->pagination->create_links();
        $content['transaction_date'] = $date;
        $content['customer_name'] = $customer_name;
        $content['customer_type'] = $customer_type;
        $content['status'] = $status;
        $content['total_rows'] = $total_rows;
        $content['main_content'] = "transactions/transaction_list";
        $this->load->view("includes/template",$content);
    }
}