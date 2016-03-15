<?php
class User extends CI_Controller
{
    public function index()
    {
        $data = $this->session->userdata('user');
        if($data)
        {
            if($data['isadmin'] == TRUE)
            {
                redirect('admin/user/admin_center');
            }
            else
            {
                $this->cismarty->assign('message', '你已经登陆,2请先退出');
                $this->cismarty->display('client/user/usercenter.html');
                // redirect('client/user/user_center');
            }
        }
        else
        {
            $this->cismarty->display('client/user/login.html');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array('email' => $email);
        $this->load->model('Service_user');
        $userData = $this->Service_user->check($data);

        if($userData && $userData['password'] == $password)
        {
            if($userData['status'] == TRUE)
            {
                $this->session->set_userdata('user', $userData);
                if($userData['isadmin'] == TRUE)
                {
                    
                    redirect('admin/user/admin_center');
                }
                else
                {
                    redirect('client/user/user_center');
                }               
            }
            else
            {
                $this->cismarty->assign('message',"用户不能登陆，请先激活邮箱");
                $this->cismarty->display('client/user/login.html');
                // redirect('client/user');
            }
        }
        else
        {  
            $this->cismarty->assign('message',"密码错误或用户名不正确");
            $this->cismarty->display('client/user/login.html');
            // redirect('client/user');
        }   
    }

    public function register()
    { 
        $this->cismarty->display('client/user/register.html');
        $email = $this->input ->post('email');
    }

    public function register_submit()
    {
        $info = $this->input->post();
        // $token_time = time() + 60 * 60 * 24;
        $token_time = time();
        $data = array(
            'name' => $info['username'],
             'email' => $info['email'],
             'password' =>$info['password'],
             'createtime' => date("Y-m-d H:i:s"),
             'token_time' => $token_time,
             'token' => md5(uniqid())
        );

        $this->load->model('Service_user');
        $result = $this->Service_user->register_check();
        if ($result == TRUE)
        {
            $emailresult = $this->Service_user->isexist_email($data);
            if($emailresult)
            {
                $this->cismarty->assign('message', '邮箱已存在');
                $this->cismarty->display('client/user/register.html');
            }
            else
            {
                $add_result = $this->Service_user->register_add($data);
                //var_dump($add_result);die();  
                if($add_result == TRUE)
                {
                    $email_res = $this->Service_user->send_email($data);
                    // var_dump($email_res);die();
                    if($email_res == FALSE)
                    {   
                        echo ('发送失败，请重试');       
                    }
                    else
                    {
                        redirect('client/user/register_success');
                    }
                }
                else
                {
                    // $this->cismarty->display('client/user/register.html');
                    redirect('client/user/register');
                }
            }          
        }
        else
        {
            //$this->cismarty->display('client/user/register.html');
            redirect('client/user/register');
        }
    }

    public function user_center()
    {
        $data = $this->session->userdata('user');
        if($data == NULL)
        {
            redirect('client/user');
        }
        else
        {
            $this->cismarty->display('client/user/usercenter.html');
        }     
    }

    public function register_success()
    {
        $this->cismarty->assign('message', '注册成功，请前往邮箱激活后登陆');
        $this->cismarty->display('client/user/registersuccess.html');
    }

    public function activation()
    {
        $token = $this->input->get('token');
        $nowtime = time();
        $list = array('token' => $token);
        //$data = $this->db->get_where('user', $tokendata)->row_array();
        $this->load->model('Service_user');
        $userdata = $this->Service_user->check($list);
        // var_dump($userdata);die();

        if($userdata && $userdata['status'] == 0)
        {
            $this->session->set_userdata('usertoken', $token);
            if($nowtime > $userdata['token_time'])
            {
                $this->cismarty->assign('error', "您的激活有效期已过,请输入注册邮箱重新激活");
                $this->cismarty->display('client/user/activation.html');
                // $this->Service_user->activation_token_update($userdata);
                // $data = $this->Service_user->check(array('id' => $userdata['id']));
                // //var_dump($data);die();
                // $result = $this->Service_user->send_email($data);
            }
            else
            {
                $this->Service_user->token_update($userdata);
                echo "激活成功";
            }
        }
        else
        {
            echo "error";   
        }
    }

    public function again_activation()
    {
        $this->load->model('Service_user');
        $token = $this->session->userdata('usertoken');
        //var_dump($token);
        $email = $this->input->post('email');
        $data = array('token' => $token);

        $userData = $this->Service_user->check($data);
        // var_dump($userData);die();

        if($userData['email'] == $email && $userData['status'] == 0 )
        {
            $this->Service_user->activation_token_update($userData);
            $data = $this->Service_user->check(array('id' => $userData['id']));
            if(($this->Service_user->send_email($data)) == FALSE)
            {
                $this->cismarty->assign('error', "发送失败，请重发");
                $this->cismarty->display('client/user/activation.html');
            }
            else
            {
                $this->cismarty->assign('error', "激活链接已发送");
                $this->cismarty->display('client/user/activation.html');
                $this->session->sess_destroy('usertoken');
                
            }
        }
        else
        {
            $this->cismarty->assign('error', "邮箱不正确或邮箱已激活");
            $this->cismarty->display('client/user/activation.html');
        }
    }

    public function sign_out()
    {
        $this->session->sess_destroy('user');
        redirect('client/user');
    }
}