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
	}

	public function index()
	{
		$this->load->view('login');
	}

	/**
	 * 生成验证码并保存到session
	 */
	public function verify_code()
	{
		//调用函数生成验证码
		$vals = array('img_width' => '100', 'img_height' => '48', 'word_length' => 4);
		$verify_code = create_captcha($vals);
		$this->session->set_userdata('verify_code', $verify_code);
	}

	/**
	 * 登录处理
	 */
	public function handle_login()
	{
		$verify_code = $this->input->get('verify_code');
		if($verify_code && $verify_code == $_SESSION['verify_code']??'') {
			$username = $this->input->get('username')??'';
			$password = $this->input->get('password')??'';
			$remeber  = $this->input->get('remeber')??false;
		} else {
			$data['msg'] = '验证码不正确';
			$data['status'] = 0;
			$this->ajaxReturn($data);
		}
	}
}