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
                $this->session->set_flashdata('message', 'error_sign_out');
                redirect('admin/user/admin_center');
            }
            else
            {
                $this->session->set_flashdata('message', 'error_sign_out');
                redirect('client/user/user_center');
            }
        }
        else
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/login.html');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array('email' => $email);
        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info($data);

        if($userdata && $userdata['password'] == md5($password))
        {
            if($userdata['status'] == TRUE)
            {
                $this->session->set_userdata('user', $userdata);
                if($userdata['isadmin'] == TRUE)
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
                $this->session->set_flashdata('message', 'error_not_activation');
                redirect('client/user');
            }
        }
        else
        {
            $this->session->set_flashdata('message', 'error_user_or_password');
            redirect('client/user');
        }
    }

    public function register()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/register.html');
    }

    public function register_submit()
    {
        $this->load->model('Service_user');
        $info = $this->input->post();

        $token = $this->Service_user->create_token();
        $token_out_time = $this->Service_user->create_token_out_time();
         
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
                        'password' =>md5($info['password']),
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
                        $userdata = $this->Service_user->get_user_info(array('email' =>$info['email']));
                        $data = array(
                            'token' => NULL,
                            'token_time' => NULL
                        );
                        $this->Service_user->update_user_info($data, array('id' => $userdata['id']));
                        $this->cismarty->assign('message', 'error_send_fail');
                        $this->cismarty->display('client/user/activation.html');
                    }
                    else
                    {
                        $this->session->set_flashdata('message','register_success');
                        redirect('client/user/register_success');
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', 'error_mysql');
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
        if($data != NULL && $data['isadmin'] == FALSE)
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/user_center.html');
        }
        else
        {
            $this->session->set_flashdata('message', 'error_sign_in');
            redirect('client/user');
        }
    }

    public function register_success()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/register_success.html');
    }

    public function activation()
    {
        $token = $this->input->get('token');
        $nowtime = time();
        $data = array('token' => $token);

        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info($data);

        if($userdata && $userdata['status'] == 0)
        {
            if($nowtime > $userdata['token_time'])
            {     
                $this->cismarty->assign('message', "activation_time_out");
                $data = array(
                            'token' => NULL,
                            'token_time' => NULL
                        );
                $this->Service_user->update_user_info($data, $userdata['id']);
                $this->cismarty->display('client/user/activation.html');
            }
            else
            {
                $data =  array(
                    'token' => NULL,
                    'token_time' => NULL,
                    'status' => 1
                );
                $this->Service_user->update_user_info($data, $userdata['id']);
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
        if($email == NULL)
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message',$data);
            $this->cismarty->display('client/user/activation.html');
        }
        else
        {
            $userdata = $this->Service_user->get_user_info(array('email' => $email));
            if($userdata['email'] && $userdata['status'] == 0 )
            {
                $token_out_time = $this->Service_user->create_token_out_time();
                $token = $this->Service_user->create_token();
                $data = array(
                        'token' =>$token,
                        'token_time' =>$token_out_time,
                        'id' => $userdata['id']
                );
                $this->Service_user->update_user_info($data, $userdata['id']);
                $data = $this->Service_user->get_user_info(array('id' => $userdata['id']));
                $result = $this->Service_user->send_email($data);
                if($result == FALSE)
                {
                    $data = array(
                        'token' =>NULL,
                        'token_time' =>NULL
                );
                    $this->Service_user->activation_fail_update($data, $userdata['id']);
                    $this->session->set_flashdata('message', 'error_send_fail');
                    redirect('client/user/again_activation');
                }
                else
                {
                    $this->session->set_flashdata('message', 'error_send_success');
                    redirect('client/user/again_activation');
                }
            }
            else
            {
                $this->session->set_flashdata('message', 'email_not_correct');
                redirect('client/user/again_activation');
            }
        }
    }

    public function find_password()
    {
        $this->load->model('Service_user');
        $email = $this->input->post('email');
        $userdata = $this->Service_user->get_user_info(array('email' => $email));
        if($email == "")
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/find_password.html');
        }
        else
        {
            if(!$userdata)
            {
                $data = $this->session->set_flashdata('message', 'error_not_register');
                redirect('client/user/find_password');
            }
            else
            {
                $token = $this->Service_user->create_token();
                $token_out_time = $this->Service_user->create_token_out_time();
                $data = array(
                    'token' => $token,
                    'token_time' => $token_out_time,
                    'id' => $userdata['id']
                );
                $this->Service_user->update_user_info($data, $userdata['id']);
                $data = $this->Service_user->get_user_info(array('id' => $userdata['id']));
                $result = $this->Service_user->send_password_email($data);
                if($result == FALSE)
                {
                    $data = array(
                        'token' => NULL,
                        'token_time' => NULL
                    );
                    $this->Service_user->update_user_info($data, $userdata['id']);
                    $this->session->set_flashdata('message', 'error_send_fail');
                    redirect('client/user/find_password');
                }
                else
                {
                    $this->session->set_flashdata('message', 'error_send_success');
                    redirect('client/user/find_password');
                }
            }
        }
    }

    public function reset_password()
    {
        $this->load->model('Service_user');
        $token = $this->input->get('token');
        $nowtime = time();
        $userdata = $this->Service_user->get_user_info(array('token' => $token));
        
        if($userdata['token'])
        {
            if($nowtime > $userdata['token_time'])
            {
                $this->cismarty->assign('message', "password_time_out");
                $data = array(
                        'token' => NULL,
                        'token_time' => NULL
                    );
                $this->Service_user->update_user_info($data, $userdata['id']);
                $this->cismarty->display('client/user/find_password.html');
            }
            else
            {
                $data = array(
                        'token' => NULL,
                        'token_time' => NULL,
                        'password' =>NULL
                );
                $this->Service_user->update_user_info($data, $userdata['id']);
                $this->session->set_flashdata('message', 'reset_password_success');
                redirect('client/user/update_password');
            }
        }
        else
        {
            $this->cismarty->display('client/user/reset_password_fail.html');
        }
    }

    public function update_password()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info(array('email' => $email));
        if($email == '')
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/update_password.html');
        }
        else
        {
            if($userdata)
            {
                if($userdata['password'] =='')
                {
                    $data = array('password' => md5($password));
                    $this->Service_user->update_user_info($data, $userdata['id']);
                    $this->session->set_flashdata('message', 'update_password_success');
                    redirect('client/user');
                }
                else
                {
                    $this->session->set_flashdata('message', 'password_not_reset');
                    redirect('client/user/update_password');
                }         
            }
            else
            {   
                $this->session->set_flashdata('message', 'email_not_exist');
                redirect('client/user/update_password');
            }
        }
    }

    public function sign_out()
    {
        $this->session->sess_destroy('user');
        redirect('client/user');
    }
}