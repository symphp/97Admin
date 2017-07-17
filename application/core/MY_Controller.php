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
	 * @param null $data
	 */
	protected function success($data = null)
	{
		$this->load->view('Public/header',$data);
		$this->load->view('Public/footer');
		$this->load->view('success');
	}

	/**
	 * 错误跳转页面
	 * @param null $data
	 */
	protected function error($data = null)
	{
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