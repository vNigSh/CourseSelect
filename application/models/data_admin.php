<?php

class Data_admin extends CI_Model {
	function __construct(){
		parent::__construct();	
    }
	public function admin_check($info){
		$this->db->where('a_username',$info['username']);
		$this->db->where('a_password',$info['password']);
		$query=$this->db->get('cs_admin');
		return $query->row_array();
	}	
	public function admin_show($start=0,$limit=10){
		$this->db->order_by('a_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('cs_admin');
		return $query->result_array();
	}
	//获取管理员总数
	public function total_count(){
		return $this->db->count_all('cs_admin');
	}
	//添加管理员
	public function admin_add($data){
		$result=$this->db->insert('cs_admin', $data);
		return $result;
	}
	//获取某个管理员信息
	function admin_getone($id){
		$this->db->where('a_id', $id);
		$query = $this->db->get('cs_admin');
		return $query->result_array();	
	}
	//修改管理员信息
	public function admin_change($info){
		$this->db->where('a_id', $info['a_id']);
		return $this->db->update('cs_admin', $info); 
	}
	//删除管理员信息
	public function admin_delete($id){
		$this->db->where('a_id', $id);
		return $this->db->delete('cs_admin');
	}
}


?>