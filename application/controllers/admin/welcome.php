<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// WEB路徑設置
		$this->data['WEB_CSS'] = '/Xmas/resource/css/dist/css/';
		$this->data['WEB_JS'] = '/Xmas/resource/css/dist/js/';
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

				redirect('/admin/schedule', 'location', 301);exit();
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
		redirect('/admin/welcome', 'location', 301);exit();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */