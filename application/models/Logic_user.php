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

    public function add($userdata)
    {
        $this->db->insert('user', $userdata);
        return $this->db->insert_id();
    }

    public function email_exist($emaildata)
    {
        return $this->db->get_where('user', $emaildata)->row_array();
    }

    public function update_user($data, $user_id)
    {
        return $this->db->update('user', $data, array('id' => $user_id));
    }

    public function count_num()
    {
        return $this->db->count_all('user');
    }

    public function paging($page_num, $offset)
    {
        // $this->db->limit($page_num, $offset);
        return $this->db->limit($page_num, $offset)->get('user')->result_array();
    }
}