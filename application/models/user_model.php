<?php
class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function chk_account($account , $password)
    {
    	$this->db->where('account', $account);
    	$this->db->where('password', $password);
    	$query = $this->db->get('users');
    	
    	return $query->row();
    }
}

?>