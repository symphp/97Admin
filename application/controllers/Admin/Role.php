<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/8/2
 * Time: 15:57
 */

class Role extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminRole_model','AdminRole');
	}

	/**
	 * 角色列表
	 */
	public function index()
	{
		$roles = $this->AdminRole->_get('*');
		foreach ($roles as $key => $role) {
//			$roles[$key]['status'] = $this->AdminRole->msg
		}
//		$this->display('Role/index',$data);
	}

	public function add()
	{
		
	}
}