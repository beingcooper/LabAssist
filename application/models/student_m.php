<?php

Class Student_m extends CI_Model{


	function __construct(){
		parent::__construct();
	}

	
	public function get_que(){
		$this->db->where('selected',1);
		$q_sql=$this->db->get('ques');
		return $q_sql;
	}
	public function get_sol(){
		$this->db->where('selected',1);
		$s_sql=$this->db->get('solution');
		return $s_sql;
	}
	public function get_tut(){
		
		$t_sql=$this->db->get('tutorial');
		return $t_sql;
	}
	
}