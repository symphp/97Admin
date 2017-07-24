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
		$this->load->model('Auth_model','Auth');
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
			$menus = $this->Auth->_get('*',['status'=>1]);
			$data['menus'] = $this->get_menu_tree($menus);    //获取树状菜单列表
			$this->display('/Menu/add',$data);
		}
	}

}