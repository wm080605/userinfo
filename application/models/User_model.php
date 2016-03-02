<?php
/**
* 
*/
class User_model extends CI_Model
{
    public function getAll()
    {
        $this->load->database();
        $res=$this->db->get('user');
        //$data['list']=$res;
        //return $data['list'];
        return $res;
    }

    public function logincheck()
    {   
        $this->load->database();
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql="select * from user where  password = '$password' and email = '$email'";
        //echo $sql;
        $res=$this->db->query($sql);//执行sql查询
        $num=$res->row_array();//获取记录数
        //var_dump($num);

        if($num){
            if($num['isadmin']==1){
                echo "admin登陆成功";
            }else{
                  echo "登陆成功";
            }  
        }else{
            echo "密码错误或用户名不正确";
        }
        //mysql_free_result($res);
    }
}