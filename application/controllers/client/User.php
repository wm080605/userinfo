<?php
class User extends CI_Controller
{
    public function index()
    {
        // $list=array(
        //     array('name'=>'jack','password'=>11111,'email'=>'sda@qq.com'),
        //     array('name'=>'jack2','password'=>11111,'email'=>'sda2@qq.com'),
        //     array('name'=>'jack3','password'=>11111,'email'=>'sda3@qq.com')
        //     ); 
        // $data['list'] = $list;
        //$this->load->vars($data);
        // $this->load->helper('url');
        // $this->load->helper('form');
        $this->cismarty->display('client/user/login.html');
    }    
    public function login()
    {

        // $email = $this->input->get('email', true);
        // $password = $this->input->get('password',true);
        
        $this->load->model('Service_user');
        $result = $this->Service_user->login_check();
        //var_dump($result);

        if($result ){
            if($result['isadmin'] == 1)
            {
                $this->load->model('Service_user');
                $result = $this->Service_user->admin_center();
                //var_dump($result);  
                $this->cismarty->assign("result",$result);
                $this->cismarty->display('admin/admincenter.html');
            }else{
                // echo "user登陆成功";   
                // $this->load->model('User_model');
                // $data['list']=$this->User_model->getAll();
                // $this->load->view('admin_view',$data);
                //$this->cismarty->assign('login_failed',false);
                $this->cismarty->display('client/user/usercenter.html');
                //echo "user登陆成功";
                // echo "admin登陆成功"; 
                // $this->cismarty->display('client/user/login.html');
                //$this->load->view('user_view');
            }               
        }else{  
            // echo "密码错误或用户名不正确";
            //echo "<script>alert('密码错误或用户名不正确'); </script>";
            //$this->load->view('client/user/login');
            //$this->cismarty->assign('login_failed',true);
            $this->cismarty->display('client/user/login.html');
        }
    }
    public function register()
    { 
        //$this->load->helper(array('form', 'url'));
        $this->cismarty->display('client/user/register.html');
    }

    public function registercheck()
    {
        

        $this->load->model('Service_user');
        $result=$this->Service_user->register_check();
        if ($result == FALSE)
        {
            //echo "<script>alert('不正确'); </script>";
            $this->cismarty->display('client/user/register.html');
        }
        else
        {
            $info = $this->input->post();
            var_dump($info);
            $this->cismarty->assign('info',$info);
            $this->cismarty->display('client/user/registerconfirm.html');
        }
    }
    public function upload()
    {
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 100;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);
    }
    public function useradd()
    {
        // $info = $this->input->post();
        // var_dump($info);
        // // $name = $info=>name;
        // $sql =" insert into user(name,password,email) values('$name','$password',
        //             '$email')";
        // $bool =$this->db->query($sql);
        // $this->cismarty->display('client/user/usercenter.html');

        // if($bool){
        //     echo"受影响行数". $this->db->affected_rows();
        //     echo"ID". $this->db->insert_id();
        // }
        // $this->load->helper('url');
        // $this->load->view('user');
    }
}