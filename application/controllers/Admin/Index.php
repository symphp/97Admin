<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/7/6
 * Time: 14:23
 */
class Index extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','Admin');
	}

	/**
	 * 后台首页
	 */
	public function index()
	{
		$this->display('index');
	}

	/**
	 * 个人资料
	 */
	public function user()
	{
		if(IS_POST) {

		} else {
			$data['admin']  = $this->admin;
			$data['selects'] = array(
				array('status' => '3', 'msg' => '保密'),
				array('status' => '2', 'msg' => '男'),
				array('status' => '1', 'msg' => '女')
			);
			$this->display('Index/user',$data);
		}
	}

}