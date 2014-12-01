<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * 共用function
 */
class BaseTools {

	// 跳訊息且導向
    public function alert_redirect($msg='',$url='')
    {
    	if($msg && $url){
    		echo "<script>alert('" . $msg . "');window.location.href='" . $url . "';</script>";
    	}else{
    		return FALSE;
    	}
    	
    }
}

/* End of file BaseTools.php */