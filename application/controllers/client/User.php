<?php
class User extends CI_Controller
{
    public function index()
    {
        $this->cismarty->assign('error','');
        $this->cismarty->display('client/user/login.html');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->library('session');
        $this->load->model('Service_user');
        //$this->Service_user->login_check($email,$password);
        
        $this->load->model('Service_user');
        $result = $this->Service_user->login_check($email,$password);
        // var_dump($result);

        if($result ){
            if($result['isadmin'] != NULL)
            {
                //echo "admin登陆成功";
                $this->session->set_flashdata('error','2222');
                redirect('admin/user/admin_center');
            }else{
                
                // $this->load->model('User_model');
                // $data['list']=$this->User_model->getAll();
                // $this->load->view('admin_view',$data);
                // $this->cismarty->assign('login_failed',FALSE);
                $this->session->set_flashdata('error','1111');
                redirect('client/user/user_center');
                //echo "user登陆成功";
                // echo "admin登陆成功"; 
                // $this->cismarty->display('client/user/login.html');
                //$this->load->view('user_view');
            }               
        }
        else{  
            //$this->cismarty->assign('error','密码错误或用户名不正确');
            //$this->session->set_flashdata('error','密码错误或用户名不正确');
            // $message = '密码错误或用户名不正确';
            // $this->session->set_flashdata('message', $message);
            // $this->cismarty->assign('message',$message);
            // redirect('client/user');
            $this->cismarty->assign('error',"密码错误或用户名不正确");
            $this->cismarty->display('client/user/login.html');
            // $this->session->set_flashdata('error','密码错误或用户名不正确');
            // $this->session->flashdata('error');
            // redirect('client/user','refresh');
            
        }
    }
    public function register()
    { 
        //$this->load->helper(array('form', 'url'));
        $this->cismarty->assign('message','');
        $this->cismarty->display('client/user/register.html');
    }

    public function register_submit()
    {
        $this->load->model('Service_user');
        //$res = $this->Service_user->do_upload();
        //var_dump($res);
        $result=$this->Service_user->register_check();
        //var_dump($result);
        if ($result == TRUE)
        {
           // $this->Service_user->do_upload();
            $info = $this->Service_user->register_confirm();
            //var_dump($info);
            $this->load->model('Logic_user');
            $this->Logic_user->add();

            //$this->cismarty->assign('info',$info);
            // $this->session->set_flashdata('message','注册成功!!');
            // redirect('client/user/register');
            $this->cismarty->assign('message','注册成功');
            $this->cismarty->display('client/user/register.html');
        }
        else
        {
            //echo "<script>alert('不正确'); </script>";
            //$this->cismarty->display('client/user/register.html');
            $this->cismarty->assign('message','');
            $this->cismarty->display('client/user/register.html');
            //redirect('client/user/register');

        }
    }
    // public function register_show()
    // {
    //     $this->load->model('Service_user');
    //     $info = $this->Service_user->register_confirm();
    //     var_dump($info);
    //     $this->load->model('Logic_user');
    //     $this->Logic_user->add();
    //     $this->cismarty->assign('info',$info);
    //     $this->cismarty->display('client/user/register_show.html');
    // }
    public function user_center()
    {
        $this->cismarty->display('client/user/usercenter.html');
    }
}