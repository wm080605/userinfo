<?php
class Logic_user extends CI_Model
{
    public function get_user($list)
    {
        return $this->db->get_where('user', $list)->row_array();
    }

    public function get_all()
    {
        $num = $this->db->get('user');
        return $num->result_array();  
    }

    public function add($data)
    {
        return $this->db->insert('user', $data);
    }

    public function isexist($data)
    {
        $res = array('email' => $data['email']);
        return $result = $this->db->get_where('user', $res)->row_array();
    }

    public function update($userdata)
    {
        $this->db->set('status', '1') ; 
        $this->db->set('token', NULL);
        $this->db->where('id', $userdata['id']);   
        return $this->db->update('user');
    }

    public function activation_update($userdata)
    {
        $token_time = time() + 60 * 60 * 24;
        $token = md5(uniqid());

        $this->db->set('token_time', $token_time); 
        $this->db->set('token', $token);
        $this->db->where('id', $userdata['id']);   
        return $this->db->update('user');
    }
}