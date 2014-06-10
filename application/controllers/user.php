<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('data_admin');
		$this->load->model('data_student');
		$this->load->model('data_teacher');	
	}
	public function index()
	{	
		$data=$this->input->post();
		if($data){
			$this->login($data);
		}else{			
			if($this->session->userdata('a_islogin')==1){//已登录的用户身份为管理员
				redirect('admin/main/index');
			}elseif($this->session->userdata('s_islogin')==1){//已登录用户的身份为学生
				redirect('student/main/index');
			}elseif($this->session->userdata('t_islogin')==1){//已登录用户的身份为教师
				redirect('teacher/main/index');
			}else{//没有用户登录	
				$this->load->view('login');
			}
		}		
	}
	private function login($info){
		$info['password']=md5($info['password']);
		if($info['identity']==0){//管理员登录
			$result=$this->data_admin->admin_check($info);
			$this->session->set_userdata('a_islogin', 0);
			//print_r($result);exit;
			if($result){
				$userdata = array(
					'a_id'  =>$result['a_id'] ,
                   'a_username'  =>$result['a_username'] ,
                   'a_islogin' => 1,
				   'identity'=>0
               );
			   $this->session->set_userdata($userdata);
			   redirect('admin/main/index');
			}else{
				alert('用户名或密码错误！','user');
				exit;
			}
		}elseif($info['identity']==1){//学生登录
			$result=$this->data_student->student_check($info);
			$this->session->set_userdata('s_islogin', 0);
			//print_r($result);exit;
			if($result){
				$userdata = array(
					's_id'  =>$result['s_id'] ,
                   's_username'  =>$result['s_username'] ,
                   's_islogin' => 1,
				   's_subject'=>$result['s_subject'], 
				   'identity'=>1
               );
			   $this->session->set_userdata($userdata);
			   redirect('student/main/index');
			}else{
				alert('用户名或密码错误！','user');
				exit;
			}
		}else{//教师登录
			$result=$this->data_teacher->teacher_check($info);
			$this->session->set_userdata('t_islogin', 0);
			//print_r($result);exit;
			if($result){
				$userdata = array(
					't_id'  =>$result['t_id'] ,
                   't_username'  =>$result['t_username'] ,
                   't_islogin' => 1,
				   'identity'=>2
               );
			   $this->session->set_userdata($userdata);
			   redirect('teacher/main/index');
			}else{
				alert('用户名或密码错误！','user');
				exit;
			}
		}
	}
	public function logout(){
		$identity=$this->uri->segment(3,1);
		//echo $identity;exit;
		if($identity==0){//管理员退出
			$this->session->unset_userdata('a_islogin');
		}elseif($identity==1){//学生退出
			$this->session->unset_userdata('s_islogin');
		}else{//教师退出
			$this->session->unset_userdata('t_islogin');
		}
		$this->session->unset_userdata('identity');
		redirect('user');
	}
}



?>