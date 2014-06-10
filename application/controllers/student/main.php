<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('data_news');
		$this->load->model('data_subject');
		$this->load->model('data_classroom');
		$this->load->model('data_course');
		$this->load->model('data_admin');
		$this->load->model('data_time');
		$this->load->model('data_courseteacher');
		$this->load->model('data_chooseinfo');
		$this->load->model('data_teacher');
		$this->load->model('data_student');
		$this->load->model('data_news');
		 $this->load->library('form_validation');
		$status=$this->session->userdata('s_islogin');
		check_login($status);			
	}
	public function index()
	{
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$news_list=$this->data_news->news_show($start,$limit);
		$total_rows=$this->data_news->total_count();
		$config['base_url'] = site_url('student/main/index/');
		$config['per_page'] = $limit; 
		$config['total_rows']=$total_rows;
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['last_link'] = '尾页';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<div class="bbb">';
		$config['first_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="ccc">';
		$config['num_tag_close'] = '</div>';
		$config['full_tag_open'] = '<div class="aaaaaa">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="ddd">';
		$config['cur_tag_close'] = '</div>';
		$config['last_tag_open'] = '<div class="bbb">';
		$config['last_tag_close'] = '</div>';
		$config['prev_tag_open'] = '<div class="fff">';
		$config['prev_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="fff">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		
		$this->pagination->initialize($config); 
		$page_links = $this->pagination->create_links();
		$data=Array(
			'page_links'=>$page_links,
			'news_list'=>$news_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('s_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('student/header',$userinfo);
		$this->load->view('student/index',$data);
		$this->load->view('student/footer');
	}	
	public function article_detail()
	{
		$article_id=$this->uri->segment(4,1);
		$news_info=$this->data_news->news_getone($article_id);
		//print_r($news_info);exit;
		$data=Array(
			'news_info'=>$news_info
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('s_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('student/header',$userinfo);
		$this->load->view('student/article_detail',$data);
		$this->load->view('student/footer');
	}	
	public function be_selected()
	{	
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$chooseinfo_list=$this->data_chooseinfo->chooseinfo_show($start,$limit,$this->session->userdata('s_id'),'student');
		//print_r($chooseinfo_list);exit;
		$total_rows=$this->data_chooseinfo->total_count($this->session->userdata('s_id'));
		$config['base_url'] = site_url('student/main/be_selected/');
		$config['per_page'] = $limit; 
		$config['total_rows']=$total_rows[0]['c'];
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['last_link'] = '尾页';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<div class="bbb">';
		$config['first_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="ccc">';
		$config['num_tag_close'] = '</div>';
		$config['full_tag_open'] = '<div class="aaaaaa">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="ddd">';
		$config['cur_tag_close'] = '</div>';
		$config['last_tag_open'] = '<div class="bbb">';
		$config['last_tag_close'] = '</div>';
		$config['prev_tag_open'] = '<div class="fff">';
		$config['prev_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="fff">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		foreach($chooseinfo_list as $key=>$item){
			switch($item['ch_week']){
				case 1:$chooseinfo_list[$key]['ch_week']='星期一';break;
				case 2:$chooseinfo_list[$key]['ch_week']='星期二';break;
				case 3:$chooseinfo_list[$key]['ch_week']='星期三';break;
				case 4:$chooseinfo_list[$key]['ch_week']='星期四';break;
				case 5:$chooseinfo_list[$key]['ch_week']='星期五';break;
				case 6:$chooseinfo_list[$key]['ch_week']='星期六';break;
				case 7:$chooseinfo_list[$key]['ch_week']='星期日';break;
			}
		}
		$this->pagination->initialize($config); 
		$page_links = $this->pagination->create_links();
		$data=Array(
			'page_links'=>$page_links,
			'chooseinfo_list'=>$chooseinfo_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('s_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('student/header',$userinfo);
		$this->load->view('student/be_selected',$data);
		$this->load->view('student/footer');
	}	
	public function change_password()
	{
		$password_data=$this->input->post();
		$s_id=$this->session->userdata('s_id');
		if($password_data){
			$this->form_validation->set_rules('new_password', 'new_password', 'required|alpha_numeric');//密码只能由字母跟数字组成且不能为空
			if($this->form_validation->run() == FALSE){
				alert('密码格式不正确','student/main/change_password');
				exit;
			}
			$userinfo=$this->data_student->student_getone($s_id);
			if($userinfo[0]['s_password']!=md5(trim($password_data['old_password']))){
				alert('原密码输入不正确','student/main/change_password');
				exit;
			}elseif(trim($password_data['new_password'])!=trim($password_data['new_password2'])){
				alert('两次输入的密码不一致','student/main/change_password');
				exit;
			}else{
				$data=Array(
					's_id'=>$s_id,
					's_password'=>md5(trim($password_data['new_password']))
				);
				$result=$this->data_student->student_change($data);
				if($result){
					alert('密码修改成功','student/main/index');
					exit;
				}else{
					alert('密码修改失败','student/main/change_password');
					exit;
				}
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('s_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('student/header',$userinfo);
			$this->load->view('student/change_password');
			$this->load->view('student/footer');
		}
	}	
	public function chooseinfo_delete()
	{
		$s_id=$this->session->userdata('s_id');
		$c_id=$this->uri->segment(4,1);
		$count=$this->data_chooseinfo->chooseinfo_getchoose($c_id,$s_id);
		if($count[0]['c']==0){
			alert('你没有选择该课程','student/main/subject');
			exit;
		}else{
			$result=$this->data_chooseinfo->chooseinfo_delete($s_id,$c_id);
			if($result){
				alert('成功退选','student/main/subject');
				exit;
			}else{
				alert('退选失败','student/main/subject');
				exit;
			}
		}
	}	
	public function select()
	{	
		$data_chooseinfo=$this->input->post();
		if($data_chooseinfo){			
			$courseteacher_info=$this->data_courseteacher->courseteacher_getone($data_chooseinfo['ch_courseteacher']);
			//获取选择该门课程的总数
			$chooseinfo_count=$this->data_chooseinfo->chooseinfo_getcount($data_chooseinfo['ch_courseteacher']);
			//该老师该门课程可选余量
			$rest=$courseteacher_info[0]['ct_number']-$chooseinfo_count[0]['c'];
			if($rest<=0){
				alert('选课名额已满，请选择其他老师','student/main/select/'.$courseteacher_info[0]['ct_course_id']);
				exit;
			}
			//判断该学生是否已经选择该课程
			$is_choose=$this->data_chooseinfo->chooseinfo_getchoose($courseteacher_info[0]['ct_course_id']);
			if($is_choose[0]['c']!=0){
				alert('你已经选过该课程','student/main/select');
				exit;
			}else{
				//判断该学生选择是否有时间冲突
				$is_conflict=$this->data_chooseinfo->chooseinfo_isconflict($this->session->userdata('s_id'),$courseteacher_info[0]['ct_week'],$courseteacher_info[0]['ct_time_id']);				
				if($is_conflict[0]['c']!=0){
					alert('选课时间冲突','student/main/select/'.$courseteacher_info[0]['ct_course_id']);
					exit;				
				}else{
					$data=Array(
						'ch_student'=>$this->session->userdata('s_id'),
						'ch_courseteacher'=>$courseteacher_info[0]['ct_id'],
						'ch_week'=>$courseteacher_info[0]['ct_week'],
						'ch_time_id'=>$courseteacher_info[0]['ct_time_id'],
						'ch_course'=>$courseteacher_info[0]['ct_course_id'],
						'ch_addtime'=>time()
					);
					$result=$this->data_chooseinfo->chooseinfo_add($data);
					if($result){
						alert('选课成功','student/main/subject');
						exit;
					}else{
						alert('选课失败','student/main/subject');
						exit;
					}
				}
			}
		}else{
			$this->load->library('pagination');	
			$page = $this->uri->segment(5,1);
			$course_id=$this->uri->segment(4,1);
			$limit = 10;
			$start = ($page - 1) * $limit;
			$courseteacher_list=$this->data_courseteacher->courseteacher_show($start,$limit,$course_id,"");
			$total_rows=$this->data_courseteacher->total_count($course_id);
			$config['base_url'] = site_url('student/main/subject/'.$course_id.'/');
			$config['per_page'] = $limit; 
			$config['total_rows']=$total_rows[0]['c'];
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = TRUE;
			$config['last_link'] = '尾页';
			$config['first_link'] = '首页';
			$config['first_tag_open'] = '<div class="bbb">';
			$config['first_tag_close'] = '</div>';
			$config['num_tag_open'] = '<div class="ccc">';
			$config['num_tag_close'] = '</div>';
			$config['full_tag_open'] = '<div class="aaaaaa">';
			$config['full_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<div class="ddd">';
			$config['cur_tag_close'] = '</div>';
			$config['last_tag_open'] = '<div class="bbb">';
			$config['last_tag_close'] = '</div>';
			$config['prev_tag_open'] = '<div class="fff">';
			$config['prev_tag_close'] = '</div>';
			$config['next_tag_open'] = '<div class="fff">';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '上一页';
			$config['next_link'] = '下一页';
			
			$this->pagination->initialize($config); 
			$page_links = $this->pagination->create_links();
			//获取课程的可选余量
			foreach($courseteacher_list as $key=>$item){
				$number_beselected=$this->data_chooseinfo->chooseinfo_getcount($item['ct_id']);
				$courseteacher_list[$key]['rest']=$item['ct_number']-$number_beselected[0]['c'];
			}
			foreach($courseteacher_list as $key=>$item){
				switch($item['ct_week']){
					case 1:$courseteacher_list[$key]['ct_week']='星期一';break;
					case 2:$courseteacher_list[$key]['ct_week']='星期二';break;
					case 3:$courseteacher_list[$key]['ct_week']='星期三';break;
					case 4:$courseteacher_list[$key]['ct_week']='星期四';break;
					case 5:$courseteacher_list[$key]['ct_week']='星期五';break;
					case 6:$courseteacher_list[$key]['ct_week']='星期六';break;
					case 7:$courseteacher_list[$key]['ct_week']='星期日';break;
				}
			}		
			//print_r($courseteacher_list);exit;
			$data=Array(
				'page_links'=>$page_links,
				'courseteacher_list'=>$courseteacher_list
			);
			$userinfo=Array(
				'username'=>$this->session->userdata('s_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('student/header',$userinfo);
			$this->load->view('student/select',$data);
			$this->load->view('student/footer');
		}
	}	
	public function subject()
	{		
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$course_list=$this->data_course->course_show($start,$limit,$this->session->userdata('s_subject'));
		$total_rows=$this->data_course->total_count($this->session->userdata('s_subject'));
		$config['base_url'] = site_url('student/main/subject/');
		$config['per_page'] = $limit; 
		$config['total_rows']=$total_rows[0]['c'];
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['last_link'] = '尾页';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<div class="bbb">';
		$config['first_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="ccc">';
		$config['num_tag_close'] = '</div>';
		$config['full_tag_open'] = '<div class="aaaaaa">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="ddd">';
		$config['cur_tag_close'] = '</div>';
		$config['last_tag_open'] = '<div class="bbb">';
		$config['last_tag_close'] = '</div>';
		$config['prev_tag_open'] = '<div class="fff">';
		$config['prev_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="fff">';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		
		$this->pagination->initialize($config); 
		$page_links = $this->pagination->create_links();
		$data=Array(
			'page_links'=>$page_links,
			'course_list'=>$course_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('s_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('student/header',$userinfo);
		$this->load->view('student/subject',$data);
		$this->load->view('student/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */