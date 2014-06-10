<?php

class Data_classroom extends CI_Model {
	function __construct(){
		parent::__construct();	
    }
	public function classroom_show($start=0,$limit=10){
		$this->db->order_by('cl_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('cs_classroom');
		return $query->result_array();
	}
	//获取课室总数
	public function total_count(){
		return $this->db->count_all('cs_classroom');
	}
	//添加课室
	public function classroom_add($data){
		$result=$this->db->insert('cs_classroom', $data);
		return $result;
	}
	//获取课室信息
	function classroom_getone($id){
		$this->db->where('cl_id', $id);
		$query = $this->db->get('cs_classroom');
		return $query->result_array();	
	}
	//修改课室信息
	public function classroom_change($info){
		$this->db->where('cl_id', $info['cl_id']);
		return $this->db->update('cs_classroom', $info); 
	}
	//删除课室信息
	public function classroom_delete($id){
		$this->db->where('cl_id', $id);
		return $this->db->delete('cs_classroom');
	}
}


?>