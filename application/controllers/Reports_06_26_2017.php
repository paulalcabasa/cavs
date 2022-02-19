<?php

class Reports extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('reports_model');
        $this->load->model('food_model');
        $this->load->model('transaction_model');
    }

    public function index(){
    }

    /* SALES REPORT DETAILED */
    public function sales_report_detailed(){
        $customer_list = $this->transaction_model->get_customers_category();
        $content['customer_list'] = $customer_list;
        $content['main_content'] = 'reports/sales_report_detailed';
        $this->load->view('includes/template',$content);
    }

    public function generate_sales_report_detailed($start_date,$end_date,$customer_type,$customer_detail){
        $data = '<table border="1" cellpadding="3" style="font-size:9px;">
                        <thead>
                            <tr>
                                <th>Transaction No.</th>
                                <th>Customer Type</th>
                                <th>Customer Name</th>
                                <th>Food Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>';
        $params = array(
            $start_date,
            $end_date,
            $customer_type,
            $customer_detail
        );
        $report_data = $this->reports_model->generate_sales_report_detailed($params);
        $total_sales = 0;
        foreach($report_data as $row){
            $data .= '<tr>
                            <td>'.$row->transaction_no.'</td>
                            <td>'.$row->customer_type.'</td>
                            <td>'.$row->customer_name.'</td>
                            <td>'.$row->food_name.'</td>
                            <td>'.$row->unit_price.'</td>
                            <td>'.$row->quantity.'</td>
                            <td>'.$row->amount.'</td>
                            <td>'.$row->transaction_date.'</td>
                      </tr>';
            $total_sales += $row->amount;
        }
        $data .=  '<tr>
                <th colspan="6" align="right">Total Sales</th>
                <th colspan="2">'.number_format($total_sales,2,'.',',').'</th>
              </tr>
              </tbody></table>';
        return $data;
    }

    public function sales_report_detailed_pdf(){

        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $customer_type = $this->input->post('customer_type');
        $customer_detail = $this->input->post('customer_detail',true);
        $report_title = "Detailed Sales Report";
        $report_content = $this->generate_sales_report_detailed($start_date,$end_date,$customer_type,$customer_detail);
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Sales Report');
        $pdf->SetSubject('Sales Report');
        $pdf->SetKeywords('Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('sales_report'.date('YmdHis').'.pdf', 'I');
    }

    /* END OF SALES REPORT */

    public function sales_report(){
        $customer_list = $this->transaction_model->get_customers_category();
        $content['customer_list'] = $customer_list;
        $content['main_content'] = 'reports/sales_report';
        $this->load->view('includes/template',$content);
    } 

    public function sales_report_pdf(){

        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $customer_type = $this->input->post('customer_type');
        $customer_detail = $this->input->post('customer_detail',true);
        $report_title = "Sales Report";
        $report_content = $this->generate_sales_report($start_date,$end_date,$customer_type,$customer_detail);
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Sales Report');
        $pdf->SetSubject('Sales Report');
        $pdf->SetKeywords('Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('sales_report'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_sales_report($start_date,$end_date,$customer_type,$customer_detail){
        $data = '<table border="1" cellpadding="3" style="font-size:9px;">
                        <thead>
                            <tr>
                                <th>Transaction No.</th>
                                <th>Customer Type</th>
                                <th>Customer Name</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>';
        $params = array(
            $start_date,
            $end_date,
            $customer_type,
            $customer_detail
        );
        $report_data = $this->reports_model->generate_sales_report($params);
        $total_sales = 0;
        foreach($report_data as $row){
            $data .= '<tr>
                            <td>'.$row->transaction_no.'</td>
                            <td>'.$row->customer_type.'</td>
                            <td>'.$row->customer_name.'</td>
                            <td>'.$row->total_amount.'</td>
                            <td>'.$row->transaction_date.'</td>
                      </tr>';
            $total_sales += $row->total_amount;
        }
        $data .=  '<tr>
                <th colspan="3" align="right">Total Sales</th>
                <th colspan="2">'.number_format($total_sales,2,'.',',').'</th>
              </tr>
              </tbody></table>';
        return $data;
    }


    public function cost_vs_sales_report(){
        $this->load->helper('encryption');
        $this->load->helper('string');
        $food_id = decode_string($this->uri->segment(3));
        $food_details = $this->food_model->get_food_details($food_id);
        $food_image = $this->food_model->get_latest_food_image($food_id);
        $food_ingredients = $this->food_model->get_food_ingredients($food_id);
        $food_sales_list = $this->reports_model->get_sales_per_item_report($food_id);
        $food_adjustments_list = $this->food_model->get_food_qty_adjustments($food_id);
        if(empty($food_image)){
            $food_image = "default_food_image.png";
        }
        else {
            $food_image = $food_image[0]->filename;
        }
        $content['main_content'] = 'reports/cost_vs_sales_report';
        $content['food_no'] = format_food_id($food_details[0]->id);
        $content['food_details'] = $food_details;
        $content['food_image'] = $food_image;
        $content['food_ingredients'] = $food_ingredients;
        $content['food_sales_list'] = $food_sales_list;
        $content['food_adjustments_list'] = $food_adjustments_list;

        $this->load->view('includes/template',$content);
    }

    public function cost_vs_sales_summary_report(){
        $content['main_content'] = 'reports/cost_vs_sales_summary_report';
        $this->load->view('includes/template',$content);
    }

    public function generate_cost_vs_sales_summary_report($start_date,$end_date){
        $params = array($start_date,$end_date);
        $report_data = $this->reports_model->get_cost_vs_sales_summary_report($params);
        $total_sales = 0;
        $total_revenue = 0;
        $total_expected_revenue = 0;
        $total_cost = 0;
        $total_actual_revenue = 0;
        $data = '<table border="1" cellpadding="3">
                            <thead>
                                <tr>
                                    <th colspan="5" align="center">Food Details</th>
                                    <th align="center" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cost</th>
                                    <th colspan="3" align="center">Sales</th>  
                                    <th colspan="2" align="center">Revenue</th>  
                                </tr>
                                <tr>
                                    <th>Food No.</th>
                                    <th>Food Name</th>
                                    <th>Date Created</th>
                                    <th>Mark up</th>
                                    <th>Initial Quantity</th>
                                    <th>Sold Quantity</th>
                                    <th>Remaining Quantity</th>
                                    <th>Total Sales</th>
                                    <th>Expected Revenue</th>
                                    <th>Actual Revenue</th>
                                </tr>
                            </thead>
                            <tbody>';
        foreach($report_data as $row){
            $mark_up = number_format($row->mark_up_value,2,'.',',') . " (" . $row->mark_up_percentage ."%)";
            $data .= '<tr>
                        <td>'.$row->food_no.'</td>
                        <td>'.$row->food_name.'</td>
                        <td>'.$row->date_created.'</td>
                        <td>'.$mark_up.'</td>
                        <td>'.$row->initial_quantity.'</td>
                        <td>'.$row->total_food_cost.'</td>
                        <td>'.$row->sold_quantity.'</td>
                        <td>'.$row->quantity.'</td>
                        <td>'.$row->total_sales.'</td>
                        <td>'.$row->expected_revenue.'</td>
                        <td>'.$row->actual_revenue.'</td>
                      </tr>';
            $total_sales += $row->total_sales;
            $total_actual_revenue += $row->actual_revenue;
            $total_expected_revenue += $row->expected_revenue;
            $total_cost += $row->total_food_cost;
        }
        $data .= '<tr>
                    <th colspan="5" align="right">Total</th>
                    <th>'.number_format($total_cost,2,'.',',').'</th>
                    
                    <th></th>
                    <th></th>

                    <th>'.number_format($total_sales,2,'.',',').'</th>
                    <th>'.number_format($total_expected_revenue,2,'.',',').'</th>
                    <th>'.number_format($total_actual_revenue,2,'.',',').'</th>
                  </tr>';

        $data .= '</tbody>
                        </table>';
        return $data;
    }

    public function cost_vs_sales_summary_report_pdf(){

        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
       
        $report_title = "Cost Vs Sales Summary Report";
        $report_content = $this->generate_cost_vs_sales_summary_report($start_date,$end_date);
        $pdf = new Pdf("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->setPageOrientation('L');
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Cost Vs Sales Report');
        $pdf->SetSubject('Cost Vs Sales Report');
        $pdf->SetKeywords('Cost Vs Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT - 5, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT - 5);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('cost_vs_sales_summary_report-'.date('YmdHis').'.pdf', 'I');
    }

    public function monthly_sales_report(){
        $content['main_content'] = 'reports/monthly_sales_report';
        $this->load->view('includes/template',$content);
    }

    public function annual_sales_report(){
        $content['main_content'] = 'reports/annual_sales_report';
        $this->load->view('includes/template',$content);
    }

    public function ajax_get_annual_sales_report(){
        $this->load->helper('string');
        $this->load->helper('date_formatter');
        $year = $this->input->post('year');
        $total_sales = 0;
        $total_expense = 0;
        $total_revenue = 0;
        for($i = 1; $i <= 12; $i++){
            $month = pad_zeros($i);
            $month_name = get_month_name($month);
            $sales_sum = $this->reports_model->get_sales_report_by_month_year($month,$year);
            $expense_sum = $this->reports_model->get_expense_report_by_month_year($month,$year);
            $revenue = $sales_sum - $expense_sum;
            echo "<tr>
                    <td>".$month_name."</td>
                    <td>".number_format($sales_sum,2,'.',',')."</td>
                    <td>".number_format($expense_sum,2,'.',',')."</td>
                    <td>".number_format($revenue,2,'.',',')."</td>
                  </tr>";
            $total_sales += $sales_sum;
            $total_expense += $expense_sum;
            $total_revenue += $revenue;
        }
        echo "<tr class='text-bold'>
                    <td>Total</td>
                    <td>".number_format($total_sales,2,'.',',')."</td>
                    <td>".number_format($total_expense,2,'.',',')."</td>
                    <td>".number_format($total_revenue,2,'.',',')."</td>
              </tr>";
    }

    public function inventory_item_report(){
        $content['main_content'] = 'reports/inventory_item_report';
        $this->load->view('includes/template',$content);
    }

    public function credits_ledger_report(){
        $this->load->model('person_model');
        $credits_ledger_list = $this->person_model->get_persons_with_credit();
        $content['main_content'] = 'reports/credits_ledger_report';
        $content['credits_ledger_list'] = $credits_ledger_list;
        $this->load->view('includes/template',$content);
    }

    public function billing_summary(){
        $customer_list = $this->transaction_model->get_customers_category();
        $content['customer_list'] = $customer_list;
        $content['main_content'] = 'reports/billing_summary';
        $this->load->view('includes/template',$content);
    }

    public function get_employee_stockholder_billing_summary($start_date,$end_date,$customer_type){
        $data = "";
        $alloted_amount_total = 0;
        $consumed_amount_total = 0;
        $data = '<table border="1" cellpadding="3">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th style="width:20%;">Employee No</th>
                            <th style="width:30%;">Name</th>
                            <th style="width:20%;">Alloted</th>
                            <th style="width:20%;">Consumed</th>
                        </tr>
                    </thead>
                    <tbody>';
        $ctr = 1;
        $billing_summary = $this->reports_model->get_employee_stockholder_billing_summary($start_date,$end_date,$customer_type);
     
        foreach($billing_summary as $row){
            $data .= '<tr nobr="true">
                          <td style="width:10%;">'.$ctr.'</td>
                          <td style="width:20%;">'.$row->employee_no.'</td>
                          <td style="width:30%;">'.$row->person_name.'</td>
                          <td style="width:20%;">'.number_format($row->alloted_amount,2,'.',',').'</td>
                          <td style="width:20%;">'.number_format($row->consumed_amount,2,'.',',').'</td>
                      </tr>';
            $ctr++;
            $alloted_amount_total += $row->alloted_amount;
            $consumed_amount_total += $row->consumed_amount;
        }

        $data .= '</tbody>
                  <tfoot>
                       <tr>
                           <td colspan="3" align="right">Total</td>
                           <td>'.number_format($alloted_amount_total,2,'.',',').'</td>
                           <td>'.number_format($consumed_amount_total,2,'.',',').'</td>
                       </tr>
                  </tfoot>
              </table>';

        return $data;
    }

    public function get_patient_billing_summary($start_date,$end_date){
        $data = "";
        $total_amount = 0;
        $data = '<table border="1" cellpadding="3">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:15%;">Patient\'s Name</th>
                            <th style="width:15%;">Bed/Rm #</th>
                            <th style="width:15%;">Category</th>
                            <th style="width:10%;">Meals Total</th>
                            <th style="width:20%;">Date</th>
                            <th style="width:20%;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>';
        $ctr = 1;
        $billing_summary = $this->reports_model->get_patient_billing_summary($start_date,$end_date);
     
        foreach($billing_summary as $row){
            $data .= '<tr nobr="true">
                          <td style="width:5%;">'.$ctr.'</td>
                          <td style="width:15%;">'.$row->patient_name.'</td>
                          <td style="width:15%;">'.$row->room_no.'</td>
                          <td style="width:15%;">'.$row->room_type.'</td>
                          <td style="width:10%;">'.number_format($row->total_amount,2,'.',',').'</td>
                          <td style="width:20%;">'.$row->date_created.'</td>
                          <td style="width:20%;">'.$row->remarks.'</td>
                      </tr>';
            $ctr++;
            $total_amount += $row->total_amount;
        }

        $data .= '</tbody>
                  <tfoot>
                       <tr>
                           <td colspan="5" align="right">Total</td>
                           <td colspan="2" align="left">'.number_format($total_amount,2,'.',',').'</td>
                       </tr>
                  </tfoot>
              </table>';

        return $data;
    }

    public function get_mdi_billing_summary($start_date,$end_date){
        $data = "";
        $total_amount = 0;
        $data = '<table border="1" cellpadding="3">
                    <thead>
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:30%;">Name</th>
                            <th style="width:20%;">Amount</th>
                            <th style="width:20%;">Date</th>
                            <th style="width:25%;">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>';
        $ctr = 1;
        $billing_summary = $this->reports_model->get_mdi_billing_summary($start_date,$end_date);
     
        foreach($billing_summary as $row){
            $data .= '<tr nobr="true">
                          <td style="width:5%;">'.$ctr.'</td>
                          <td style="width:30%;">'.$row->customer_name.'</td>
                          <td style="width:20%;">'.number_format($row->total_amount,2,'.',',').'</td>
                          <td style="width:20%;">'.$row->date_created.'</td>
                          <td style="width:25%;">'.$row->remarks.'</td>
                      </tr>';
            $ctr++;
            $total_amount += $row->total_amount;
        }

        $data .= '</tbody>
                  <tfoot>
                       <tr>
                           <td colspan="3" align="right">Total</td>
                           <td colspan="2" align="left">'.number_format($total_amount,2,'.',',').'</td>
                       </tr>
                  </tfoot>
              </table>';

        return $data;
    }

    public function billing_summary_pdf(){
       
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $customer_type = $this->input->post('customer_type');
        $report_title = "";
        $report_content = "";
        if($customer_type == 1 || $customer_type == 8){ // if employee
            if($customer_type == 1){
                $report_title = "Employee Meal Allowance";
            }
            else if($customer_type == 8){
                $report_title = "Core Group Meal Allowance";
            }
            $report_content = $this->get_employee_stockholder_billing_summary($start_date,$end_date,$customer_type);
        }
        else if($customer_type == 12){
            $report_title = "Additional Billing - Patients";
            $report_content = $this->get_patient_billing_summary($start_date,$end_date);
        }
        else if($customer_type == 14){
            $report_title = "Additional Billing - NSMDIH";
            $report_content = $this->get_mdi_billing_summary($start_date,$end_date);
        }

        $this->load->library('pdf');
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Billing Summary');
        $pdf->SetSubject('Billing Summary');
        $pdf->SetKeywords('ezCMS, Billing');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('billing_summary'.date('YmdHis').'.pdf', 'I');
    }

  

    public function generate_monthly_sales_report($month,$year){
        $this->load->helper('string');
        $days_count = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $total_sales = 0;
        $total_expense = 0;
        $total_revenue = 0;

        $data = '<table border="1" cellpadding="3">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Sales</th>
                                <th>Food Costs</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>';
        for($i = 1; $i <= $days_count; $i++){
            $date = $year . '-' . $month . '-' . pad_zeros($i);
            $sales_sum = $this->reports_model->get_monthly_sales_report_sum($date);
            $expense_sum = $this->reports_model->get_monthly_expense_report_sum($date);
            $revenue = $sales_sum - $expense_sum;
            $data .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.number_format($sales_sum,2,'.',',').'</td>
                        <td>'.number_format($expense_sum,2,'.',',').'</td>
                        <td>'.number_format($revenue,2,'.',',').'</td>
                      </tr>';
            $total_sales += $sales_sum;
            $total_expense += $expense_sum;
            $total_revenue += $revenue;
        }
        $data .= '<tr>
                    <td>Total</td>
                    <td>'.number_format($total_sales,2,'.',',').'</td>
                    <td>'.number_format($total_expense,2,'.',',').'</td>
                    <td>'.number_format($total_revenue,2,'.',',').'</td>
              </tr>';

        $data .= '</tbody></table>';

      //  echo $data;
      //  die();
        return $data;
    }

    public function monthly_sales_report_pdf(){
        $this->load->library('pdf');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $month_name = $this->input->post('month_name');
        $report_title = "Sales Report for the Month of " . $month_name . " " . $year;
        $report_content = $this->generate_monthly_sales_report($month,$year);
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Monthly Sales Report');
        $pdf->SetSubject('Monthly Sales Report');
        $pdf->SetKeywords('Monthly Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Monthly Sales Report', $report_title);
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('monthly_sales_report-'.date('YmdHis').'.pdf', 'I');
    }

     public function generate_annual_sales_report($year){
        $this->load->helper('string');
        $this->load->helper('date_formatter');
        $total_sales = 0;
        $total_expense = 0;
        $total_revenue = 0;
        $data = '<table border="1" cellpadding="3">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Sales</th>
                                <th>Food Costs</th>
                                <th>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>';
        for($i = 1; $i <= 12; $i++){
            $month = pad_zeros($i);
            $month_name = get_month_name($month);
            $sales_sum = $this->reports_model->get_sales_report_by_month_year($month,$year);
            $expense_sum = $this->reports_model->get_expense_report_by_month_year($month,$year);
            $revenue = $sales_sum - $expense_sum;
            $data .= '<tr>
                        <td>'.$month_name.'</td>
                        <td>'.number_format($sales_sum,2,'.',',').'</td>
                        <td>'.number_format($expense_sum,2,'.',',').'</td>
                        <td>'.number_format($revenue,2,'.',',').'</td>
                      </tr>';
            $total_sales += $sales_sum;
            $total_expense += $expense_sum;
            $total_revenue += $revenue;
        }
        $data .= '<tr>
                    <td>Total</td>
                    <td>'.number_format($total_sales,2,'.',',').'</td>
                    <td>'.number_format($total_expense,2,'.',',').'</td>
                    <td>'.number_format($total_revenue,2,'.',',').'</td>
              </tr>';

        $data .= '</tbody></table>';

        return $data;
    }


    public function annual_sales_report_pdf(){
        $this->load->library('pdf');
        $year = $this->input->post('year');
        $report_title = "Sales Report for the Year of " . $year;
        $report_content = $this->generate_annual_sales_report($year);
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Annual Sales Report');
        $pdf->SetSubject('Annual Sales Report');
        $pdf->SetKeywords('Annual Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Annual Sales Report', $report_title);
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('annual_sales_report-'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_inventory_item_report($start_date,$end_date){
     
        $report_data = $this->reports_model->get_inventory_item_report($start_date,$end_date);
        $content = '<table border="1" cellpadding="3">
                        <thead>
                            <tr>
                                <th>Item No</th>
                                <th>Item Name</th>
                                <th>Amount</th>
                                <th>Unit of Measure</th>
                                <th>Unit Cost</th>
                                <th>Total Cost</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach($report_data as $data){
            $content .= '<tr>
                    <td>'.$data->item_no.'</td>
                    <td>'.$data->ingredient_name.'</td>
                    <td>'.$data->amount.'</td>
                    <td>'.$data->unit_of_measure.'</td>
                    <td>'.number_format($data->unit_cost,2,'.',',').'</td> 
                    <td>'.number_format($data->total_cost,2,'.',',').'</td>
                    <td>'.$data->date_created.'</td>
                  </tr>';
        }

        $content .= '</tbody>
                    </table>';

        return $content;
    }

    public function inventory_item_report_pdf(){
        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $report_title = "Inventory Item Report";
        $report_content = $this->generate_inventory_item_report($start_date,$end_date);
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Inventory Item Report');
        $pdf->SetSubject('Inventory Item Report');
        $pdf->SetKeywords('Inventory Item Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title, date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y'));
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('annual_sales_report-'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_items_onhand_report(){
        $report_data = $this->reports_model->get_inventory_items_onhand();
        $content = '<table border="1" cellpadding="3">
                        <thead>
                            <tr style="background-color:#ccc;">
                                <th>Stock No</th>
                                <th>Item Name</th>
                                <th>Initial Quantity</th>
                                <th>Remaining Quantity</th>
                                <th>Consumed Quantity</th>
                                <th>Unit of Measure</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach($report_data as $data){
            $content .= '<tr>
                            <td>'.$data->stock_no.'</td>
                            <td>'.$data->item_name.'</td>
                            <td>'.$data->initial_quantity.'</td>
                            <td>'.$data->remaining_quantity.'</td>
                            <td>'.($data->initial_quantity - $data->remaining_quantity).'</td>
                            <td>'.$data->unit_of_measure.'</td>
                          </tr>';
        }

        $content .= '</tbody>
                    </table>';

        return $content;
    }

    public function view_inventory_items_onhand(){
        $this->load->library('pdf');
        $report_title = "Inventory Items Onhand Report";
        $report_content = $this->generate_items_onhand_report();
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Inventory Item Report');
        $pdf->SetSubject('Inventory Item Report');
        $pdf->SetKeywords('Inventory Item Report');
        $pdf->SetHeaderData(
            PDF_HEADER_LOGO, 
            PDF_HEADER_LOGO_WIDTH, 
            $report_title, 
            "As of " . date_format(date_create(date('Y-m-d')),'F d, Y')
        );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('annual_sales_report-'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_food_items_onhand_report(){
        $report_data = $this->reports_model->get_food_sales_items_onhand();
        $content = '<table border="1" cellpadding="3">
                        <thead>
                            <tr style="background-color:#ccc;">
                                <th>Food No</th>
                                <th>Category</th>
                                <th>Food Name</th>
                                <th>Initial Quantity</th>
                                <th>Remaining Quantity</th>
                                <th>Sold Quantity</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach($report_data as $data){
            $content .= '<tr>
                            <td>'.$data->food_no.'</td>
                            <td>'.$data->category.'</td>
                            <td>'.$data->food_name.'</td>
                            <td>'.$data->initial_quantity.'</td>
                            <td>'.$data->remaining_quantity.'</td>
                            <td>'.$data->sold_quantity.'</td>
                      
                          </tr>';
        }

        $content .= '</tbody>
                    </table>';

        return $content;
    }

    public function view_food_items_onhand(){
        $this->load->library('pdf');
        $report_title = "Food Items Onhand Report";
        $report_content = $this->generate_food_items_onhand_report();
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
       
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Inventory Item Report');
        $pdf->SetSubject('Inventory Item Report');
        $pdf->SetKeywords('Inventory Item Report');
        $pdf->SetHeaderData(
            PDF_HEADER_LOGO, 
            PDF_HEADER_LOGO_WIDTH, 
            $report_title, 
            "As of " . date_format(date_create(date('Y-m-d')),'F d, Y')
        );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('annual_sales_report-'.date('YmdHis').'.pdf', 'I');
    }

    public function supplier_item_price(){
        $this->load->model('unit_of_measure_model');
        $this->load->model('inventory_item_model');
        $uom_list = $this->unit_of_measure_model->get_uom_list();
        $list_of_items = $this->inventory_item_model->get_inventory_items_list(); 
        $content['list_of_items'] = $list_of_items;
        $content['uom_list'] = $uom_list;
        $content['main_content'] = 'reports/supplier_item_price';
        $this->load->view('includes/template',$content);
    }

    public function generate_supplier_item_price($params,$uom){
        $report_data = $this->reports_model->get_supplier_item_price($params);
        $content = '<table border="1" cellpadding="3">
                        <thead>
                            <tr style="background-color:#ccc;">
                                <th>No.</th>
                                <th>Supplier Name</th>
                                <th>Price per ' . $uom . '</th>
                                <th>Quantity Purchased</th>
                                <th>Date of Purchase</th>
                            </tr>
                        </thead>
                        <tbody>';
        $ctr = 1;
        foreach($report_data as $data){

            $content .= '<tr>
                            <td>'.$ctr.'</td>
                            <td>'.$data->supplier_name.'</td>
                            <td>'.$data->price.'</td>
                            <td>'.$data->quantity.'</td>
                            <td>'.$data->purchase_date.'</td>
        
                          </tr>';
            $ctr++;
        }

        $content .= '</tbody>
                    </table>';

        return $content;
    }

    public function supplier_item_price_pdf(){
        $this->load->model('unit_of_measure_model');
        $this->load->model('inventory_item_model');
        $item_id = $this->input->post("item_name");
        $unit_of_measure_id = $this->input->post("unit_of_measure");
        $item_details = $this->inventory_item_model->get_inventory_item_details($item_id);
        $uom_details = $this->unit_of_measure_model->get_unit_of_measure_details($unit_of_measure_id);
        $params = array(
            $unit_of_measure_id,
            $unit_of_measure_id,
            $unit_of_measure_id,
            $item_id,
            $unit_of_measure_id
        );
        $report_content = $this->generate_supplier_item_price($params,$uom_details[0]->description);
           $report_title = "Supplier Item Price Report";
        $this->load->library('pdf');
        $pdf = new Pdf("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     
        // set document information
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Item Price  Report');
        $pdf->SetSubject('Item Price  Report');
        $pdf->SetKeywords('Item Price  Report');
        $pdf->SetHeaderData(
            PDF_HEADER_LOGO, 
            PDF_HEADER_LOGO_WIDTH, 
            $report_title, 
            "As of " . date_format(date_create(date('Y-m-d')),'F d, Y')
        );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('supplier_item_price-'.date('YmdHis').'.pdf', 'I');
    }

    public function inventory_expense_report(){
        $content['main_content'] = 'reports/inventory_expense_report';
        $this->load->view('includes/template',$content);
    }

    public function inventory_expense_report_pdf(){

        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
      
        $report_title = "Inventory Exepense Report";
        $report_content = $this->generate_inventory_expense_report_pdf($start_date,$end_date);
      
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Sales Report');
        $pdf->SetSubject('Sales Report');
        $pdf->SetKeywords('Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('sales_report'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_inventory_expense_report_pdf($start_date,$end_date){
        $data = '<table border="1" cellpadding="3" style="font-size:9px;">
                        <thead>
                            <tr>
                                <th>Expense No</th>
                                <th>Description Type</th>
                                <th>Category Name</th>
                                <th>Total Expense</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>';
        $params = array(
            $start_date,
            $end_date
        );
        $report_data = $this->reports_model->get_inventory_expense($params);
        $total = 0;
     
        foreach($report_data as $row){
            $data .= '<tr>
                            <td>'.$row->expense_no.'</td>
                            <td>'.$row->description.'</td>
                            <td>'.$row->category.'</td>
                            <td>'.$row->total_expense.'</td>
                            <td>'.$row->date_created.'</td>
                      
                      </tr>';
            $total += $row->total_expense;
        }
        $data .=  '<tr>
                <th  colspan="3" align="right">Total Expense</th>
                <th colspan="2">'.number_format($total,2,'.',',').'</th>
              </tr>
              </tbody></table>';
        return $data;
    }

    public function sales_report_by_payment_type(){
        $this->load->model('system_model');
        $modes_of_payment = $this->system_model->get_payment_modes();
        $content['modes_of_payment'] = $modes_of_payment;
        $content['main_content'] = 'reports/sales_report_by_payment_type';
        $this->load->view('includes/template',$content);
    } 

    public function sales_report_by_payment_type_pdf(){
        $this->load->library('pdf');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $payment_modes = $this->input->post('payment_modes');
        $report_title = "Sales Report by Payment Type";
        $report_content = $this->generate_sales_report_by_payment_type($start_date,$end_date,$payment_modes);
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('ezCMS');
        $pdf->SetTitle('Sales Report');
        $pdf->SetSubject('Sales Report');
        $pdf->SetKeywords('Sales Report');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $report_title ,date_format(date_create($start_date),'F d, Y') . ' - ' . date_format(date_create($end_date),'F d, Y') );
        // remove default header/footer
        //$pdf->setPrintHeader(false);date_create
        //$pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP - 3, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 9);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $pdf->writeHTML($report_content, true, false, true, false, '');

        //Close and output PDF document
        $pdf->Output('sales_report'.date('YmdHis').'.pdf', 'I');
    }

    public function generate_sales_report_by_payment_type($start_date,$end_date,$payment_modes){
       
        $payment_modes = explode(",",$payment_modes);
       
        $data = '<table border="1" cellpadding="3" style="font-size:9px;">
                        <thead>
                            <tr>
                                <th>Transaction No.</th>
                                <th>Customer Type</th>
                                <th>Customer Name</th>
                                <th>Mode of Payment</th>
                                <th>Amount</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>';
     
        $report_data = $this->reports_model->get_sales_report_per_payment_type($start_date,$end_date,$payment_modes);
        $total_sales = 0;
        foreach($report_data as $row){
            $data .= '<tr>
                            <td>'.$row->transaction_no.'</td>
                            <td>'.$row->customer_type.'</td>
                            <td>'.$row->customer_name.'</td>                    
                            <td>'.$row->mode_of_payment.'</td>
                            <td>'.$row->amount.'</td>
                            <td>'.$row->transaction_date.'</td>
                      </tr>';
            $total_sales += $row->amount;
        }
        $data .=  '<tr>
                <th colspan="4" align="right">Total Sales</th>
                <th colspan="2">'.number_format($total_sales,2,'.',',').'</th>
              </tr>
              </tbody></table>';
        return $data;
    }
    
}