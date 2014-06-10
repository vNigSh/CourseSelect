<?php

class Data_teacher extends CI_Model {
	function __construct(){
		parent::__construct();	
    }	
	public function teacher_check($info){
		$this->db->where('t_id',$info['username']);
		$this->db->where('t_password',$info['password']);
		$query=$this->db->get('cs_teacher');
		return $query->row_array();
	}	
	public function teacher_show($start=0,$limit=10,$subject=""){
		$this->db->select('a.*,b.*');
		$this->db->from('cs_teacher as a');
		$this->db->join('cs_subject as b','a.t_subject=b.su_id','left');
		if($subject!=""){
			$this->db->where('a.t_subject',$subject);
		}
		$this->db->order_by('a.t_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取教师总数
	public function total_count($subject=""){
		$this->db->select("count(*) as c");
		$this->db->from('cs_teacher');
		if($subject!=""){
			$this->db->where('t_subject',$subject);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
		//添加教师信息
	public function teacher_add($data){
		$result=$this->db->insert('cs_teacher', $data);
		return $result;
	}
	//获取某个教师信息
	function teacher_getone($id){
		$this->db->where('t_id', $id);
		$query = $this->db->get('cs_teacher');
		return $query->result_array();	
	}
	//修改教师信息
	public function teacher_change($info){
		$this->db->where('t_id', $info['t_id']);
		return $this->db->update('cs_teacher', $info); 
	}
	//删除教师信息
	public function teacher_delete($id){
		$this->db->where('t_id', $id);
		return $this->db->delete('cs_teacher');
	}
}


?>