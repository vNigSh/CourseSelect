<?php

class Data_subject extends CI_Model {
	function __construct(){
		parent::__construct();	
    }
	public function subject_show($start=0,$limit=10){
		$this->db->order_by('su_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('cs_subject');
		return $query->result_array();
	}
	//获取专业总数
	public function total_count(){
		return $this->db->count_all('cs_subject');
	}
	//添加专业
	public function subject_add($data){
		$result=$this->db->insert('cs_subject', $data);
		return $result;
	}
	//获取某个专业信息
	function subject_getone($id){
		$this->db->where('su_id', $id);
		$query = $this->db->get('cs_subject');
		return $query->result_array();	
	}
	//修改专业信息
	public function subject_change($info){
		$this->db->where('su_id', $info['su_id']);
		return $this->db->update('cs_subject', $info); 
	}
	//删除专业信息
	public function subject_delete($id){
		$this->db->where('su_id', $id);
		return $this->db->delete('cs_subject');
	}
}


?>