<?php
class Schedule_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // 取得所有排程
    function get_all()
    {
        $this->db->order_by("s_date", "asc"); 
    	$query = $this->db->get('schedules');
    	
    	return $query->result();
    }

    // 確認此日期是否已新增過
    function chk_schedule($s_date,$id=''){
        if($s_date){
            if($id){
                $this->db->where('id !=', $id);
            }
            $this->db->where('s_date', $s_date);
            $query = $this->db->get('schedules');
            
            return $query->result();
        }else{
            return FALSE;
        }
    }
    // 新增排程
    function add_schedule($data=array()){
        if($data){
            $this->db->insert('schedules', $data); 
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }

    // 取得單筆排程
    function get_schedule($id){
        if(is_numeric($id)){
            $this->db->where('id', $id);
            $query = $this->db->get('schedules');
            
            return $query->row();
        }else{
            return FALSE;
        }
    }

    // 更新排程
    function edit_schedule($data=array(),$id){
        if($data && $id ){
            $this->db->where('id', $id);
            $this->db->update('schedules', $data); 

            return TRUE;
        }else{
            return FALSE;
        }
    }

    // 刪除排程
    function del_schedule($id){
        if(is_numeric($id)){
            $this->db->where('id', $id);
            $this->db->delete('schedules'); 
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

?>