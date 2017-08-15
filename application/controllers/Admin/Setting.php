<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/27
 * Time: 17:21
 */

class Setting extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 网站设置
	 */
	public function setting()
	{
		if (IS_POST) {
			foreach ($_POST as $key=>$value) {
				$arr[$key]['key'] = trim($key);
				$arr[$key]['value'] = trim($value);
			}
			$res = $this->Setting->_update_batch($arr,'key');
			if ($res == false) {
				$error['msg'] = '网站设置失败，请稍后再试！';
				$this->error($error);
			} else {
				$success['msg'] = '网站设置成功！';
				$success['url'] = 'setting';
				$this->success($success);
			}
		} else {
			$data['settings'] = $this->Setting->_get('*');
			$this->display('Setting/setting',$data);
		}
	}
}