<?php

/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/5
 * Time: 22:10
 */
class Login extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('Admin_model','Admin');
	}

	public function index()
	{
		$this->load->view('login');
	}

	/**
	 * 生成验证码并保存到session
	 */
	public function verifyCode()
	{
		//调用函数生成验证码
		$vals = array('img_width' => '100', 'img_height' => '48', 'word_length' => 4);
		$verify_code = create_captcha($vals);
		$this->session->set_userdata('verify_code', strtolower($verify_code));
	}

	/**
	 * 登录处理
	 */
	public function handleLogin()
	{
		$verify_code = $this->input->post('verify_code');
		if($verify_code && strtolower($verify_code) == $_SESSION['verify_code']??'') {
			$username = $this->input->post('username')??'';
			$password = $this->input->post('password')??'';
			$remeber  = $this->input->post('remeber')??false;
			$admin_info = $this->Admin->checkUser($username,$password);
			if($admin_info) {
				$token = md5($admin_info['username'].uniqid());    //登录认证
				$update_res = $this->Admin->_update(['token'=>$token],['id'=>$admin_info['id']]);    //存入token认证
				if($remeber) {
					$this->session->set_userdata('token', $token);
				} else {
					$this->session->set_userdata('token', $token);
				}
				$data['msg'] = '登录成功';
				$data['url'] = '/admin/login/index';
				$data['status'] = 1;
				$this->add_log($data['msg'],$admin_info['id']);    //添加操作日志
				ajaxReturn($data);
			} else {
				$data['msg'] = '用户名或密码不正确';
				$data['status'] = 0;
				ajaxReturn($data);
			}
		} else {
			$data['msg'] = '验证码不正确';
			$data['status'] = 0;
			ajaxReturn($data);
		}
	}

	public function password()
	{
		$intermediateSalt = md5(uniqid(rand(), true));
		$salt = substr($intermediateSalt, 0, 6);
		echo hash("sha256", 'admin' . $salt);
	}

}