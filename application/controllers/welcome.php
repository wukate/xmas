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
		$this->load->model('schedule_model');
	}

	public function index($debug='')
	{
		$agent = $this->userAgent($_SERVER['HTTP_USER_AGENT']);
		$start_date = '2014-12-01';
		$end_date = '2014-12-31';

		$startdatetotime=strtotime($start_date);
		$enddatetotime=strtotime($end_date);
		$Days=round(($enddatetotime-$startdatetotime)/3600/24+1);
		// 取得每日日期
		$DailySchedules = $MobileDailySchedules = $mobile_tmp = array();
		for ($i=0; $i<$Days ; $i++) {
			$get_date = $startdatetotime + (3600 * 24 * $i);
			$get_date = date('Y-m-d',$get_date);

			$daily_schedule = $this->schedule_model->get_date_schedule($get_date);
			$tmpDaily = array();
			
			
			if($daily_schedule){
				$tmpDaily['title'] = $daily_schedule->title;
				$tmpDaily['pic'] = '/Xmas/uploads/' . $daily_schedule->pic;
				$tmpDaily['link'] = $daily_schedule->link;
			}
			
			if(!isset($DailySchedules[$get_date])){
				$DailySchedules[$get_date] = $tmpDaily;
			}

			// mobile
			if(!$agent == 'desktop' || $debug == 'mobile'){
				$tmpDaily['date'] = $get_date;

				if($get_date>='2014-12-01' && $get_date <= '2014-12-05'){
					$index = 0;
				}else if($get_date>='2014-12-06' && $get_date <= '2014-12-10'){
					$index = 1;
				}else if($get_date>='2014-12-11' && $get_date <= '2014-12-15'){
					$index = 2;
				}else if($get_date>='2014-12-16' && $get_date <= '2014-12-20'){
					$index = 3;
				}else if($get_date>='2014-12-21' && $get_date <= '2014-12-25'){
					$index = 4;
				}else if($get_date>='2014-12-26' && $get_date <= '2014-12-31'){
					$index = 5;
				}

				if(!isset($MobileDailySchedules[$index])){
					$MobileDailySchedules[$index] = array();
					$mobile_tmp = array();
				}

				array_push($mobile_tmp, $tmpDaily);
				if(empty($mobile_tmp)){
					$mobile_tmp = array();
				}else{
					$MobileDailySchedules[$index] = $mobile_tmp;
				}
			}
			
		}
		// $this->data['Todate'] = date('Y-m-d');
		$this->data['Todate'] = '2014-12-03';
		// 判斷載入手機或手機版面
		if(!$agent == 'desktop' || $debug == 'mobile'){
			$this->data['TodateSchedules'] = $DailySchedules[$this->data['Todate']];//今日好康
			$this->data['MobileDailySchedules'] = $MobileDailySchedules;
			$this->load->view('mobile',$this->data);
		}else{	
			$this->data['DailySchedules'] = $DailySchedules;
			$this->load->view('index',$this->data);
		}
	}

	function userAgent($ua){
	    $iphone = strstr(strtolower($ua), 'mobile'); //Search for 'mobile' in user-agent (iPhone have that)
	    $android = strstr(strtolower($ua), 'android'); //Search for 'android' in user-agent
	    $windowsPhone = strstr(strtolower($ua), 'phone'); //Search for 'phone' in user-agent (Windows Phone uses that)
	 
	 
	    function androidTablet($ua){ //Find out if it is a tablet
	        if(strstr(strtolower($ua), 'android') ){//Search for android in user-agent
	            if(!strstr(strtolower($ua), 'mobile')){ //If there is no ''mobile' in user-agent (Android have that on their phones, but not tablets)
	                return true;
	            }
	        }
	    }
	    $androidTablet = androidTablet($ua); //Do androidTablet function
	    $ipad = strstr(strtolower($ua), 'ipad'); //Search for iPad in user-agent
	 
	    if($androidTablet || $ipad){ //If it's a tablet (iPad / Android)
	        return 'tablet';
	    }
	    elseif($iphone && !$ipad || $android && !$androidTablet || $windowsPhone){ //If it's a phone and NOT a tablet
	        return 'mobile';
	    }
	    else{ //If it's not a mobile device
	        return 'desktop';
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */