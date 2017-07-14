<?php

/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/8
 * Time: 22:49
 */
class Admin_model extends MY_Model
{
	public $_table = 'admin';

	/**
	 * 获取账号信息
	 * @param $username
	 * @param $password
	 * @return mixed
	 */
	public function checkUser($username,$password)
	{
		$where['username'] = $username;
		$user_info = $this->_getOne('*',$where);
		if(!$user_info) {
			return false;
		}
		if(encryptPass($password,$user_info['salt']) != $user_info['password']){    //判断密码是否正确
			return false;
		}
		return $user_info;
	}
}