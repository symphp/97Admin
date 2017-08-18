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

if(!function_exists('hashPass'))
{
	/**
	 * hash password加密
	 * @param $password string 未加密的密码
	 * @param string $salt string 盐
	 * @param $mode string $mode sha256, sha512, md5, sha1等加密方式
	 * @return bool|mixed|string
	 * @todo 常用的几种密码加密算法 http://www.cnblogs.com/sunbjj/p/6139724.html
	 */
	function hashPass($password,$salt = '',$mode = 'sha256')
	{
		return hash($mode,$password.$salt);
	}
}

if(!function_exists('getClientIP'))
{
	/**
	 * 一个可靠的用户ip获取方法
	 * @return string
	 */
	function getClientIP()
	{
		if (array_key_exists('HTTP_ALI_CDN_REAL_IP', $_SERVER)){
			return  $_SERVER["HTTP_ALI_CDN_REAL_IP"];
		}else if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)){
			return  $_SERVER["HTTP_X_FORWARDED_FOR"];
		}else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
			return $_SERVER["REMOTE_ADDR"];
		}else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		return '';
	}
}

if (!function_exists('dump'))
{
	function dump($data)
	{
		// 定义样式
		$str='<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
		// 如果是boolean或者null直接显示文字；否则print
		if (is_bool($data)) {
			$show_data=$data ? 'true' : 'false';
		}elseif (is_null($data)) {
			$show_data='null';
		}else{
			$show_data=print_r($data,true);
		}
		$str.=$show_data;
		$str.='</pre>';
		echo $str;
	}
}
