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

	protected $admin = [];    //管理员信息
	protected $menu = [];    //菜单列表
	protected $current = [];    //当前操作

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
			$admin  = $this->Admin->_getOne('id,username,head_pic,sex,phone,email',['token'=>$token,'status'=>1]);
			if($admin) {
				$flag = true;
				$admin['head_pic'] = json_decode($admin['head_pic']);
				$this->admin = $admin;    //保存用户信息
			}
		}
		if($flag == false){
			header("Location: /Admin/Login/");
			exit();
		}
		/** ---------------- 判断操作是否有权限，获取权限列表 ----------------**/
		$auth_name = ucfirst($this->router->fetch_class().'/'.$this->router->fetch_method());    //当前操作与方法

		$checkAuthName = $this->Admin->getAdminAuth($this->admin['id'],['auth.name'=>$auth_name]);    //判断当前操作是否有权限
		if($checkAuthName == false) {
			header("Location: /Admin/Login/authError");
			exit();
		} else {
			$this->current = $this->Auth->get_current_auth($checkAuthName[0]['auth_id']);
		}

		$admin_auth_arr = $this->Admin->getAdminAuth($this->admin['id']);    //获取角色所有权限
		$this->menu = $this->get_menu_tree($admin_auth_arr);    //获取菜单列表
	}

	/**
	 * 渲染后台视图
	 * @param $view string 视图路径
	 * @param null $data 数据
	 */
	protected function display($view, $data = null)
	{
		$data['admin'] = $this->admin;
		$data['menus'] = $this->menu;
		$data['current'] = $this->current;
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

	/**
	 * 操作菜单列表生成树状
	 * @param $items array 操作数组
	 * @param string $id
	 * @param string $pid
	 * @param string $son
	 * @return array
	 * @todo http://www.jb51.net/article/65840.htm
	 */
	protected function get_menu_tree($items,$id = 'auth_id',$pid = 'pid',$son = 'children')
	{
		$tmpMap  = array();
		$tree    = array();

		foreach ($items as $item) {
			$tmpMap[$item[$id]] = $item;
		}

		foreach($items as $item){
			if(isset($tmpMap[$item[$pid]])){
				$tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
			}else{
				$tree[] = &$tmpMap[$item[$id]];
			}
		}
		return $tree;
	}

}