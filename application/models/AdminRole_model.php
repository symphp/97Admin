<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/8/2
 * Time: 16:00
 */

class AdminRole_model extends MY_Model
{
	public $_table = 'admin_role';

	public $msg = array(
		'status' => array(
			'1' => '显示',
			'2' => '不显示'
		)
	);

	/**
	 * 添加角色
	 * @param $data  array 角色信息
	 * @param $rolesArr array 权限id
	 * @return bool
	 */
	public function addRole($data,$rolesArr)
	{
		$this->db->trans_begin();
		$role_id = $this->_add($data,'id');    //添加角色

		if(count($rolesArr) > 0) {    //勾选了权限
			foreach ($rolesArr as $key => $item) {
				$rolesArr[$key]['role_id'] = $role_id;
			}
			$this->_table = 'auth_role_accos';
			$this->_add($rolesArr);
		}

		if($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	/**
	 * 删除角色 （逻辑删除）
	 * @param int $role_id
	 * @return bool|mixed
	 */
	public function delRole(int $role_id)
	{
		return $this->AdminRole->_update(['status'=>2],['role_id'=>$role_id]);
	}
}