<?php
class Logic_user extends CI_Model
{
    public function get_user($email, $password)
    {
        $sql = "select * from user where  email = '$email' and password = '$password'";
        //echo $sql;
        $num = $this->db->query($sql);//执行sql查询
        $result = $num->row_array();//获取记录数
        //var_dump($num);
        return $result;
        //return count($result) > 0;
    }
    public function get_all()
    {
        //$this->load->database();
        //$sql = "select *from user";
        $num = $this->db->get('user');
        $result = $num->result_array();

        return $result;
    }
    public function add()
    {
        $this->load->model('Service_user');
        $info = $this->Service_user->register_confirm();
        $sql = "INSERT INTO user (name,email,password,createTS) VALUES ('$info[username]','$info[email]','$info[password]',now())";
        $this->db->query($sql);
    }
}