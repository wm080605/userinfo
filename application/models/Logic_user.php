<?php
class Logic_user extends CI_Model
{
    public function get_user($email, $password)
    {
        $data = array('email' => $email, 'password' => $password);
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

    public function isexist($data)
    {
        $res = array('email' => $data['email']);
        return $result = $this->db->get_where('user', $res)->row_array();
    }

    public function token_add($data)
    {
        $token = md5($data['name'].$data['email']);
        $this->db->set('token',$token);
        $this->db->where('name', $data['name']);
        return $this->db->update('user');
    }
}