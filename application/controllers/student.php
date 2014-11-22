<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Student extends CI_Controller {

	
	
	public function __construct() {
		parent::__construct();
	}


	public function index(){
		$this->load->model('student_m');
		
		
		
		$data['q_sql']=$this->student_m->get_que();
		$data['s_sql']=$this->student_m->get_sol();
		$this->load->view("student/student_header");
		$this->load->view("student/student_dash",$data);
		

	}

	public function tutorial(){
		$this->load->model('student_m');
		
		
		
		$data['t_sql']=$this->student_m->get_tut();
		
		$this->load->view("student/student_header");
		$this->load->view("student/tutorial",$data);
		

	}
}
	