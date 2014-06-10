<?php

class Data_course extends CI_Model {
	function __construct(){
		parent::__construct();	
    }	
	public function course_show($start=0,$limit=10,$subject=""){
		$this->db->select('c.*,s.*');
		$this->db->from('cs_course as c');
		$this->db->join('cs_subject as s','c.c_subject=s.su_id','left');
		if($subject!=""){
			$this->db->where('c.c_subject',$subject);
		}
		$this->db->order_by('c.c_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取课程总数
	public function total_count($subject=""){
		$this->db->select("count(*) as c");
		$this->db->from('cs_course');
		if($subject!=""){
			$this->db->where('c_subject',$subject);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
		//添加课程
	public function course_add($data){
		$result=$this->db->insert('cs_course', $data);
		return $result;
	}
	//获取某个课程信息
	function course_getone($id){
		$this->db->where('c_id', $id);
		$query = $this->db->get('cs_course');
		return $query->result_array();	
	}
	//修改课程信息
	public function course_change($info){
		$this->db->where('c_id', $info['c_id']);
		return $this->db->update('cs_course', $info); 
	}
	//删除课程信息
	public function course_delete($id){
		$this->db->where('c_id', $id);
		return $this->db->delete('cs_course');
	}
}


?>