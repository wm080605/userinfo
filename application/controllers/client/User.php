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
                redirect('client/user/user_center');
            }
        }
        else
        {
            $this->cismarty->display('client/user/login.html');
        }
        // $this->cismarty->display('client/user/login.html');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array('email' => $email);
        $this->load->model('Service_user');
        $userData = $this->Service_user->get_user_info($data);

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
                $this->cismarty->assign('message',"error_activation");
                $this->cismarty->display('client/user/login.html');
            }
        }
        else
        {  
            $this->cismarty->assign('message',"error_user_or_password");
            $this->cismarty->display('client/user/login.html');
        }   
    }

    public function register()
    { 
        $this->cismarty->assign('message', '');
        $this->cismarty->display('client/user/register.html');
    }

    public function register_submit()
    {
        $this->load->model('Service_user');
        $info = $this->input->post();

        $token = $this->Service_user->create_token();
        // $token_time = time() + 60 * 60 * 24;
        $token_out_time = time();
         
        $result = $this->Service_user->register_check();
        if ($result == TRUE)
        {
            $emaildata = array('email' => $info['email']);
            $emailresult = $this->Service_user->isexist_email($emaildata);
            if($emailresult)
            {
                $this->cismarty->assign('message', 'email_exist');
                $this->cismarty->display('client/user/register.html');
            }
            else
            {
                $data = array(
                        'name' => $info['username'],
                        'email' => $info['email'],
                        'password' =>$info['password'],
                        'createtime' => date("Y-m-d H:i:s"),
                        'token_time' => $token_out_time,
                        'token' => $token
                );  
                $add_result = $this->Service_user->register_add($data);
                if($add_result == TRUE)
                {
                    $email_res = $this->Service_user->send_email($data);
                    if($email_res == FALSE)
                    {
                        $userdata = array('email' => $info['email']);
                        $this->Service_user->send_email_fail_update($userdata);
                        $this->cismarty->assign('message', 'error_send_fail');
                        $this->cismarty->display('client/user/activation.html');
                    }
                    else
                    {
                        redirect('client/user/register_success');
                    }
                }
                else
                {
                    redirect('client/user/register');
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
        $data = $this->session->userdata('user');
        if($data != NULL)
        {
            $this->cismarty->assign('message','error_sign_out');
            $this->cismarty->display('client/user/user_center.html');
        }
        else
        {
            $this->cismarty->assign('message','error_sign_in');
            $this->cismarty->display('client/user/login.html');
        }     
    }

    public function register_success()
    {
        $this->cismarty->assign('message', 'register_success');
        $this->cismarty->display('client/user/register_success.html');
    }

    public function activation()
    {
        $token = $this->input->get('token');
        $nowtime = time() + 60 * 60 * 24;
        $data = array('token' => $token);

        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info($data);

        if($userdata && $userdata['status'] == 0)
        {
            $this->session->set_userdata('usertoken', $token);
            if($nowtime > $userdata['token_time'])
            {     
                $this->cismarty->assign('message', "activation_time_out");
                $this->Service_user->activation_fail_update($userdata);
                $this->cismarty->display('client/user/activation.html');
            }
            else
            {
                $this->Service_user->activation_success_update($userdata);
                $this->cismarty->display('client/user/activation_success.html');
            }
        }
        else
        {
            $this->cismarty->display('client/user/activation_fail.html');
        }
    }

    public function again_activation()
    {
        $this->load->model('Service_user');
        $email = $this->input->post('email');

        $user_data = $this->Service_user->get_user_info(array('email' => $email));
        if($user_data['email'] && $user_data['status'] == 0 )
        {
            $token_time = time() + 60 * 60 * 24;
            $token = $this->Service_user->create_token();
            $userdata = array(
                    'token' =>$token,
                    'token_time' =>$token_time,
                    'id' => $user_data['id']
                ); 
            $this->Service_user->again_activation_update($userdata);
            $data = $this->Service_user->get_user_info(array('id' => $user_data['id']));
            $result = $this->Service_user->send_email($data);
            if($result == FALSE)
            {
                $this->cismarty->assign('message', "error_send_fail");
                $this->cismarty->display('client/user/activation.html');
            }
            else
            {
                $this->cismarty->assign('message', "activation_success");
                $this->cismarty->display('client/user/activation.html');
            }
        }
        else
        {
            $this->cismarty->assign('message', "email_not_correct");
            $this->cismarty->display('client/user/activation.html');
        }
    }

    public function sign_out()
    {
        $this->session->sess_destroy('user');
        redirect('client/user');
    }
}