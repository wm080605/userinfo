<?php
class User extends CI_Controller
{
    public function index()
    {
        // $this->load->model('Service_user');
        // $this->Service_user->do_email(array('email' => '759497716@qq.com'));
        // $data = array('name' =>'hshshhs','email' => 'jsahj@qq.com');
        // $token = md5($data['name'].$data['email']);
        // var_dump($token);
        // exit;
        $this->cismarty->display('client/user/login.html');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // $data = array(
        //     'email' => $email
        //     );
        
        $this->load->model('Service_user');
        $result = $this->Service_user->login_check($email, $password);

        if($result )
        {
            if($result['status'] == TRUE)
            {
                if($result['isadmin'] == TRUE)
                {
                    $this->session->set_userdata('email', $email);
                    redirect('admin/user/admin_center');
                }
                else
                {
                    $this->session->set_userdata('email', $email);
                    redirect('client/user/user_center');
                }               
            }
            else
            {
                $this->cismarty->assign('message',"用户不能登陆，请先激活邮箱");
                $this->cismarty->display('client/user/login.html');
            }
        }
        else
        {  
            $this->cismarty->assign('message',"密码错误或用户名不正确");
            $this->cismarty->display('client/user/login.html');
        }   
    }

    public function register()
    { 
        // $this->cismarty->assign('message','');
        $this->cismarty->display('client/user/register.html');
        $email = $this->input ->post('email');
    }

    public function register_submit()
    {
        $info = $this->input->post();
        $data = array(
            'name' => $info['username'],
             'email' => $info['email'],
             'password' =>$info['password'],
             'createtime' => date("Y-m-d H:i:s")
        );

        $this->load->model('Service_user');
        $result = $this->Service_user->register_check();
        if ($result == TRUE)
        {
            $res = $this->Service_user->isexist_email($data);
            if($res)
            {
                $this->cismarty->assign('message', '邮箱已存在');
                $this->cismarty->display('client/user/register.html');
            }
            else
            {
                $email_res = $this->Service_user->do_email($data);
                if($email_res = FALSE)
                {
                    $this->cismarty->assign('message', '发送失败，请重试');
                    $this->cismarty->display('client/user/register.html');
                }
                else
                {
                    $this->Service_user->register_add($data);
                    $this->Service_user->insert_token($data);
                    redirect('client/user/register_success');
                }
            }          
        }
        else
        {
            $this->cismarty->display('client/user/register.html');
        }
    }

    public function user_center()
    {
        $this->cismarty->assign('message', '登陆成功');
        $this->cismarty->display('client/user/usercenter.html');
    }

    public function register_success()
    {
        $this->cismarty->assign('message', '注册成功，请前往邮箱激活后登陆');
        $this->cismarty->display('client/user/registersuccess.html');
    }

    public function activation()
    {
        $token = $_GET['token'];

        $this->db->set('status', '1') ; 
        $this->db->where('token', $token);   
        $result = $this->db->update('user');
        if($result)
        {
            echo "激活成功";
        }
        else
        {
            echo "激活shibai";
        }
    }
}