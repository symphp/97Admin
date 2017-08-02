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
			$roles[$key]['status'] = $this->AdminRole->msg['status'][$role['status']];    //获取对于说明
		}
		$data['roles'] = $roles;
		$this->display('Role/index',$data);
	}


	public function add()
	{
		if(IS_POST) {

		} else {
			$res = $this->Auth->_get('*',['status'=>1]);
			if($res == false) {
				$data['menus'] = [];
			} else {
				$data['menus'] = $this->get_menu_tree($res);    //获取所有权限菜单
			}
			$this->display('Role/add',$data);
		}
	}
}