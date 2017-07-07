<?php

/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/7/6
 * Time: 14:23
 */
class Index extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->display('index1');
//		$this->load->view('Index');
	}
}