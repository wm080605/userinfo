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

    public function search_num($select_data)
    {         
        if(isset($select_data))
        {
            if(!empty($select_data['name']) && empty($select_data['email']))
            {
                $data = array('name' => $select_data['name']);
                $result = count($this->db->get_where('user', $data)->result_array());
            }
            if(!empty($select_data['email']) && empty($select_data['name']))
            {
                $data = array('email' => $select_data['email']);
                $result = count($this->db->get_where('user', $data)->result_array());
            }
            if(!empty($select_data['email']) && !empty($select_data['name']))
            {
                $data = $select_data;
                $result =  count($this->db->get_where('user', $data)->result_array());
            }
            if(empty($select_data['name']) && empty($select_data['email']))
            {
                $result = $this->db->count_all('user');
            }
        }
        else
        {
            $result = $this->db->count_all('user');
        }
        return $result;
    }

    public function paging($select_data, $page_num, $offset)
    {
        if(isset($select_data))
        {
            if(!empty($select_data['name']) && empty($select_data['email']))
            {
                $data = array('name' => $select_data['name']);
                $result = $this->db->limit($page_num, $offset)->get_where('user', $data)->result_array();
            }
            if(!empty($select_data['email']) && empty($select_data['name']))
            {
                $data = array('email' => $select_data['email']);
                $result = $this->db->limit($page_num, $offset)->get_where('user', $data)->result_array();
            }
            if(!empty($select_data['email']) && !empty($select_data['name']))
            {
                $data = $select_data;
                $result =  $this->db->limit($page_num, $offset)->get_where('user', $data)->result_array();
            }
            if(empty($select_data['name']) && empty($select_data['email']))
            {
                $result = $this->db->limit($page_num, $offset)->get('user')->result_array();
            }
        }
        else
        {
           $result = $this->db->limit($page_num, $offset)->get('user')->result_array();
        }
        return $result;
    }
}