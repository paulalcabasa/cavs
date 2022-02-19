<?php
class Cron extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('stockholder_model');
        $this->load->model('person_model');
        $this->load->model('system_model');
        // this controller can only be called from the command line
      //  if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
    }
 
    public function reload_stockholder_daily_allowance(){
        $stockholders_list = $this->stockholder_model->get_all_stockholder();
        $max_daily_allowance = $this->system_model->get_system_config(7);
        $meal_allowance_ids = array();
        $index = 0;
        foreach($stockholders_list as $row){
            if($row->meal_allowance_id != null){
                $meal_allowance_ids[$index] = $row->meal_allowance_id;
                $index++;
            }
        }
        $this->stockholder_model->reload_stockholder_max_daily_allowance($meal_allowance_ids,$max_daily_allowance[0]->config_value);
    }

    public function reload_stockholder_weekly_claims_count(){
        $stockholders_list = $this->stockholder_model->get_all_stockholder();
        $ma_weekly_claims_count = $this->system_model->get_system_config(8);
        $meal_allowance_ids = array();
        $index = 0;
        foreach($stockholders_list as $row){
            if($row->meal_allowance_id != null){
                $meal_allowance_ids[$index] = $row->meal_allowance_id;
                $index++;
            }
        }
        $this->stockholder_model->reload_stockholder_weekly_claims_count($meal_allowance_ids,$ma_weekly_claims_count[0]->config_value);
  
    }

    public function reload_stockholder_monthly_allowance(){
        $monthly_allowance = $this->system_model->get_system_config(9);
        $max_daily_allowance = $this->system_model->get_system_config(7);
        $ma_weekly_claims_count = $this->system_model->get_system_config(8);
        $stockholders_list = $this->stockholder_model->get_all_stockholder();
        $person_type_id = 8;
        $system_account_id = 208;
        
        $last_day = cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
        $valid_from = date('Y-m') . "-01";
        $valid_until = date('Y-m') . "-".$last_day;

        foreach($stockholders_list as $row){
            $meal_allowance_params = array(
                $row->person_id,
                $person_type_id, // stockholder person type id
                $row->barcode_value,
                0, // no of days - not applicable in stockholders
                0, // rate - not applicable for stockholders
                $monthly_allowance[0]->config_value, // alotted amount
                $monthly_allowance[0]->config_value, // remaining amount
                $max_daily_allowance[0]->config_value, // max allowance daily, applicable for stockholder only
                $ma_weekly_claims_count[0]->config_value, // weekly claims count, applicable for stockholder only
                $valid_from,
                $valid_until,
                $system_account_id
            );
            $this->person_model->insert_employee_meal_allowance($meal_allowance_params);
        }
    }

    public function backup_database(){
        // Load the DB utility class
        $this->load->dbutil();
        $prefs = array(
            'tables'        => array(),   // Array of tables to backup.
            'ignore'        => array(),                     // List of tables to omit from the backup
            'format'        => 'zip',                       // gzip, zip, txt
            'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            'newline'       => "\n"                         // Newline character used in backup file
        );
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);

        $filename = "db_backup_" . date('YmdHis') . ".zip";
        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file("C:/wamp64/www/nsmdih_cms/database/backups/" . $filename, $backup);  
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($filename, $backup);

    }


    public function clean_temp_transaction_tables(){
        $temp_lines_ctr = $this->system_model->count_temp_transaction_lines();
        if($temp_lines_ctr == 0){
            $this->system_model->truncate_temp_tables();
        }
    }
	
    public function test_cron(){
	
	$this->load->model('test_model');   
	$this->test_model->test_insert(); 

    }

}