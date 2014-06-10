<?php

class Data_news extends CI_Model {
	function __construct(){
		parent::__construct();	
    }	
	public function news_show($start,$limit=10)
	{
		$this->db->select('a.*,b.*');
		$this->db->from('cs_news as a');
		$this->db->join('cs_admin as b','a.n_admin=b.a_id','left');
		$this->db->order_by('n_addtime','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取公告总数
	public function total_count(){
		return $this->db->count_all('cs_news');
	}
	//添加公告
	public function news_add($data){
		$result=$this->db->insert('cs_news', $data);
		return $result;
	}
	//获取某一条公告数据
	function news_getone($id){
		$this->db->select('a.*,b.*');
		$this->db->from('cs_news as a');
		$this->db->join('cs_admin as b','a.n_admin=b.a_id','left');
		$this->db->where('a.n_id', $id);
		$query = $this->db->get();
		return $query->result_array();	
	}
	//修改公告
	public function news_change($info){
		$this->db->where('n_id', $info['n_id']);
		return $this->db->update('cs_news', $info); 
	}
	//删除公告
	public function news_delete($id){
		$this->db->where('n_id', $id);
		return $this->db->delete('cs_news');
	}
}


?>