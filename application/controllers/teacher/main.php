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
		$this->load->model('data_courseteacher');
		$this->load->model('data_chooseinfo');
		$this->load->model('data_teacher');
		$this->load->model('data_student');
		 $this->load->library('form_validation');
		$status=$this->session->userdata('t_islogin');
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
		$config['base_url'] = site_url('teacher/main/index/');
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
			'username'=>$this->session->userdata('t_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('teacher/header',$userinfo);
		$this->load->view('teacher/index',$data);
		$this->load->view('teacher/footer');
	}
	/**
	*
	*文章详细页
	*/
	public function article_detail()
	{
		$article_id=$this->uri->segment(4,1);
		$news_info=$this->data_news->news_getone($article_id);
		//print_r($news_info);exit;
		$data=Array(
			'news_info'=>$news_info
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('t_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('teacher/header',$userinfo);
		$this->load->view('teacher/article_detail',$data);
		$this->load->view('teacher/footer');
	}
	public function change_password()
	{
		$password_data=$this->input->post();
		$t_id=$this->session->userdata('t_id');
		if($password_data){
			$this->form_validation->set_rules('new_password', 'new_password', 'required|alpha_numeric');//密码只能由字母跟数字组成且不能为空
			if($this->form_validation->run() == FALSE){
				alert('密码格式不正确','teacher/main/change_password');
				exit;
			}
			$userinfo=$this->data_teacher->teacher_getone($t_id);
			if($userinfo[0]['t_password']!=md5(trim($password_data['old_password']))){
				alert('原密码输入不正确','teacher/main/change_password');
				exit;
			}elseif(trim($password_data['new_password'])!=trim($password_data['new_password2'])){
				alert('两次输入的密码不一致','teacher/main/change_password');
				exit;
			}else{
				$data=Array(
					't_id'=>$a_id,
					't_password'=>md5(trim($password_data['new_password']))
				);
				$result=$this->data_teacher->teacher_change($data);
				if($result){
					alert('密码修改成功','teacher/main/index');
					exit;
				}else{
					alert('密码修改失败','teacher/main/change_password');
					exit;
				}
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('t_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('teacher/header',$userinfo);
			$this->load->view('teacher/change_password');
			$this->load->view('teacher/footer');
		}
	}
	public function student_search()
	{
	/*
		$this->load->library('pagination');	
		$teacher_id=$this->session->userdata('t_id');
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$courseteacher_list=$this->data_courseteacher->courseteacher_show($start,$limit,"",$teacher_id);
		$total_rows=$this->data_courseteacher->total_count("",$teacher_id);
		$config['base_url'] = site_url('teacher/main/student_search/');
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
		
		$data=Array(
			'page_links'=>$page_links,
			'teachercourse_list'=>$courseteacher_list
		);
		*/
		$userinfo=Array(
			'username'=>$this->session->userdata('t_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('teacher/header',$userinfo);
		$this->load->view('teacher/student_search');
		$this->load->view('teacher/footer');
	}
	public function student_show()
	{
		$ct_id=$this->uri->segment(4,1);
		$this->load->library('pagination');	
		$page = $this->uri->segment(5,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$chooseinfo_list=$this->data_chooseinfo->chooseinfo_show($start,$limit,$ct_id,'courseteacher');
		//print_r($chooseinfo_list);exit;
		if(!$chooseinfo_list){
			alert('没有学生选择该门课程','teacher/main/teacher_course');
			exit;
		}
		//print_r($chooseinfo_list);exit;
		$total_rows=$this->data_chooseinfo->chooseinfo_getcount($ct_id);
		$config['base_url'] = site_url('student/main/student_show/'.$ct_id.'/');
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
				'username'=>$this->session->userdata('t_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('teacher/header',$userinfo);
			$this->load->view('teacher/student_show',$data);
			$this->load->view('teacher/footer');

	}
	public function teacher_course()
	{
		$this->load->library('pagination');	
		$teacher_id=$this->session->userdata('t_id');
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$courseteacher_list=$this->data_courseteacher->courseteacher_show($start,$limit,"",$teacher_id);
		$total_rows=$this->data_courseteacher->total_count("",$teacher_id);
		$config['base_url'] = site_url('teacher/main/teacher_course/');
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
		
		$data=Array(
			'page_links'=>$page_links,
			'teachercourse_list'=>$courseteacher_list
		);
		
		$userinfo=Array(
			'username'=>$this->session->userdata('t_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('teacher/header',$userinfo);
		$this->load->view('teacher/teacher_course',$data);
		$this->load->view('teacher/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */