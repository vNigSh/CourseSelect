<?php

class Data_courseteacher extends CI_Model {
	function __construct(){
		parent::__construct();	
    }	
	public function courseteacher_show($start=0,$limit=10,$course_id="",$teacher_id=""){
		$this->db->select('a.*,b.*,c.*,d.*,e.*,f.*');
		$this->db->from('cs_courseteacher as a');
		$this->db->join('cs_course as b','a.ct_course_id=b.c_id','left');		
		$this->db->join('cs_teacher as c','a.ct_teacher_id=c.t_id','left');
		$this->db->join('cs_classroom as d','a.ct_classroom_id=d.cl_id','left');
		$this->db->join('cs_time as e','a.ct_time_id=e.ti_id','left');
		$this->db->join('cs_subject as f','b.c_subject=f.su_id','left');
		if($course_id!=""){
			$this->db->where('a.ct_course_id',$course_id);
		}
		if($teacher_id !=""){
			$this->db->where('a.ct_teacher_id',$teacher_id);
		}
		$this->db->order_by('a.ct_week','asc');
		$this->db->order_by('e.ti_jie','asc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取同一天同一节课同一个地方是否有老师上课
	public function courseteacher_getrepeat($week,$time,$classroom,$condition,$ct_id=""){
		$this->db->select('count(*) as c');
		$this->db->from('cs_courseteacher');
		$this->db->where('ct_week',$week);//星期几
		$this->db->where('ct_time_id',$time);//第几节课
		if($condition=="classroom"){
			$this->db->where('ct_classroom_id',$classroom);//在哪个教室
		}else{
			$this->db->where('ct_teacher_id',$classroom);//哪个老师
		}
		if($ct_id!=""){
			$this->db->where('ct_id !=',$ct_id);//更新时不查找更新项
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取课程班级总数
	public function total_count($course_id="",$teacher=""){
		$this->db->select("count(*) as c");
		$this->db->from('cs_courseteacher');
		if($course_id!=""){
			$this->db->where('ct_course_id',$course_id);
		}
		if($teacher!=""){
			$this->db->where('ct_teacher_id',$teacher);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
		//添加课程班级
	public function courseteacher_add($data){
		$result=$this->db->insert('cs_courseteacher', $data);
		return $result;
	}
	//获取某个课程班级信息
	function courseteacher_getone($id){
		$this->db->select('a.*,b.*,c.*,d.*,e.*,f.*');
		$this->db->from('cs_courseteacher as a');
		$this->db->join('cs_course as b','a.ct_course_id=b.c_id','left');		
		$this->db->join('cs_teacher as c','a.ct_teacher_id=c.t_id','left');
		$this->db->join('cs_classroom as d','a.ct_classroom_id=d.cl_id','left');
		$this->db->join('cs_time as e','a.ct_time_id=e.ti_id','left');
		$this->db->join('cs_subject as f','b.c_subject=f.su_id','left');
		$this->db->where('a.ct_id',$id);
		$this->db->order_by('a.ct_addtime','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	//修改课程班级信息
	public function courseteacher_change($info){
		$this->db->where('ct_id', $info['ct_id']);
		return $this->db->update('cs_courseteacher', $info); 
	}
	//删除课程班级信息
	public function courseteacher_delete($id){
		$this->db->where('ct_id', $id);
		return $this->db->delete('cs_courseteacher');
	}
}


?>