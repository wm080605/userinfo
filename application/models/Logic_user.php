<?php
class Logic_user extends CI_Model
{
    public function get_user($data)
    {
        return  $this->db->get_where('user', $data)->row_array();
    }

    public function get_all()
    {
        return $this->db->get('user')->result_array();
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function isexist($emaildata)
    {
        return $this->db->get_where('user', $emaildata)->row_array();
    }

    public function update_user($data, $user_id)
    {
        return $this->db->update('user', $data, array('id' => $user_id));
    }
}