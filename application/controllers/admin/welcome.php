<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// WEB路徑設置
		$this->data['WEB_CSS'] = '/Xmas/resource/css/';
		$this->data['WEB_JS'] = '/Xmas/resource/js/';
		$this->data['WEB_IMG'] = '/Xmas/resource/images/';
		// 載入model 
		$this->load->model('user_model');
	}

	public function index(){
		$this->login();
	}
	public function login()
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
				$this->basetools->alert_redirect('成功登入!!', base_url('admin/schedule'));exit();
			}else{
				$this->basetools->alert_redirect('帳號或密碼錯誤，請重新輸入!!', base_url('admin/welcome'));exit();
			}
		}else{
			$this->load->view('admin/login',$this->data);	
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		$this->basetools->alert_redirect('成功登出!!', base_url('admin/welcome'));exit();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */