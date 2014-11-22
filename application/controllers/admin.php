<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends CI_Controller {

	
	protected $logged_in=0;
	public $data;
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}


	public function index(){

		if($this->session->userdata('login')==FALSE)
		{
			redirect("admin/login");
		}	
		$this->load->model('admin_m');
		
		$data['p']=NULL;
		//$data['p'] = nl2br(htmlentities($q_no, ENT_QUOTES, 'UTF-8'));
		
		$data['p']=$this->input->post('q_no');
		$data['buton']=$this->input->post('Buton');
		if($data['p']){
			
			if($data['buton']=="Delete"){
				$this->admin_m->del($data);
				redirect("admin/panel");

			}
			
			
			else if($data['buton']=="Upload"){
				$this->admin_m->dash($data);
				
				
			}

			else if($data['buton']=="Edit"){
				$data['s_sql']=$this->admin_m->edit($data);
				$this->load->view("admin/admin_header");
		        $this->load->view("admin/edit",$data);
		        goto end;
				
			}			
		}
		
				$data['sql']=$this->admin_m->get_by();
				$data['s_sql']=$this->admin_m->s_get_by();
		
				$this->load->view("admin/admin_header");
				$this->load->view("admin/admin_dash",$data);
				end:
	}

	
	public function tindex(){

		if($this->session->userdata('login')==FALSE)
		{
			redirect("admin/login");
		}	
		$this->load->model('admin_m');
		
		$data['tp']=NULL;
		//$data['p'] = nl2br(htmlentities($q_no, ENT_QUOTES, 'UTF-8'));
		
		$data['tp']=$this->input->post('t_no');
		$data['buton']=$this->input->post('Buton');
		if($data['tp']){
			
			if($data['buton']=="Delete"){
				$this->admin_m->tdel($data);
				redirect("admin/tutorial");

			}
			
			
								
		}
		
				
				$this->load->view("admin/admin_header");
				$this->load->view("admin/tutorial",$data);
				
	}

	

	public function solution(){
		$this->load->model('admin_m');
		
		$data['m']=array(2,3,4);
		//$data['p'] = nl2br(htmlentities($q_no, ENT_QUOTES, 'UTF-8'));
		
		$data['m']=$this->input->post('sol_no');

		
		$data['buton']=$this->input->post('But');

		if($data['m']){

			
			if($data['buton']=="Delete"){
				
				
				$this->admin_m->s_del($data);
				redirect("admin/panel_sol");
				

			}
			
			
			else if($data['buton']=="Upload"){
				$this->admin_m->s_dash($data);
				
			}
		}
		$data['sql']=$this->admin_m->get_by();
		$data['s_sql']=$this->admin_m->s_get_by();
		
		$this->load->view("admin/admin_header");
		$this->load->view("admin/admin_dash",$data);
		

	}	


	public function login() {
		
		global $logged_in;
		$this->load->model('admin_m');
		$data['user']=NULL;
		$data['pass']=NULL;   
		$data['user']=$this->input->post('user');
		$data['pass']=$this->input->post('pass');
		$data['try']=3;
		$data['info']=0;
		
		if(($data['user'] )&&($data['pass'])){
			$res=$this->admin_m->check($data); 
			if($res->num_rows()>0)
			{
				$data['try']=0;
				
				$user = array(
				
				'login' => TRUE);
				
			$this->session->set_userdata($user);
				redirect('admin/');

			}
			else
			{
				$data['try']=1;


			}
		}

		$this->load->view('admin/login',$data);
	}


	public function logout(){

		
		
		$this->session->sess_destroy();
		redirect('/');
		
	}

	
	public function tutorial(){

		if($this->session->userdata('login')==FALSE)
		{
			redirect("admin/login");
		}	
		$this->load->model('admin_m');
		$data['config']['upload_path'] = './uploads/';
		$data['config']['allowed_types'] = 'gif|jpg|png';
		$data['config']['max_size']	= '6000';
		$data['config']['max_width']  = '1024';
		$data['config']['max_height']  = '768';

		$this->load->library('upload',$data['config']);
		$data['tif_img']=0;
		if($this->upload->do_upload()){

			$data['timg']=$this->upload->data();
			$data['tz']=$data['timg']['file_name'];
			$data['tif_img']=1;	
		}

		else{
			
			$data['tz']='none';
		}
		$data['tq']=NULL;
		
		$data['tq']=$this->input->post('ques');
		
		if($data['tq']){
			$this->admin_m->tins($data);
		}

		$data['tsql']=$this->admin_m->tget();
		
			
		$this->load->view("admin/admin_header");
		$this->load->view("admin/tutorial",$data);
		
	}

	public function edit_done(){	
		
		$data['config']['upload_path'] = './uploads/';
		$data['config']['allowed_types'] = 'gif|jpg|png';
		$data['config']['max_size']	= '6000';
		$data['config']['max_width']  = '1024';
		$data['config']['max_height']  = '768';

		$this->load->library('upload',$data['config']);
		$data['if_img']=0;
		if($this->upload->do_upload()){

			$data['img']=$this->upload->data();
			$data['z']=$data['img']['file_name'];
			$data['if_img']=1;	
		}

		else{
			
			$data['z']='none';
		}	
		
		$data['n_qs']=$this->input->post('n_qs');
		$data['q_val']=$this->input->post('q_val');
		$this->load->model("admin_m");
		$this->admin_m->edit_done($data);
		redirect("admin/panel");
		
	}

	

	public function panel(){


		if($this->session->userdata('login')==FALSE)
		{
			redirect("admin/login");
		}	
		$this->load->model('admin_m');
		$data['config']['upload_path'] = './uploads/';
		$data['config']['allowed_types'] = 'gif|jpg|png';
		$data['config']['max_size']	= '6000';
		$data['config']['max_width']  = '1024';
		$data['config']['max_height']  = '768';

		$this->load->library('upload',$data['config']);
		$data['if_img']=0;
		if($this->upload->do_upload()){

			$data['img']=$this->upload->data();
			$data['z']=$data['img']['file_name'];
			$data['if_img']=1;	
		}

		else{
			
			$data['z']='none';
		}
		$data['q']=NULL;
		
		$data['q']=$this->input->post('ques');
		
		if($data['q']){
			$this->admin_m->ins($data);
		}

		$data['sql']=$this->admin_m->get();
		
		$this->load->view("admin/admin_header");
		$this->load->view("admin/admin_panel",$data);
	}

	public function dash_delete(){
		$this->load->model('admin_m');
		$data['r']=NULL;
		
		$data['r']=$this->input->post('q_no_del');

		if($data['r']){
			$this->admin_m->update_dash($data);
		}

		redirect('admin/');

	}

	public function s_dash_delete(){
		$this->load->model('admin_m');
		$data['a']=NULL;
		
		$data['a']=$this->input->post('s_no_del');

		if($data['a']){
			$this->admin_m->s_update_dash($data);
		}

		redirect('admin/');

	}

	public function del_all(){

		$this->load->model('admin_m');
		$this->admin_m->del_all();
		redirect("admin/panel");
	}

	public function sol_del_all(){

		$this->load->model('admin_m');
		$this->admin_m->sol_del_all();
		redirect("admin/panel_sol");
	}

	public function dash_delete_all(){
		$this->load->model('admin_m');
		
		
		$this->admin_m->dash_delete_all();
		

		redirect('admin/');

	}

	public function s_dash_delete_all(){
		$this->load->model('admin_m');
		
		
		$this->admin_m->s_dash_delete_all();
		

		redirect('admin/');

	}

	public function panel_sol(){

		$this->load->model('admin_m');
		$data['config']['upload_path'] = './uploads/';
		$data['config']['allowed_types'] = 'gif|jpg|png';
		$data['config']['max_size']	= '6000';
		$data['config']['max_width']  = '1024';
		$data['config']['max_height']  = '768';

		$this->load->library('upload',$data['config']);
		$data['if_img']=0;
		if($this->upload->do_upload()){

			$data['img']=$this->upload->data();
			$data['z']=$data['img']['file_name'];
			$data['if_img']=1;	
		}

		else{
			
			$data['z']='none';
		}
		$data['q']=NULL;
		
		$data['q']=$this->input->post('sol');
		$data['id']=$this->input->post('q_id');
		
		if($data['q']){
			$this->admin_m->s_ins($data);
			$this->admin_m->mark_ans($data);
		}

		$data['s_sql']=$this->admin_m->s_get();
		$data['sql']=$this->admin_m->get();
		
		

		$this->load->view("admin/admin_header");
		$this->load->view("admin/panel_sol",$data);
	}

	public function setting(){

		$this->load->model("admin_m");
		$data['old_pass']=NULL;
		$data['res']=0;
		$data['old_pass']=$this->input->post('old_pass');
		$data['new_pass']=$this->input->post('new_pass');
		$data['re_new_pass']=$this->input->post('re_new_pass');

		if($data['old_pass']){

			if($data['new_pass']!=$data['re_new_pass']){
				$data['res']=1;
				

			}

			else{
				$data['pass_res']=$this->admin_m->pass($data);
				if($data['pass_res']->num_rows())
					{$data['res']=2;
			}
			else{
				$data['res']=3;
			}
		}
		
	}

	
	

	$this->load->view("admin/admin_header");
	$this->load->view("admin/setting",$data);
}



}

?>