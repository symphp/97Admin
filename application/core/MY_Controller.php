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
	protected $setting = [];    //系统设置

	protected $page = 1;
	protected $pageSize = 10;
	protected $configPage = [];//分页样式配置

	public function __construct()
	{
		parent::__construct();
		$this->load->set_ci_view_dir(ADMIN_VIEW_DIR);    //设置后台视图路径
		$flag = false;

		/** -------------- 验证用户是否登录，获取登录用户信息 ---------------- **/
		$token = $this->session->userdata('token');

		//如果是登录，显示登录页面
		if (ucfirst($this->router->fetch_class()) == 'Login') {
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

		if($flag == false) {
			header("Location: /Admin/Login");
			exit();
		}

		/** ---------------- 判断操作是否有权限，获取权限列表 ----------------**/
		$superAdmin = $this->Admin->SuperAdmin($this->admin['id']);    //是否是超级管理员

		$auth_name = ucfirst($this->router->fetch_class().'/'.$this->router->fetch_method());    //当前操作与方法

		//如果是超级管理员不用验证操作权限
		if($superAdmin) {
			$checkAuthName = $this->Auth->_get('auth_id',['auth.name'=>$auth_name]);
		} else {
			$checkAuthName = $this->Admin->getAdminAuth($this->admin['id'],['auth.name'=>$auth_name]);    //判断当前操作是否有权限
		}
		if($checkAuthName == false) {
			header("Location: /Admin/Login/authError");
			exit();
		} else {
			$this->current = $this->Auth->get_current_auth($checkAuthName[0]['auth_id'])??'';    //获取当前操作方法
		}

		if($superAdmin) {
			$admin_auth_arr = $this->Auth->_get('*',['status'=>1]);    //管理员获取所菜单
		} else {
			$admin_auth_arr = $this->Admin->getAdminAuth($this->admin['id']);    //获取角色所有权限
		}

		$this->menu = $this->get_menu_tree($admin_auth_arr);    //获取菜单列表
		$this->setting = $this->Setting->getAll();    //获取系统设置

		/** ---------------- 分页样式 ----------------**/
		$this->pageStyle();
	}

	/**
	 * 渲染后台视图
	 * @param $view string 视图路径
	 * @param null $data 数据
	 */
	protected function display($view, $data = null)
	{
		$data['admin'] = $this->admin;    //管理员信息
		$data['menus'] = $this->menu;    //左侧菜单
		$data['current'] = $this->current;    //当前操作方法
		$data['setting'] = $this->setting;    //系统设置

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

		foreach ($items as $item) {
			if (isset($tmpMap[$item[$pid]])) {
				$tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
			} else {
				$tree[] = &$tmpMap[$item[$id]];
			}
		}
		return $tree;
	}

	protected function pageStyle()
	{
		$this->configPage['uri_segment'] = 3;
		$this->configPage['num_links'] = 10;
		$this->configPage['use_page_numbers'] = TRUE;
		$this->configPage['page_query_string'] = true;
		$this->configPage['query_string_segment'] = 'page';
		$this->configPage['reuse_query_string'] = true;
		$this->configPage['full_tag_open'] = '<div><ul class="pagination" style="margin:0">';
		$this->configPage['full_tag_close'] = '</ul></div>';

		$this->configPage['first_link'] = '<<';
		$this->configPage['first_tag_open'] = '<li>';
		$this->configPage['first_tag_close'] = '</li>';
		$this->configPage['first_url'] = '?page=1';
		//$this->configPage['first_url'] = ''; //自动生成请求条件

		$this->configPage['last_tag_open'] = '<li >';
		$this->configPage['last_tag_close'] = '</li>';
		$this->configPage['last_link'] = '末页';
		$this->configPage['next_link'] = '>>';
		$this->configPage['next_tag_open'] = '<li class="disabled">';
		$this->configPage['next_tag_close'] = '</li>';
		$this->configPage['next_tag_open'] = '<li>';
		$this->configPage['next_tag_close'] = '</li>';
		$this->configPage['prev_link'] = '<<';
		$this->configPage['prev_tag_open'] = '<li>';
		$this->configPage['prev_tag_close'] = '</li>';
		$this->configPage['cur_tag_open'] = '<li class="active"><a href="#">';
		$this->configPage['cur_tag_close'] = '</a></li>';
		$this->configPage['num_tag_open'] = '<li>';
		$this->configPage['num_tag_close'] = '</li>';
	}

}