<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/3
 * Time: 22:44
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Home_Controller
 * 前台父控制器
 */
class Home_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->set_ci_view_dir(HOME_VIEW_DIR);    //设置前台视图路径
	}
}

/**
 * Class Admin_Controller
 * 后台父控制器
 */
class Admin_Controller extends CI_Controller {

	protected $_layout = 'Public/layout';

	public $adminUser = '';

	public function __construct()
	{
		parent::__construct();

		$this->load->set_ci_view_dir(ADMIN_VIEW_DIR);    //设置后台视图路径

		$flag = false;

		/** -------------- 验证用户是否登录，获取登录用户信息 ---------------- **/
		$token = $this->session->userdata('token');
		if($this->router->fetch_class() == 'Login') {
			return false;
		}
		if($token) {
			$admin  = $this->Admin->_getOne('*',['token'=>$token,'status'=>1]);
			if($admin) {
				$flag = true;
				$admin['head_pic'] = json_decode($admin['head_pic']);
				$this->adminUser = $admin;    //保存用户信息
			}
		}

		if($flag == false){
			header("Location: /Admin/Login/");
			exit();
		}
		/** ---------------- 判断操作是否有权限，获取权限列表 ----------------**/
		$auth_name = ucfirst($this->router->fetch_class().'/'.$this->router->fetch_method());
		$checkAuthNaME = $this->Admin->getAdminAuth($this->adminUser['id'],['auth.name'=>$auth_name]);
		if($checkAuth_res == false) {
			header("Location: /Admin/Login/authError");
			exit();
		}
		$admin_auth_arr = $this->Admin->getAdminAuth($this->adminUser['id']);    //获取角色权限

		foreach ($admin_auth_arr as $key => $admin_auth) {
			if($admin_auth['role_id'] == 1) {    //超级管理员
				return false;
			} else {

			}
		}
	}

	/**
	 * 渲染后台视图
	 * @param $view string 视图路径
	 * @param null $data 数据
	 */
	protected function display($view, $data = null)
	{
		$data['adminUser'] = $this->adminUser;
		$layout_data['content'] = $this->load->view($view,$data,true);
		$this->load->view($this->_layout,$layout_data);
	}

	/**
	 * 成功跳转页面
	 * @param null $success
	 */
	protected function success($success = null)
	{
		$data['success'] = $success;
		$this->load->view('Public/header',$data);
		$this->load->view('Public/footer');
		$this->load->view('success');
	}

	/**
	 * 错误跳转页面
	 * @param null $error
	 */
	protected function error($error = null)
	{
		$data['error'] = $error;
		$this->load->view('Public/header',$data);
		$this->load->view('Public/footer');
		$this->load->view('error');
	}

	/**
	 * 添加操作日志
	 * @param $log string 操作说明
	 * @param string $admin_id
	 * @return mixed
	 */
	protected function add_log($log,$admin_id = '')
	{
		$this->load->model('AdminLog_model','AdminLog');
		return $this->AdminLog->add($log,$admin_id);
	}
}