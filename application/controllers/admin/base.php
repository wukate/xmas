<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	// 側邊選單
	public function sidebar($type='index')
	{
		$this->data['class_index'] = ($type == 'index')?'class="active"':'';
		$this->data['class_add'] = ($type == 'add')?'class="active"':'';
		$this->load->view('admin/sidebar',$this->data);
	}

	// 上方Bar
	public function topbar()
	{
		$this->data['logout'] = base_url('index.php/admin/welcome/logout');
		$this->load->view('admin/topbar',$this->data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */