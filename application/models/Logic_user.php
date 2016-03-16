<?php
class Logic_user extends CI_Model
{
    public function get_user($data)
    {
        return $this->db->get_where('user', $data)->row_array();
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

    public function isexist($emaildata)
    {
        // $res = array('email' => $data['email']);
        return $this->db->get_where('user', $emaildata)->row_array();
    }

    public function email_fail_update($userdata)
    {
        $this->db->set('token', NULL);
        $this->db->set('token_time', NULL);
        $this->db->where('email', $userdata['email']);
        return $this->db->update('user');
    }

    public function fail_update($userdata)
    {
        $this->db->set('token', NULL);
        $this->db->set('token_time', NULL);
        $this->db->where('id', $userdata['id']);
        return $this->db->update('user');
    }
    public function update($userdata)
    {
        $this->db->set('status', '1') ; 
        $this->db->set('token', NULL);
        $this->db->set('token_time', NULL);
        $this->db->where('id', $userdata['id']);
        return $this->db->update('user');
    }

    public function activation_update($userdata)
    {
        $this->db->set('token_time', $userdata['token_time']); 
        $this->db->set('token', $userdata['token']);
        $this->db->where('id', $userdata['id']);   
        return $this->db->update('user');
    }
}