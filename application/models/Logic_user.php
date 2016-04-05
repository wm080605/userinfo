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

    public function count_users_num($select_data)
    {         
        $data = array();
        if(!empty($select_data['name']))
        {
            $data['name'] = $select_data['name'];
        }
        if(!empty($select_data['email']))
        {
            $data['email'] = $select_data['email'];
        }
        $result = $this->db->select('COUNT(1) AS num')->like($data)->get('user')->row_array();
        return $result['num'];
    }

    public function users_list($select_data, $page_num, $offset)
    {
        $data = array();
        if(!empty($select_data['name']))
        {
            $data['name'] = $select_data['name'];
        }
        if(!empty($select_data['email']))
        {
            $data['email'] = $select_data['email'];
        }
        $result = $this->db->limit($page_num, $offset)->like($data)->get('user')->result_array();
        return $result;
    }
}