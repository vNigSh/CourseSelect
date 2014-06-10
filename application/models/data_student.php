<?php

class Data_student extends CI_Model {
	function __construct(){
		parent::__construct();	
    }	
	public function student_check($info){
		$this->db->where('s_id',$info['username']);
		$this->db->where('s_password',$info['password']);
		$query=$this->db->get('cs_student');
		return $query->row_array();
	}	
	public function student_show($start=0,$limit=10,$subject=""){
		$this->db->select('a.*,b.*');
		$this->db->from('cs_student as a');
		$this->db->join('cs_subject as b','a.s_subject=b.su_id','left');
		if($subject != ""){
			$this->db->where('a.s_subject',$subject);
		}
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取学生总数
	public function total_count($subject=""){
		$this->db->select('count(*) as c');
		$this->db->from('cs_student');
		if($subject != ""){
			$this->db->where('s_subject',$subject);
		}		
		$query = $this->db->get();
		return $query->result_array();
	}
	//添加学生
	public function student_add($data){
		$result=$this->db->insert('cs_student', $data);
		return $result;
	}
	//获取某个学生信息
	function student_getone($id){
		$this->db->where('s_id', $id);
		$query = $this->db->get('cs_student');
		return $query->result_array();	
	}
	//修改学生信息
	public function student_change($info){
		$this->db->where('s_id', $info['s_id']);
		return $this->db->update('cs_student', $info); 
	}
	//删除学生信息
	public function student_delete($id){
		$this->db->where('s_id', $id);
		return $this->db->delete('cs_student');
	}	
}


?>