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
		$this->load->model('Admin_model','Admin');
	}

	/**
	 * 后台首页
	 */
	public function index()
	{
		$this->display('index');
	}

	/**
	 * 个人资料
	 */
	public function user()
	{
		if (IS_POST) {
			$params['sex']     = $this->input->post('sex');
			$params['phone']   = $this->input->post('phone');
			$params['email']   = $this->input->post('email');
			//选择图片后上传
			if (!empty($_FILES['head_pic']['tmp_name'])) {
				$upload = $this->headUpload();
				if ($upload['success'] == false) {
					$error['msg'] = $upload['info'];
					$this->error($error);
				} else {
					$params['head_pic'] = json_encode($upload['info']);
					//删除旧的头像
					if ($this->admin['head_pic']) {
						$aged_head = substr($this->admin['head_pic'],1);
						if(file_exists($aged_head))
							unlink($aged_head);
					}
				}
			}
			$where['id'] = $this->admin['id'];
			//更新个人资料
			$res = $this->Admin->_update($params,$where);
			if ($res == false) {
				$error['msg'] = '更新个人资料失败';
				$this->error($error);
			} else {
				$success['msg'] = '更新个人资料成功！';
				$success['url'] = 'user';
				$this->success($success);
			}
		} else {
			$data['admin']  = $this->admin;
			$data['selects'] = array(
				array('status' => '3', 'msg' => '保密'),
				array('status' => '2', 'msg' => '男'),
				array('status' => '1', 'msg' => '女')
			);
			$this->display('Index/user',$data);
		}
	}

	/**
	 * 头像上传
	 */
	public function headUpload()
	{
		$config['upload_path']      = './public/img/uploads/head_pic/';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']     = 2048;
		$config['file_name'] = '97Admin_' . time();

		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'],0777,true);
		}

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('head_pic')) {
			$data = array('success' => false,'info' => $this->upload->display_errors());
		} else {
			$data = array('success' => true,'info' => substr($config['upload_path'],1).$this->upload->data()['file_name']);
		}
		return $data;
	}

}