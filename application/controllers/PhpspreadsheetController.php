<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PhpspreadsheetController extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('encryption');
        $this->load->model('Person_model', 'person_model');
        $this->load->helper('date_formatter');
        
        $this->load->model('User_model', 'user_model');
        $this->load->model('System_model', 'system_model');
        $this->load->model('Stockholder_model', 'stockholder_model');
    }

    public function index(){
        $this->load->view('spreadsheet');
    }

    public function export(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        $writer = new Xlsx($spreadsheet);
        $filename = 'name-of-the-generated-file';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
    }

    public function create_admin() {
        $user_id = $this->user_model->add_user(
            'admin', // username
            '1234' // password
        );

        $new_person_params = array(
            $user_id,
            3,
            'SYSAD',
            'Admin',
            '',
            'System',
            '',
            '',
            '',
            '',
            '',
            '',
            -1
        );

        $this->person_model->add_person($new_person_params);

        echo 'Admin has been created';
    }
    
    public function import(){
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $xls_file = './files/employees/cavs_employees.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($xls_file);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

        
        echo "<table class='table' border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Person Type</th>
                <th>Employee No</th>
                <th>Barcode No</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Employee Image Filename</th>
                <th>Department ID</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>";

        for ($row = 1; $row <= $highestRow; $row++) {
            if($row > 4) {
       
                // fetch employee data
                $no = "";
                $person_type = "";
                $employee_no = "";
                $barcode_no = "";
                $first_name = "";
                $middle_name = "";
                $last_name = "";
                $address = "";
                $contact_no = "";
                $employee_image_filename = "";
                $department_id = "";
                $meal_allowance_rate = "";

                for ($col = 1; $col <= $highestColumnIndex; $col++) {
                    $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();    
                    
                    if($col == 1) {
                        $no = $value;
                    }
                    else if($col == 2) {
                        $employee_no = $value;
                        $barcode_no = $employee_no;
                    }
                    else if($col == 3) {
                        $last_name = $value;
                    }
                    else if($col == 4) {
                        $first_name = $value;
                    }
                    else if($col == 5) {    
                        $middle_name = $value;
                    }
                    else if($col == 7) {    
                        $department_id = $value;
                    }
                    else if($col == 8) {    
                        $person_type = $value;
                    }
                    else if($col == 9) {    
                        $meal_allowance_rate = $value;
                    }
                }
        
                // prepare parameterse

                 // check flag for employee no
                $is_employee_no_exist = $this->validate_employee_no(trim($employee_no));
                // check flag for barcode no
                $is_barcode_no_exist = $this->validate_barcode_no(trim($barcode_no));

                 // add person if the employee no and barcode no does not exist
                if($is_employee_no_exist && $is_barcode_no_exist){

                
                    echo "<tr>
                            <td>".$no."</td>
                            <td>".$person_type."</td>
                            <td>".$employee_no."</td>
                            <td>".$barcode_no."</td>
                            <td>".$first_name."</td>
                            <td>".$middle_name."</td>
                            <td>".$last_name."</td>
                            <td>".$address."</td>
                            <td>".$contact_no."</td>
                            <td>".$employee_image_filename."</td>
                            <td>".$department_id."</td>
                            <td>Success</td>
                        </tr>";

                        $user_id = $this->user_model->add_user(
                            $employee_no,
                            $employee_no
                        );

                    $employee_image_filename = $employee_image_filename != "" ? $employee_image_filename : "default.jpg"; 
                        // if employee is being added
                        if(strtoupper(trim($person_type)) == 'EMPLOYEE'){
                            $person_type_id = 1; // default ID of employee type in persons table
                            $new_person_params = array(
                                $user_id,
                                $person_type_id,
                                $employee_no,
                                $first_name,
                                $middle_name,
                                $last_name,
                                $address,
                                $contact_no,
                                $employee_image_filename,
                                $meal_allowance_rate,
                                $barcode_no,
                                $department_id,
                                -1
                            );
                        }
                        else if(strtoupper(trim($person_type)) == 'CORE STOCKHOLDER') {
                            $person_type_id = 8; // default ID of employee type in persons Table
                            $new_person_params = array(
                                $user_id,
                                $person_type_id,
                                $employee_no,
                                $first_name,
                                $middle_name,
                                $last_name,
                                $address,
                                $contact_no,
                                $employee_image_filename,
                                null, // meal allowance rate
                                $barcode_no,
                                null,
                                $create_user
                            );
                        }
                        else {
                            // if person type is wrong
                            $person_type_id = 15;
                            $new_person_params = array(
                                $user_id,
                                $person_type_id,
                                $employee_no,
                                $first_name,
                                $middle_name,
                                $last_name,
                                $address,
                                $contact_no,
                                $employee_image_filename,
                                $meal_allowance_details[0]->config_value,
                                $barcode_no,
                                $department_id,
                                $create_user
                            );
                        }

                        $this->person_model->add_person($new_person_params);
                    }
                    else {
                        $employee_no_message = $is_employee_no_exist ? "" : ":This employee no already exist.";
                        $barcode_no_message = $is_barcode_no_exist ? "" : ":This barcode no already exist.";
                        echo "<tr style='background-color:red;'>
                                <td>".$no."</td>
                                <td>".$person_type."</td>
                                <td>".$employee_no . $employee_no_message ."</td>
                                <td>".$barcode_no . $barcode_no_message ."</td>
                                <td>".$first_name ."</td>
                                <td>".$middle_name."</td>
                                <td>".$last_name."</td>
                                <td>".$address."</td>
                                <td>".$contact_no."</td>
                                <td>".$employee_image_filename."</td>
                                <td>".$department_id."</td>
                                <td>Error</td>
                            </tr>";
                    }

                }
        }
        echo '</table>' . PHP_EOL;
  
    
    }

    public function validate_employee_no($employee_no){
        return $this->person_model->check_employee_no_existence($employee_no);
    }

    public function validate_barcode_no($barcode_no){
        return $this->person_model->check_barcode_no_existence($barcode_no);
    }
}