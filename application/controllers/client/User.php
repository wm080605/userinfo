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
        // $email = $this->input->post('email', true);
        // $password = $this->input->post('password',true);
        
        $this->load->model('Service_user');
        $result = $this->Service_user->login_check();
        // var_dump($result);

        if($result ){
            if($result['isadmin'] != NULL)
            {
                $this->load->model('Service_user');
                $result = $this->Service_user->admin_center();
                //var_dump($result);  
                $this->cismarty->assign("result",$result);
                $this->cismarty->assign('login_failed',FALSE);
                $this->cismarty->display('admin/admincenter.html');
            }else{
                // echo "user登陆成功";   
                // $this->load->model('User_model');
                // $data['list']=$this->User_model->getAll();
                // $this->load->view('admin_view',$data);
                $this->cismarty->assign('login_failed',FALSE);
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
            $this->cismarty->assign('login_failed',TRUE);
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
        $res = $this->Service_user->do_upload();
        //var_dump($res);
        $result=$this->Service_user->register_check();
        //var_dump($result);
        if ($result == FALSE || $res == FALSE)
        {
            //echo "<script>alert('不正确'); </script>";
            $this->cismarty->display('client/user/register.html');
        }
        else
        {
            $this->load->model('Service_user');
            $info = $this->Service_user->register_confirm();
            //var_dump($info);
            // $sql = "INSERT INTO user (name,email,password) VALUES ('$info[username]','$info[email]','$info[password]')";
            // //var_dump($info);
            // $this->db->query($sql);
            $this->load->model('Logic_user');
            $this->Logic_user->add();
            $this->cismarty->assign('info',$info);
            $this->cismarty->display('client/user/registerconfirm.html');
        }
    }
}