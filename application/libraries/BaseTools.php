<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * 共用function
 */
ini_set('default_charset','utf-8');
class BaseTools {

	// 跳訊息且導向
    public function alert_redirect($msg='',$url='')
    {
    	if($msg && $url){
    		echo '<script type="text/javascript" charset="UTF-8">alert("' . $msg . '");window.location.href="' . $url . '";</script>';
    	}else{
    		return FALSE;
    	}
    	
    }
}

/* End of file basetools.php */