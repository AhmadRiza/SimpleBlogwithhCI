<?php

class User extends CI_Model{


    public function verify()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        
        $where="email = '$email'";
        
        if($user=$this->get_user($where)){
            
            if($user['pass']===md5($pass)){
                return $user;
            }

        }
        return false;
    }

    public function get_user($where)
    {

        $this->db->where($where);
        return $this->db->get('author')->row_array();
        // return $this->db->last_query();
        
    }

    public function new($param)
    {
        $this->db->insert('post', $param['data']);
    }

}