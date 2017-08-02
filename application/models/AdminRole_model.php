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
}