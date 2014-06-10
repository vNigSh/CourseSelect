<?php

class Data_chooseinfo extends CI_Model {
	function __construct(){
		parent::__construct();	
    }
	public function chooseinfo_show($start=0,$limit=10,$student,$identity){
		$this->db->select('a.*,b.*,c.*,d.*,e.*,f.*,g.*,h.*');
		$this->db->from('cs_chooseinfo as a');
		$this->db->join('cs_course as c','a.ch_course=c.c_id','left');	
		$this->db->join('cs_time as d','a.ch_time_id=d.ti_id','left');
		$this->db->join('cs_courseteacher  as b','a.ch_courseteacher=b.ct_id','left');
		$this->db->join('cs_teacher  as e','e.t_id=b.ct_teacher_id','left');		
		$this->db->join('cs_student  as g','g.s_id=a.ch_student','left');
		$this->db->join('cs_classroom  as f','f.cl_id=b.ct_classroom_id','left');
		$this->db->join('cs_subject  as h','h.su_id=c.c_subject','left');
		if($identity=="student"){
			$this->db->where('a.ch_student',$student);
		}else{
			$this->db->where('a.ch_courseteacher',$student);
		}
		$this->db->order_by('a.ch_week','asc');
		$this->db->order_by('d.ti_jie','asc');
		$this->db->limit($limit,$start);
		$query=$this->db->get();
		return $query->result_array();
	}
	//删除选课
	public function chooseinfo_delete($student,$course){
		$this->db->where('ch_student', $student);
		$this->db->where('ch_course', $course);
		return $this->db->delete('cs_chooseinfo');
	}
	//获取取某个学生选课总数
	public function total_count($student){
		$this->db->select("count(*) as c");
		$this->db->from('cs_chooseinfo');
		$this->db->where('ch_student',$student);
		$query = $this->db->get();
		return $query->result_array();
	}	
	//获取课程已选学生总数
	public function chooseinfo_getcount($courseteacher_id){
		$this->db->select('count(*) as c');
		$this->db->from('cs_chooseinfo');
		$this->db->where('ch_courseteacher',$courseteacher_id);
		$query=$this->db->get();
		return $query->result_array();
	}
	//获取学生已选某个课程次数
	public function chooseinfo_getchoose($course_id,$student=""){
		$this->db->select('count(*) as c');
		$this->db->from('cs_chooseinfo');
		$this->db->where('ch_course',$course_id);
		if($student != ""){
			$this->db->where('ch_student',$student);
		}
		$query=$this->db->get();
		return $query->result_array();
	}
	//判断学生选课是否冲突
	public function chooseinfo_isconflict($student,$week,$time){
		$this->db->select('count(*) as c');
		$this->db->from('cs_chooseinfo');
		$this->db->where('ch_student',$student);
		$this->db->where('ch_week',$week);
		$this->db->where('ch_time_id',$time);
		$query=$this->db->get();
		return $query->result_array();	
	}
	//添加选课信息
	public function chooseinfo_add($data){
		$result=$this->db->insert('cs_chooseinfo', $data);
		return $result;
	}

}


?>