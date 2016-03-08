<?php
class Logic_user extends CI_Model
{
    public function get_user($email, $password)
    {
        //$sql = "select * from user where  email = '$email' and password = '$password'";
        //echo $sql;
        $data = array('email' => $email, 'password' => $password);
        //执行sql查询
        $sql = $this->db->get_where('user', $data);
        //$num = $this->db->query($sql);
        //获取记录数
        $result = $sql->row_array();
        return $result;
        //return count($result) > 0;
    }
    public function get_all()
    {
        $num = $this->db->get('user');
        $result = $num->result_array();

        return $result;
    }
    public function add()
    {
        $this->load->helper('date');
        $this->load->model('Service_user');
        $info = $this->Service_user->register_confirm();
        $data = array('name' => $info['username'],'email' => $info['email'],'password' =>$info['password'],'createTS' => now());
        // $sql = "INSERT INTO user (name,email,password,createTS) VALUES ('$info[username]','$info[email]','$info[password]',now())";
        // $this->db->query($sql);
        $str = $this->db->insert_string('user',$data);
        $this->db->query($str);
    }
}