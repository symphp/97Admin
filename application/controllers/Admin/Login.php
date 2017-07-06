<?php

/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/7/5
 * Time: 22:10
 */
class Login extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Login');
	}
}