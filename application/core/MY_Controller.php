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
	 * Ajax方式返回数据到客户端
	 * @param $data mixed 需要返回的数据
	 * @param string $type Ajax返回数据格式
	 */
	protected function ajaxReturn($data,$type='') {
		$type = $type ? $type:'JSON';
		switch (strtoupper($type)){
			case 'JSON' :
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				exit(json_encode($data));
			case 'XML'  :
				// 返回xml格式数据
				header('Content-Type:text/xml; charset=utf-8');
				exit(xml_encode($data));
			case 'JSONP':
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				$handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
				exit($handler.'('.json_encode($data).');');
			case 'EVAL' :
				// 返回可执行的js脚本
				header('Content-Type:text/html; charset=utf-8');
				exit($data);
		}
	}
}