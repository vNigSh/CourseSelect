<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	
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
		 $this->load->library('form_validation');
		$status=$this->session->userdata('a_islogin');
		check_login($status);	
	}
	/**
	 * 该控制器首页，新闻列表显示 
	 *
	 */
	public function index(){
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$news_list=$this->data_news->news_show($start,$limit);
		$total_rows=$this->data_news->total_count();
		$config['base_url'] = site_url('admin/main/index/');
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
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加公告
	 *
	 */
	public function article_add(){
		$data=$this->input->post();
		if($data){
			$this->form_validation->set_rules('n_title', 'n_title', 'required');
			$this->form_validation->set_rules('n_content', 'n_content', 'required');
			if($this->form_validation->run() == FALSE){
				alert('资讯标题或者内容不能为空','admin/main/article_add');
				exit;
			}
			$info=Array(
				'n_title'=>$data['n_title'],
				'n_content'=>$data['n_content'],
				'n_admin'=>$this->session->userdata('a_id'),
				'n_addtime'=>time()
			);
			$result=$this->data_news->news_add($info);
			if($result){
				alert('添加成功','admin/main/index');
				exit;
			}else{
				alert('添加失败','admin/main/index');
				exit;
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/article_add');
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 修改资讯
	 *
	 */
	public function article_change(){
		$news_data=$this->input->post();
		if($news_data){
			$this->form_validation->set_rules('n_title', 'n_title', 'required');
			$this->form_validation->set_rules('n_content', 'n_content', 'required');
			if($this->form_validation->run() == FALSE){
				alert('资讯标题或者内容不能为空','admin/main/index');
				exit;
			}
			$change_data=Array(
				'n_title'=>$news_data['n_title'],
				'n_content'=>$news_data['n_content'],
				'n_id'=>$news_data['n_id']
			);
			$result=$this->data_news->news_change($change_data);
			if($result){
				alert('修改成功','admin/main/index');
				exit;
			}else{
				alert('修改失败','admin/main/index');
				exit;
			}
		}else{
			$n_id=$this->uri->segment(4,1);
			$news_info=$this->data_news->news_getone($n_id);
			//print_r($data);exit;
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'news_info'=>$news_info
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/article_change',$data);
			$this->load->view('admin/footer');
		}

	}
	/**
	 * 删除文章
	 *
	 */
	public function article_delete(){
		$n_id=$this->uri->segment(4,1);
		$news_info=$this->data_news->news_delete($n_id);
		if($news_info){
			alert('删除成功！','admin/main/index');
			exit;
		}else{
			alert('删除失败！','admin/main/index');
			exit;
		}
	}
	/**
	 * 文章详细信息
	 *
	 */
	public function article_detail(){
		$article_id=$this->uri->segment(4,1);
		$news_info=$this->data_news->news_getone($article_id);
		//print_r($news_info);exit;
		$data=Array(
			'news_info'=>$news_info
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/article_detail',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 显示课程信息
	 *
	 */
	public function subject(){	
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$course_list=$this->data_course->course_show($start,$limit);
		$total_rows=$this->data_course->total_count();
		$config['base_url'] = site_url('admin/main/subject/');
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
	
		//print_r($data);exit;
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/subject',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加管理员
	 *
	 */
	public function admin_add(){
		$add_admin=$this->input->post();
		if($add_admin){
			$this->form_validation->set_rules('a_username', 'a_sername', 'required|alpha');//用户名只能是字母组成且不能为空
			$this->form_validation->set_rules('a_password', 'a_password', 'required|alpha_numeric');//密码只能由字母跟数字组成且不能为空
			if($this->form_validation->run() == FALSE){
				alert('用户名或者密码格式不正确','admin/main/admin_add');
				exit;
			}
			$data=Array(
				'a_username'=>$add_admin['a_username'],
				'a_password'=>md5(trim($add_admin['a_password'])),
				'a_addtime'=>time()
			);
			$result=$this->data_admin->admin_add($data);
			if($result){
				alert('添加成功','admin/main/admin_manage');
				exit;
			}else{
				alert('添加失败','admin/main/admin_manage');
				exit;
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/admin_add');
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 修改管理员信息
	 *
	 */
	public function admin_change(){
		$change_admin=$this->input->post();
		if($change_admin){
			$this->form_validation->set_rules('a_username', 'a_sername', 'required|alpha');//用户名只能是字母组成且不能为空
			$this->form_validation->set_rules('a_password', 'a_password', 'required|alpha_numeric');//密码只能由字母跟数字组成且不能为空
			if($this->form_validation->run() == FALSE){
				alert('用户名或者密码格式不正确','admin/main/admin_manage');
				exit;
			}
			$data=Array(
				'a_id'=>$change_admin['a_id'],
				'a_username'=>$change_admin['a_username'],
				'a_password'=>md5(trim($change_admin['a_password'])),
				'a_addtime'=>time()
			);
			$result=$this->data_admin->admin_change($data);
			if($result){
				alert('修改成功','admin/main/admin_manage');
				exit;
			}else{
				alert('修改失败','admin/main/admin_manage');
				exit;
			}
		}else{
			$a_id=$this->uri->segment(4,1);
			$admin_info=$this->data_admin->admin_getone($a_id);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'admin_info'=>$admin_info
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/admin_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 管理员管理
	 *
	 */
	public function admin_manage(){
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$admin_list=$this->data_admin->admin_show($start,$limit);
		$total_rows=$this->data_admin->total_count();
		$config['base_url'] = site_url('admin/main/admin_manage/');
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
			'admin_list'=>$admin_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/admin_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 删除管理员信息
	 *
	 */
	public function admin_delete(){
		$a_id=$this->uri->segment(4,1);
		$result=$this->data_admin->admin_delete($a_id);
		if($result){
			alert('删除成功！','admin/main/admin_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/admin_manage');
			exit;
		}
	}
	/**
	 * 修改密码
	 *
	 */
	public function change_password(){
		$password_data=$this->input->post();
		$a_id=$this->session->userdata('a_id');
		if($password_data){
			$this->form_validation->set_rules('new_password', 'new_password', 'required|alpha_numeric');//密码只能由字母跟数字组成且不能为空
			if($this->form_validation->run() == FALSE){
				alert('密码格式不正确','admin/main/change_password');
				exit;
			}
			$userinfo=$this->data_admin->admin_getone($a_id);
			if($userinfo[0]['a_password']!=md5(trim($password_data['old_password']))){
				alert('原密码输入不正确','admin/main/change_password');
				exit;
			}elseif(trim($password_data['new_password'])!=trim($password_data['new_password2'])){
				alert('两次输入的密码不一致','admin/main/change_password');
				exit;
			}else{
				$data=Array(
					'a_id'=>$a_id,
					'a_password'=>md5(trim($password_data['new_password']))
				);
				$result=$this->data_admin->admin_change($data);
				if($result){
					alert('密码修改成功','admin/main/index');
					exit;
				}else{
					alert('密码修改失败','admin/main/change_password');
					exit;
				}
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/change_password');
			$this->load->view('admin/footer');
		}
	}
	/**
	* 班级管理
	*
	*/
	public function class_manage(){
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$courseteacher_list=$this->data_courseteacher->courseteacher_show($start,$limit);
		if(!$courseteacher_list){
			alert('没有添加任何课程班级','admin/main/subject');
			exit;
		}
		$total_rows=$this->data_courseteacher->total_count();
		$config['base_url'] = site_url('admin/main/class_manage/');
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
			'courseteacher_list'=>$courseteacher_list
		);
		//print_r($data);exit;
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/class_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 班级添加
	 *
	 */
	public function class_add(){
		$add_class=$this->input->post();
		$course_id=$this->uri->segment(4,1);
		if($add_class){
			$this->form_validation->set_rules('ct_number', 'ct_number', 'required|numeric');//班级容量必须为整数，且不能为空
			if($this->form_validation->run() == FALSE){
				alert('班级容量必须为整数，且不能为空','admin/main/class_add');
				exit;
			}
			$if_add=$this->data_courseteacher->courseteacher_getrepeat($add_class['ct_week'],$add_class['ct_time_id'],$add_class['ct_classroom_id'],'classroom');//如果这一天这一节课这一个教室有人上课，则不能选
			//var_dump($if_add);exit;
			if($if_add[0]['c']!=0){
				alert('课程课室安排冲突','admin/main/class_add');
				exit;
			}else{
				$if_add2=$this->data_courseteacher->courseteacher_getrepeat($add_class['ct_week'],$add_class['ct_time_id'],$add_class['ct_teacher_id'],'teacher');//如果同一个老师在同一天同一节课选择教不同课程，则不允许
				if($if_add2[0]['c']!=0){
					alert('课程教师安排冲突','admin/main/class_add');
					exit;
				}else{
					$data=Array(
						'ct_course_id'=>$add_class['ct_course_id'],
						'ct_teacher_id'=>$add_class['ct_teacher_id'],
						'ct_classroom_id'=>$add_class['ct_classroom_id'],
						'ct_time_id'=>$add_class['ct_time_id'],
						'ct_number'=>$add_class['ct_number'],
						'ct_week'=>$add_class['ct_week'],
						'ct_addtime'=>time()
					);
					$result=$this->data_courseteacher->courseteacher_add($data);
					if($result){
						alert('添加成功','admin/main/class_manage/');
						exit;
					}else{
						alert('添加失败','admin/main/class_add'.$course_id);
						exit;
					}
				}
			}
		}else{
			$week_list=Array(
				'1'=>'星期一',
				'2'=>'星期二',
				'3'=>'星期三',
				'4'=>'星期四',
				'5'=>'星期五',
				'6'=>'星期六',
				'7'=>'星期日',
			);
			$course_info=$this->data_course->course_getone($course_id);
			$time_list=$this->data_time->time_show(0,1000);
			$teacher_list=$this->data_teacher->teacher_show(0,10000,$course_info[0]['c_subject']);
			$classroom_list=$this->data_classroom->classroom_show(0,10000);			
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'course_info'=>$course_info,
				'classroom_list'=>$classroom_list,
				'time_list'=>$time_list,
				'teacher_list'=>$teacher_list,
				'week_list'=>$week_list
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/class_add',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	*	班级信息修改
	*
	*/
	public function class_change(){
		$change_class=$this->input->post();
		if($change_class){
			$this->form_validation->set_rules('ct_number', 'ct_number', 'required|numeric');//班级容量必须为整数，且不能为空
			if($this->form_validation->run() == FALSE){
				alert('班级容量必须为整数，且不能为空','admin/main/class_add');
				exit;
			}
			//print_r($change_class);exit;
			$if_add=$this->data_courseteacher->courseteacher_getrepeat($change_class['ct_week'],$change_class['ct_time_id'],$change_class['ct_classroom_id'],'classroom',$change_class['ct_id']);//如果这一天这一节课这一个教室有人上课，则不能选
			if($if_add[0]['c']!=0){
				alert('课程课室安排冲突','admin/main/class_manage');
				exit;
			}else{
				$if_add2=$this->data_courseteacher->courseteacher_getrepeat($change_class['ct_week'],$change_class['ct_time_id'],$change_class['ct_teacher_id'],'teacher',$change_class['ct_id']);//如果同一个老师在同一天同一节课选择教不同课程，则不允许
				if($if_add2[0]['c']!=0){
					alert('课程教师安排冲突','admin/main/class_manage');
					exit;
				}else{
					$data=Array(
						'ct_course_id'=>$change_class['ct_course_id'],
						'ct_teacher_id'=>$change_class['ct_teacher_id'],
						'ct_classroom_id'=>$change_class['ct_classroom_id'],
						'ct_time_id'=>$change_class['ct_time_id'],
						'ct_week'=>$change_class['ct_week'],
						'ct_number'=>$change_class['ct_number'],
						'ct_id'=>$change_class['ct_id']
					);
					$result=$this->data_courseteacher->courseteacher_change($data);
					if($result){
						alert('修改成功','admin/main/class_manage/');
						exit;
					}else{
						alert('修改失败','admin/main/class_manage');
						exit;
					}
				}
			}
		}else{
			$week_list=Array(
				'1'=>'星期一',
				'2'=>'星期二',
				'3'=>'星期三',
				'4'=>'星期四',
				'5'=>'星期五',
				'6'=>'星期六',
				'7'=>'星期日',
			);
			$ct_id=$this->uri->segment(4,1);
			$courseteacher_info=$this->data_courseteacher->courseteacher_getone($ct_id);
			//print_r($courseteacher_info);exit;
			$course_info=$this->data_course->course_getone($courseteacher_info[0]['ct_course_id']);
			$time_list=$this->data_time->time_show(0,1000);
			$teacher_list=$this->data_teacher->teacher_show(0,10000,$courseteacher_info[0]['su_id']);
			$classroom_list=$this->data_classroom->classroom_show(0,10000);			
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'course_info'=>$course_info,
				'classroom_list'=>$classroom_list,
				'time_list'=>$time_list,
				'teacher_list'=>$teacher_list,
				'week_list'=>$week_list,
				'courseteacher_info'=>$courseteacher_info
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/class_change',$data);
			$this->load->view('admin/footer');
		}
		
	}
	/**
	 *删除班级信息
	 *
	 */
	public function class_delete(){
		$c_id=$this->uri->segment(4,1);
		$result=$this->data_courseteacher->courseteacher_delete($c_id);
		if($result){
			alert('删除成功！','admin/main/class_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/class_manage');
			exit;
		}
	}
	/**
	 * 课程添加
	 *
	 */
	public function course_add(){
		$add_course=$this->input->post();
		if($add_course){
			$this->form_validation->set_rules('c_coursename', 'c_coursename', 'required');
			$this->form_validation->set_rules('c_credit', 'c_credit', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确（课程名不能为空，学分不能为空且只能是数字）','admin/main/course_add');
				exit;
			}
			$data=Array(
				'c_coursename'=>$add_course['c_coursename'],
				'c_subject'=>$add_course['c_subject'],
				'c_credit'=>$add_course['c_credit'],
				'c_describe'=>$add_course['c_describe'],
				'c_addtime'=>time()
			);
			$result=$this->data_course->course_add($data);
			if($result){
				alert('添加成功','admin/main/subject');
				exit;
			}else{
				alert('添加失败','admin/main/course_add');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,1000);
			$data=Array(
				'subject_list'=>$subject_list
			);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/course_add',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 课程修改
	 *
	 */
	public function course_change(){
		$change_course=$this->input->post();
		if($change_course){
			$this->form_validation->set_rules('c_coursename', 'c_coursename', 'required');
			$this->form_validation->set_rules('c_credit', 'c_credit', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确（课程名不能为空，学分不能为空且只能是数字）','admin/main/course_add');
				exit;
			}
			$data=Array(
				'c_coursename'=>$change_course['c_coursename'],
				'c_subject'=>$change_course['c_subject'],
				'c_credit'=>$change_course['c_credit'],
				'c_describe'=>$change_course['c_describe'],
				'c_id'=>$change_course['c_id']
			);
			$result=$this->data_course->course_change($data);
			if($result){
				alert('修改成功','admin/main/subject');
				exit;
			}else{
				alert('修改失败','admin/main/course_add');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,1000);
			$c_id=$this->uri->segment(4,1);
			$course_info=$this->data_course->course_getone($c_id);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'course_info'=>$course_info,
				'subject_list'=>$subject_list
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/course_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 *删除课程信息
	 *
	 */
	public function course_delete(){
		$c_id=$this->uri->segment(4,1);
		$result=$this->data_course->course_delete($c_id);
		if($result){
			alert('删除成功！','admin/main/subject');
			exit;
		}else{
			alert('删除失败！','admin/main/subject');
			exit;
		}
	}

	/**
	 * 学生信息管理
	 *
	 */
	public function student_manage(){	
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$student_list=$this->data_student->student_show($start,$limit);
		$total_rows=$this->data_student->total_count();
		$config['base_url'] = site_url('admin/main/student_manage/');
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
			'student_list'=>$student_list
		);
		//print_r($data);exit;
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/student_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加学生信息
	 *
	 */
	public function student_add(){
		$add_student=$this->input->post();
		if($add_student){
			$this->form_validation->set_rules('s_username', 's_username', 'required');
			$this->form_validation->set_rules('s_grade', 's_grade', 'required|numeric');
			$this->form_validation->set_rules('s_class', 's_class', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确','admin/main/student_add');
				exit;
			}
			$data=Array(
				's_username'=>$add_student['s_username'],
				's_password'=>md5(1234),
				's_subject'=>$add_student['s_subject'],
				's_grade'=>$add_student['s_grade'],
				's_class'=>$add_student['s_class'],
				's_addtime'=>time()
			);
			$result=$this->data_student->student_add($data);
			if($result){
				alert('添加成功','admin/main/student_manage');
				exit;
			}else{
				alert('添加失败','admin/main/student_manage');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,10000);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'subject_list'=>$subject_list,
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/student_add',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 修改学生信息
	 *
	 */
	public function student_change(){
		$change_student=$this->input->post();
		if($change_student){
			$this->form_validation->set_rules('s_username', 's_username', 'required');
			$this->form_validation->set_rules('s_grade', 's_grade', 'required|numeric');
			$this->form_validation->set_rules('s_class', 's_class', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确','admin/main/student_change');
				exit;
			}
			$data=Array(
				's_username'=>$change_student['s_username'],
				's_password'=>md5(1234),
				's_subject'=>$change_student['s_subject'],
				's_grade'=>$change_student['s_grade'],
				's_class'=>$change_student['s_class'],
				's_id'=>$change_student['s_id']
			);
			$result=$this->data_student->student_change($data);
			if($result){
				alert('添加成功','admin/main/student_manage');
				exit;
			}else{
				alert('添加失败','admin/main/student_manage');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,10000);	
			$s_id=$this->uri->segment(4,1);
			$student_info=$this->data_student->student_getone($s_id);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);			
			$data=Array(
				'subject_list'=>$subject_list,
				'student_info'=>$student_info
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/student_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 删除学生信息
	 *
	 */
	public function student_delete(){
		$s_id=$this->uri->segment(4,1);
		$result=$this->data_student->student_delete($s_id);
		if($result){
			alert('删除成功！','admin/main/student_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/student_manage');
			exit;
		}
	}
	/**
	 * 教师信息管理
	 *
	 */
	public function teacher_manage(){	
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$teacher_list=$this->data_teacher->teacher_show($start,$limit);
		$total_rows=$this->data_teacher->total_count();
		$config['base_url'] = site_url('admin/main/teacher_manage/');
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
			'teacher_list'=>$teacher_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/teacher_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加教师信息
	 *
	 */
	public function teacher_add(){
		$add_teacher=$this->input->post();
		if($add_teacher){
			$this->form_validation->set_rules('t_username', 't_username', 'required');
			if($this->form_validation->run() == FALSE){
				alert('教师姓名不能为空','admin/main/teacher_add');
				exit;
			}
			$data=Array(
				't_username'=>$add_teacher['t_username'],
				't_password'=>md5(1234),
				't_subject'=>$add_teacher['t_subject'],
				't_addtime'=>time()
			);
			$result=$this->data_teacher->teacher_add($data);
			if($result){
				alert('添加成功','admin/main/teacher_manage');
				exit;
			}else{
				alert('添加失败','admin/main/teacher_manage');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,10000);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$data=Array(
				'subject_list'=>$subject_list,
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/teacher_add',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 修改教师信息
	 *
	 */
	public function teacher_change(){
		$change_teacher=$this->input->post();
		if($change_teacher){
			$this->form_validation->set_rules('t_username', 't_username', 'required');
			if($this->form_validation->run() == FALSE){
				alert('教师姓名不能为空','admin/main/teacher_change');
				exit;
			}
			$data=Array(
				't_username'=>$change_teacher['t_username'],
				't_subject'=>$change_teacher['t_subject'],
				't_id'=>$change_teacher['t_id']
			);
			$result=$this->data_teacher->teacher_change($data);
			if($result){
				alert('修改成功','admin/main/teacher_manage');
				exit;
			}else{
				alert('修改失败','admin/main/teacher_manage');
				exit;
			}
		}else{
			$subject_list=$this->data_subject->subject_show(0,10000);	
			$t_id=$this->uri->segment(4,1);
			$teacher_info=$this->data_teacher->teacher_getone($t_id);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);			
			$data=Array(
				'subject_list'=>$subject_list,
				'teacher_info'=>$teacher_info
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/teacher_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 删除教师信息
	 *
	 */
	public function teacher_delete(){
		$t_id=$this->uri->segment(4,1);
		$result=$this->data_teacher->teacher_delete($t_id);
		if($result){
			alert('删除成功！','admin/main/teacher_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/teacher_manage');
			exit;
		}
	}
	/**
	 * 课室管理
	 *
	 */
	public function classroom_manage(){
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$classroom_list=$this->data_classroom->classroom_show($start,$limit);
		$total_rows=$this->data_classroom->total_count();
		$config['base_url'] = site_url('admin/main/classroom_manage/');
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
			'classroom_list'=>$classroom_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/classroom_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加课室
	 *
	 */
	public function classroom_add(){
		$add_classroom=$this->input->post();
		if($add_classroom){
			$this->form_validation->set_rules('cl_classroomname', 'cl_classroomname', 'required');
			$this->form_validation->set_rules('cl_seat', 'cl_seat', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确','admin/main/classroom_add');
				exit;
			}
			$data=Array(
				'cl_classroomname'=>$add_classroom['cl_classroomname'],
				'cl_seat'=>$add_classroom['cl_seat'],
				'cl_addtime'=>time()
			);
			$result=$this->data_classroom->classroom_add($data);
			if($result){
				alert('添加成功','admin/main/classroom_manage');
				exit;
			}else{
				alert('添加失败','admin/main/classroom_manage');
				exit;
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/classroom_add');
			$this->load->view('admin/footer');
		}
	}
	/**
	 * 修改课室信息
	 *
	 */
	public function classroom_change(){
		$change_classroom=$this->input->post();
		if($change_classroom){
			$this->form_validation->set_rules('cl_classroomname', 'cl_classroomname', 'required');
			$this->form_validation->set_rules('cl_seat', 'cl_seat', 'required|numeric');
			if($this->form_validation->run() == FALSE){
				alert('表单输入格式不正确','admin/main/classroom_change');
				exit;
			}
			$data=Array(
				'cl_classroomname'=>$change_classroom['cl_classroomname'],
				'cl_seat'=>$change_classroom['cl_seat'],
				'cl_id'=>$change_classroom['cl_id'],
			);
			$result=$this->data_classroom->classroom_change($data);
			if($result){
				alert('修改成功','admin/main/classroom_manage');
				exit;
			}else{
				alert('修改失败','admin/main/classroom_manage');
				exit;
			}
		}else{
			$cl_id=$this->uri->segment(4,1);
			$classroom_info=$this->data_classroom->classroom_getone($cl_id);
			$data=Array(
				'classroom_info'=>$classroom_info
			);
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/classroom_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 *删除课室信息
	 *
	 */
	public function classroom_delete(){
		$cl_id=$this->uri->segment(4,1);
		$classroom_info=$this->data_classroom->classroom_delete($cl_id);
		if($classroom_info){
			alert('删除成功！','admin/main/classroom_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/classroom_manage');
			exit;
		}
	}
	/**
	 * 专业管理
	 *
	 */
	public function subject_manage(){
		$this->load->library('pagination');	
		$page = $this->uri->segment(4,1);
		$limit = 10;
		$start = ($page - 1) * $limit;
		$subject_list=$this->data_subject->subject_show($start,$limit);
		$total_rows=$this->data_subject->total_count();
		$config['base_url'] = site_url('admin/main/subject/');
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
			'subject_list'=>$subject_list
		);
		$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
		);
		//print_r($data);exit;
		$this->load->view('admin/header',$userinfo);
		$this->load->view('admin/subject_manage',$data);
		$this->load->view('admin/footer');
	}
	/**
	 * 添加专业
	 *
	 */
	public function subject_add(){
		$add_subject=$this->input->post();
		if($add_subject){
			$this->form_validation->set_rules('su_subjectname', 'su_subjectname', 'required');
			if($this->form_validation->run() == FALSE){
				alert('专业名不能为空','admin/main/subject_add');
				exit;
			}
			$data=Array(
				'su_subjectname'=>$add_subject['su_subjectname'],
				'su_addtime'=>time(),
			);
			$result=$this->data_subject->subject_add($data);
			if($result){
				alert('添加成功','admin/main/subject_manage');
				exit;
			}else{
				alert('添加失败','admin/main/subject_manage');
				exit;
			}
		}else{
			$userinfo=Array(
				'username'=>$this->session->userdata('a_username'),
				'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/subject_add');
			$this->load->view('admin/footer');
		}
	}
	/**
	 *修改专业信息
	 *
	 */
	public function subject_change(){
		$change_subject=$this->input->post();
		if($change_subject){
			$this->form_validation->set_rules('su_subjectname', 'su_subjectname', 'required');
			if($this->form_validation->run() == FALSE){
				alert('专业名不能为空','admin/main/subject_change');
				exit;
			}
			$data=Array(
				'su_subjectname'=>$change_subject['su_subjectname'],
				'su_id'=>$change_subject['su_id'],
			);
			$result=$this->data_subject->subject_change($data);
			if($result){
				alert('修改成功','admin/main/subject_manage');
				exit;
			}else{
				alert('修改失败','admin/main/subject_manage');
				exit;
			}
		}else{
			$su_id=$this->uri->segment(4,1);
			$subject_info=$this->data_subject->subject_getone($su_id);
			$data=Array(
				'subject_info'=>$subject_info
			);
			$userinfo=Array(
			'username'=>$this->session->userdata('a_username'),
			'identity'=>$this->session->userdata('identity')
			);
			$this->load->view('admin/header',$userinfo);
			$this->load->view('admin/subject_change',$data);
			$this->load->view('admin/footer');
		}
	}
	/**
	 *删除专业信息
	 *
	 */
	public function subject_delete(){
		$su_id=$this->uri->segment(4,1);
		$subject_info=$this->data_subject->subject_delete($su_id);
		if($subject_info){
			alert('删除成功！','admin/main/subject_manage');
			exit;
		}else{
			alert('删除失败！','admin/main/subject_manage');
			exit;
		}
	}
}

?>