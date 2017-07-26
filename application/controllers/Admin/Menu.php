<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/20
 * Time: 16:47
 */

class Menu extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['menus'] = $this->get_all_menu($this->admin['id']);    //获取树状菜单列表
		$this->display('/Menu/index',$data);
	}

	/**
	 * 添加菜单
	 */
	public function add()
	{
		if(IS_POST) {
			$data['title']  = trim($this->input->post('title'));    //操作规则中文名称
			$data['name']   = $this->input->post('name');    //操作名（控制器/方法）
			$data['icon']   = $this->input->post('icon')??'';    //操作规则图标
			$data['sort']   = $this->input->post('sort')??1;    //排序
			$data['status'] = $this->input->post('status')??1;    //是否显示
			$data['explain']= $this->input->post('explain')??'';    //描述
			$res = $this->Auth->_add($data);
			if($res == false) {
				$error['msg'] = '添加菜单失败，请稍后再试！';
				$this->error($error);
			} else {
				$success['msg'] = '添加菜单成功！';
				$success['url'] = 'index';
				$this->success($success);
			}
 		} else {
			$data['menus'] = $this->get_all_menu($this->admin['id']);    //获取树状菜单列表
			$this->display('/Menu/add',$data);
		}
	}

	/**
	 * 编辑菜单
	 */
	public function edit()
	{
		if(IS_POST) {

		} else {
			$id = $this->input->get('id')??false;
			if(!$id) {
				$error['msg'] = '参数不正确，请稍后再试！';
				$this->error($error);
			}
			$data['menus'] = $this->get_all_menu($this->admin['id']);    //获取树状菜单列表
			$auth = $this->Admin->getAdminAuth($this->admin['id'],['auth.auth_id'=>$id]);    //获取当前菜单
			if($auth) {
				$data['auth'] = $auth[0];
				$this->display('/Menu/edit',$data);
			} else {
				$error['msg'] = '当前菜单不正确，请稍后再试！';
				$this->error($error);
			}
		}
	}

	/**
	 * @param $id int 管理员id
	 * @return mixed
	 */
	public function get_all_menu($id)
	{
		if(!is_int($id)) {
			return false;
		}
		$menus = $this->Admin->getAdminAuth($id);    //获取菜单权限列表
		return $this->get_menu_tree($menus);
	}


}