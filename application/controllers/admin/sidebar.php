<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($type='index')
	{
		$this->data['class_index'] = ($type == 'index')?'class="active"':'';
		$this->data['class_add'] = ($type == 'add')?'class="active"':'';
		$this->load->view('admin/sidebar',$this->data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */