<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// WEB路徑設置
		$this->data['WEB_CSS'] = '/Xmas/resource/css/';
		$this->data['WEB_JS'] = '/Xmas/resource/js/';
		$this->data['WEB_IMG'] = '/Xmas/resource/images/';

		// 載入model 
		$this->load->model('schedule_model');

		// 載入縮圖helper
		$this->load->helper('image');
	}

	// 首頁
	public function index()
	{
		if(!($this->session->userdata('logged_in'))){
			//If no session, redirect to login page
			redirect(base_url('admin/welcome'), 'location', 301);exit();
		}
		$this->data['schedules'] = $this->schedule_model->get_all();

		$this->load->view('admin/schedule/index',$this->data);
	}

	public function add()
	{
		if(!($this->session->userdata('logged_in'))){
			//If no session, redirect to login page
			redirect(base_url('admin/welcome'), 'location', 301);exit();
		}
		$post_data = $this->input->post();

		if($post_data){
			
			$s_date = trim($post_data['s_date']);
			// 判斷此日期是否已存在活動
			$schedule = $this->schedule_model->chk_schedule($s_date);
			if($schedule){
				$this->basetools->alert_redirect('此日期已有活動，請重新輸入!!', base_url('admin/schedule/add'));exit();
			}else{
				$link = trim($post_data['link']);
				if((strpos ($link, "http://")) === false && (strpos ($link, "https://")) === false){
					$link = 'http://'.$link;
				}

				$insert_array = array(
					's_date' => trim($post_data['s_date']),
					'title' => trim($post_data['title']),
					'link' => $link
				);
				$insert_id = $this->schedule_model->add_schedule($insert_array);

				if(is_numeric($insert_id) && $_FILES['file']['name']){
					// 製作縮圖
					$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME );
					$thumb_filename = image_thumb($_FILES['file']['tmp_name'], $filename, 148, 175 );

					$update_array = array(
						'pic' => trim($thumb_filename)
					);
					$update_schedule = $this->schedule_model->edit_schedule($update_array,$insert_id);

					$this->basetools->alert_redirect('新增完成!!', base_url('admin/schedule'));	
				}else{
					$this->basetools->alert_redirect('發生錯誤，請重新輸入!!', base_url('admin/schedule/add'));exit();	
				}
			}
		}else{
			$this->load->view('admin/schedule/add',$this->data);
		}
	}

	public function edit($id){
		if(!($this->session->userdata('logged_in'))){
			//If no session, redirect to login page
			redirect(base_url('admin/welcome'), 'location', 301);exit();
		}
		$this->data['schedule_res'] = $this->schedule_model->get_schedule($id);

		if(is_numeric($id) && $this->data['schedule_res']){
			$post_data = $this->input->post();
			if($post_data){
				$s_date = trim($post_data['s_date']);
				// 判斷此日期是否已存在活動
				$schedule = $this->schedule_model->chk_schedule($s_date,$id);
				if($schedule){
					$this->basetools->alert_redirect('此日期已有活動，請重新輸入!!', base_url('admin/schedule/edit/'.$id));exit();
				}else{
					$link = trim($post_data['link']);
					if((strpos ($link, "http://")) === false && (strpos ($link, "https://")) === false){
						$link = 'http://'.$link;
					}

					$update_array = array(
						's_date' => trim($post_data['s_date']),
						'title' => trim($post_data['title']),
						'link' => $link
					);
					$update_schedule = $this->schedule_model->edit_schedule($update_array,$id);

					if($_FILES['file']['name']){
						// 製作縮圖
						$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME );
						$thumb_filename = image_thumb($_FILES['file']['tmp_name'], $filename, 148, 175 );
							
						$update_array = array(
							'pic' => trim($thumb_filename)
						);
						$update_schedule = $this->schedule_model->edit_schedule($update_array,$id);
					}
					
					if($update_schedule){
						$this->basetools->alert_redirect('修改完成!!', base_url('admin/schedule'));	
					}
				}
			}else{
				$this->load->view('admin/schedule/edit',$this->data);		
			}
		}else{
			$this->basetools->alert_redirect('此筆資料不存在!!', base_url('admin/schedule'));exit();	
		}
		

	}

	public function del($id){
		if(!($this->session->userdata('logged_in'))){
			//If no session, redirect to login page
			redirect(base_url('admin/welcome'), 'location', 301);exit();
		}
		if(is_numeric($id)){
			$del_res = $this->schedule_model->del_schedule($id);
			if($del_res){
				$this->basetools->alert_redirect('刪除完成!!', base_url('admin/schedule'));exit();
			}
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */