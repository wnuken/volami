<?php

class GeneralModel extends CI_Model {

    function __construct(){        
        parent::__construct();
    }
    

    public function userValidate($params)
    {
    	$this->db->select('*');
    	$this->db->where('user', $params['user']);
        $this->db->where('password', $params['password']);
        $this->db->limit(1);
        $query = $this->db->get('admin_user');
        $result = $query->row_array();
        return $result;
    }

    public function getVoluntaries()
    {
        $this->db->select('*');
        $query = $this->db->get('volutaries');
        $result = $query->result_array();
        return $result;
    }

    public function setVoluntaries($params)
    {
        $this->db->where('id_voluntaries',$params['id_voluntaries']);
        $q = $this->db->get('volutaries');

        if( $q->num_rows() > 0 ){
           $this->db->where('id_voluntaries',$params['id_voluntaries']);
           $resultInsert = $this->db->update('volutaries',$params);
       }else{
           $resultInsert = $this->db->insert('volutaries', $params);
       }

       if($resultInsert === TRUE){
           $this->db->select('id_voluntaries');
           $this->db->where('id_voluntaries',$params['id_voluntaries']);
           $this->db->limit(1);
           $query = $this->db->get('volutaries');
           $result = $query->row_array();
           $result = $result['id_voluntaries'];
       }else{
           $result = FALSE;
       }
       return $result;
   }

}