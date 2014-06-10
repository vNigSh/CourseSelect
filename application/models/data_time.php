<?php

class Data_time extends CI_Model {
	function __construct(){
		parent::__construct();	
    }
	public function time_show($start=0,$limit=10){
		$this->db->order_by('ti_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('cs_time');
		return $query->result_array();
	}
	//获取上课时间总数
	public function total_count(){
		return $this->db->count_all('cs_time');
	}
	//添加上课时间
	public function time_add($data){
		$result=$this->db->insert('cs_time', $data);
		return $result;
	}
	//获取上课时间信息
	function time_getone($id){
		$this->db->where('ti_id', $id);
		$query = $this->db->get('cs_time');
		return $query->result_array();	
	}
	//修改上课时间信息
	public function time_change($info){
		$this->db->where('ti_id', $info['ti_id']);
		return $this->db->update('cs_time', $info); 
	}
	//删除上课时间信息
	public function time_delete($id){
		$this->db->where('ti_id', $id);
		return $this->db->delete('cs_time');
	}	

}


?>