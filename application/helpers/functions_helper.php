<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/7/14
 * Time: 15:25
 * 公共函数库
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('ajaxReturn'))
{
	/**
	 * Ajax方式返回数据到客户端
	 * @param $data mixed 需要返回的数据
	 * @param string $type Ajax返回数据格式
	 */
	function ajaxReturn($data,$type='') {
		$type = $type ? $type:'JSON';
		switch (strtoupper($type)){
			case 'JSON' :
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				exit(json_encode($data));
			case 'XML'  :
				// 返回xml格式数据
				header('Content-Type:text/xml; charset=utf-8');
				exit(xml_encode($data));
			case 'JSONP':
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				$handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
				exit($handler.'('.json_encode($data).');');
			case 'EVAL' :
				// 返回可执行的js脚本
				header('Content-Type:text/html; charset=utf-8');
				exit($data);
		}
	}
}

if(!function_exists('encryptPass'))
{
	/**
	 * Password Hashing API
	 * @param $password string 未加密的密码
	 * @param string $salt string 盐
	 * @param string $way string 加密方式 PASSWORD_DEFAULT 超过60个字符长度，PASSWORD_BCRYPT 总长度为60
	 * @param int $const int 消耗值 越大算法越复杂
	 * @return bool|mixed|string
	 * @todo 常用的几种密码加密算法 http://www.cnblogs.com/sunbjj/p/6139724.html
	 */
	function encryptPass($password,$salt = '',$way = 'PASSWORD_DEFAULT',$const = 12)
	{
		return password_hash($password,PASSWORD_DEFAULT,['salt' => $way,'const' => $const]);
	}
}