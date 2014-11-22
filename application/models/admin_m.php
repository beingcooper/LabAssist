<?php

Class Admin_m extends CI_Model{


	function __construct(){
		parent::__construct();
	}

	public function check($data){

		$this->db->where("user",$data['user']);
		
		$this->db->where("pass",hash('sha256',$data['pass']));
		$query=$this->db->get("admin");
		return $query;
	}

	public function ins($data){
		$ques=array('qs'=>$data['q'],'image'=>$data['z'],'if_img'=>$data['if_img']);
		$this->db->insert('ques',$ques);
	}

	
	public function tins($data){
		$ques=array('tuto'=>$data['tq'],'image'=>$data['tz'],'if_img'=>$data['tif_img']);
		$this->db->insert('tutorial',$ques);
	}

	public function s_ins($data){
		$sol=array('id'=>$data['id'],'sol'=>$data['q'],'image'=>$data['z'],'if_img'=>$data['if_img']);
		$this->db->insert('solution',$sol);
	}
	public function get(){
		$sql=$this->db->get('ques');
		return $sql;
	}

	public function tget(){
		$tsql=$this->db->get('tutorial');
		return $tsql;
	}

	public function s_get(){
		$sql=$this->db->get('solution');
		return $sql;
	}

	public function mark_ans($data){
		$ques=array('if_ans'=>1);
		$this->db->where('id',$data['id']);

		$this->db->update('ques',$ques);
		
	}
	public function pass($data){

		$ques=array('pass'=>hash('sha256',$data['new_pass']));
		$this->db->where_in('pass',hash('sha256',$data['old_pass']));
		$this->db->update('admin',$ques);

		$this->db->where('pass',hash('sha256',$data['new_pass']));
		$sql=$this->db->get('admin');
		return $sql;
	}
	public function dash($data){

		$ques=array('selected'=>1);

		$this->db->where_in('id',$data['p']);
		$this->db->update('ques',$ques);
	}

	public function edit($data){

		

		$this->db->where_in('id',$data['p']);
		$s_sql=$this->db->get('ques');
		return $s_sql;
	}

	public function s_dash($data){

		$ques=array('selected'=>1);

		$this->db->where_in('id',$data['m']);
		$this->db->update('solution',$ques);

	}

	public function edit_done($data){

		$ques=array('qs'=>$data['n_qs'],'if_img'=>$data['if_img'],'image'=>$data['z']);
		//echo $data['q_val'];
		//echo "lol";
		$this->db->where_in('id',$data['q_val']);
		$this->db->update('ques',$ques);

	}

	public function del($data){

		$this->db->where_in('id',$data['p']);
		$this->db->delete('ques');
	}


	public function tdel($data){

		$this->db->where_in('id',$data['tp']);
		$this->db->delete('tutorial');
	}

	public function s_del($data){

		$this->db->where_in('id',$data['m']);
		$this->db->delete('solution');
		$ques=array('if_ans'=>0);
		$this->db->where_in('id',$data['m']);
		$this->db->update('ques',$ques);
		
	}

	

	public function del_all(){

		$ques=array(0,1);
		$this->db->where_in('selected',$ques);
		$this->db->delete('ques');
	}

	public function sol_del_all(){

		$ques=array(0,1);
		$this->db->where_in('selected',$ques);
		$this->db->delete('solution');
		$ques=array('if_ans'=>0);
		$this->db->update('ques',$ques);	
	}
	public function get_by(){

		$this->db->where('selected',1);
		$sql=$this->db->get('ques');
		return $sql; 
	}

	public function s_get_by(){

		$this->db->where('selected',1);
		$sql=$this->db->get('solution');
		return $sql; 
	}

	public function update_dash($data){

		$ques=array('selected'=>0);

		$this->db->where_in('id',$data['r']);
		$this->db->update('ques',$ques);
	}

	public function s_update_dash($data){

		$ques=array('selected'=>0);

		$this->db->where_in('id',$data['a']);
		$this->db->update('solution',$ques);
	}

	public function s_dash_delete_all(){

		$ques=array('selected'=>0);
		$this->db->where_in('selected',1);
		$this->db->update('solution',$ques);
	}
	public function dash_delete_all(){

		$ques=array('selected'=>0);
		$this->db->where_in('selected',1);
		$this->db->update('ques',$ques);
	}


}

?>