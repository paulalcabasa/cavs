<?php

class Test_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function test_insert(){
		$sql = "INSERT INTO test_cron VALUES(1,'test',NOW())";
		$this->db->query($sql);
		
	}

}