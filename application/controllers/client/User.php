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

        $result = $this->Service_user->register($info);
        $this->Service_user->email_check(array('email' => $info['email']));
        // var_dump($p);die();
        if($result == 'register_check_fail')
        {
            $this->cismarty->display('client/user/register.html');
        }
        // if($result == 'email_exist')
        // {   
        //     $this->cismarty->assign('message', 'email_exist');
        //     $this->cismarty->display('client/user/register.html');
        // }
        if($result == 'email_send_fail')
        {
            $this->cismarty->assign('message', 'email_send_fail');
            redirect('client/user/again_send_activation');
        }
        if($result == 'register_success')
        {
            $this->session->set_flashdata('message','register_success');
            redirect('client/user/register_results');
        }
        if($result == 'register_fail')
        {
            $this->session->set_flashdata('message', 'register_fail');
            redirect('client/user/register_results');
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

    public function register_results()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/register_results.html');
    }

    public function activation()
    {
        $token = $this->input->get('token');
        $this->load->model('Service_user');
        $result = $this->Service_user->activation_model(array('token' => $token));
        if($result == 'activation_timeout')
        {
            $this->session->set_flashdata('message', 'activation_timeout');
            redirect('client/user/again_send_activation');
        }
        if($result == 'activation_success')
        {
            $this->session->set_flashdata('message', 'activation_success');
            redirect('client/user/activation_results');
        }
        if($result == 'activation_fail')
        {
            $this->session->set_flashdata('message', 'activation_fail');
            redirect('client/user/activation_results');
        }
    }
    public function send_activation()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message',$data);
        $this->cismarty->display('client/user/again_send_activation.html');
    }

    public function again_send_activation()
    {
        $email = $this->input->post('email');
        $this->load->model('Service_user');
        $result = $this->Service_user->again_send_activation_model(array('email' => $email));
        if($result == 'error_send_fail')
        {
            $this->session->set_flashdata('message', 'email_send_fail');
            redirect('client/user/send_activation');
        }
        if($result == 'email_send_success')
        {
            $this->session->set_flashdata('message', 'email_send_success');
            redirect('client/user/send_activation');
        }
        if($result == 'email_not_exist')
        {
            $this->session->set_flashdata('message', 'email_not_exist');
            redirect('client/user/send_activation');
        }
    }

    public function activation_results()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/activation_results.html');
    }

    public function send_password()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/send_password_email.html');
    }

    public function send_password_email()
    {
        $this->load->model('Service_user');
        $email = $this->input->post('email');
        $result = $this->Service_user->send_password_email_model(array('email' => $email));
        if($result == 'error_not_register')
        {
            $this->session->set_flashdata('message', 'email_not_register');
            redirect('client/user/send_password');
        }
        if($result == 'error_send_fail')
        {
            $this->session->set_flashdata('message', 'email_send_fail');
            redirect('client/user/send_password');
        }
        if($result == 'error_send_success')
        {
            $this->session->set_flashdata('message', 'email_send_success');
            redirect('client/user/send_password');
        }
    }

    public function reset_password()
    {
        $this->load->model('Service_user');
        $token = $this->input->get('token');
        $result = $this->Service_user->reset_password_model(array('token' => $token));
        if($result == 'link_timeout')
        {
            $this->session->set_flashdata('message', 'link_timeout');
            redirect('client/user/send_password');
        }
        if($result == 'reset_password_success')
        {
            $this->session->set_flashdata('message', 'reset_password_success');
            redirect('client/user/show_update_password');
        }
        if($result == 'reset_password_fail')
        {
            $this->session->set_flashdata('message', 'reset_password_fail');
            redirect('client/user/send_password');
        }
    }
    public function show_update_password()
    {
        $data = $this->session->flashdata('message');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/update_password.html');
    }

    public function update_password()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info(array('email' => $email));
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
                redirect('client/user/show_update_password');
            }         
        }
        else
        {   
            $this->session->set_flashdata('message', 'email_not_exist');
            redirect('client/user/show_update_password');
        }
    }

    public function sign_out()
    {
        $this->session->sess_destroy('user');
        redirect('client/user');
    }
}