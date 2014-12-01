<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// WEB路徑設置
		$this->data['WEB_CSS'] = '/Xmas/resource/dist/css/';
		// 載入model 
		$this->load->model('user_model');
	}

	public function index()
	{
		$post_data = $this->input->post();
		if($post_data){
			$account = trim($post_data['account']);
			$password = trim($post_data['password']);

			$user = $this->user_model->chk_account($account , $password);
			if($user){
				$sess_array = array(
					'id' => $user->id,
					'account' => $user->account
				);
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('/admin/schedule', 'location', 301);exit();
			}else{
				$this->basetools->alert_redirect('帳號或密碼錯誤，請重新輸入!!', base_url('admin/login'));exit();
			}
		}else{
			$this->load->view('admin/login',$this->data);	
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */