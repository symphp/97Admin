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
			$roles[$key]['status'] = $this->AdminRole->msg['status'][$role['status']];    //获取对应说明
		}
		$data['roles'] = $roles;
		$this->display('Role/index',$data);
	}

	/**
	 * 添加角色
	 */
	public function add()
	{
		if(IS_POST) {
			$data['role_name'] = trim($this->input->post('role_name'));    //角色名称
			$data['status']    = $this->input->post('status') == 'on'?1:2;    //是否显示
			$data['explain']   = trim($this->input->post('explain'));    //角色说明
			$roles             = $this->input->post('role')??array();    //权限
			if(is_array($roles) && count($roles) > 0) {
				foreach ($roles as $role) {
					$rolesArr[]['auth_id'] = $role;    //转换成多维数组进行批量插入
				}
			} else {
				$rolesArr = array();
			}
			$res = $this->AdminRole->addRole($data,$rolesArr);    //添加角色
			if($res == false) {
				$error['msg'] = '添加角色失败';
				$this->error($error);
			} else {
				$success['msg'] = '添加角色成功';
				$success['url'] = 'index';
				$this->success($success);
			}
		} else {
			$res = $this->Auth->_get('*',['status'=>1],[],['sort'=>'desc','auth_id'=>'desc']);
			if($res == false) {
				$data['menus'] = array();
			} else {
				$data['menus'] = $this->get_menu_tree($res);    //获取所有权限菜单
			}
			$this->display('Role/add',$data);
		}
	}

	/**
	 * 删除角色（逻辑删除）
	 */
	public function del()
	{
		$role_id = $this->input->get('id')??0;
		if($role_id < 1) {
			$error['msg'] = '参数不正确，删除失败！';
			$this->error($error);
		}
		$res = $this->AdminRole->delRole($role_id);
		if($res == false) {
			$error['msg'] = '删除角色失败';
			$this->error($error);
		} else {
			$success['msg'] = '删除角色成功';
			$success['url'] = 'index';
			$this->success($success);
		}
	}
}