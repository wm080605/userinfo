<?php
class User extends CI_Controller
{
    public function index()
    {
        
        $data = $this->session->userdata('user');
        if($data)
        {
            $this->session->set_flashdata('message', 'please_sign_out');
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
            $data = $this->session->flashdata('message');
            $this->load->helper('error');

            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/login.html');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $data = array(
            'email' => $email,
            'password' => $password
        );
        $this->load->model('Service_user');
        $userdata = $this->Service_user->get_user_info($data);
        
        if($userdata)
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
                $this->session->set_flashdata('message', 'user_not_activation');
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
        $this->Service_user->email_validation($info['email']);
        if($result == 'register_validation_fail')
        {
            $this->cismarty->display('client/user/register.html');
        }
        if($result == 'email_send_fail')
        {
            $this->session->set_flashdata('message', $result);
            redirect('client/user/again_send_activation');
        }
        if($result == 'register_success' || $result == 'register_fail')
        {
            $this->session->set_flashdata('message', $result);
            redirect('client/user/register_results');
        }
    }

    public function user_center()
    {
        $data = $this->session->userdata('user');
        if($data != NULL && $data['isadmin'] == FALSE)
        {
            $this->cismarty->assign('name', $data['name']);
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('client/user/user_center.html');
        }
        else
        {
            $this->session->set_flashdata('message', 'please_sign_in');
            redirect('client/user');
        }
    }

    public function register_results()
    {
        $data = $this->session->flashdata('message');
        $this->load->helper('error');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/register_results.html');
    }

    public function activation()
    {
        $token = $this->input->get('token');
        $this->load->model('Service_user');
        $result = $this->Service_user->register_activation(array('token' => $token));
        if($result == 'link_timeout')
        {
            $this->session->set_flashdata('message', 'link_timeout');
            redirect('client/user/send_activation');
        }
        if($result == 'activation_success' || $result == 'activation_fail')
        {
            $this->session->set_flashdata('message', $result);
            redirect('client/user/register_activation_results');
        }
    }
    public function send_activation()
    {
        $data = $this->session->flashdata('message');
        $this->load->helper('error');
        $this->cismarty->assign('message',$data);
        $this->cismarty->display('client/user/again_send_activation.html');
    }

    public function again_activation()
    {
        $email = $this->input->post('email');
        $this->load->model('Service_user');
        $result = $this->Service_user->again_register_activation(array('email' => $email));
        $result == 'email_send_fail' ||'email_send_success' ||'email_not_exist _or_activation';
        $this->session->set_flashdata('message', $result);
        redirect('client/user/send_activation');

    }

    public function register_activation_results()
    {
        $data = $this->session->flashdata('message');
        $this->load->helper('error');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/activation_results.html');
    }

    public function forget_password()
    {
        $data = $this->session->flashdata('message');
        $this->load->helper('error');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/send_password_email.html');
    }

    public function send_forget_password_email()
    {
        $this->load->model('Service_user');
        $email = $this->input->post('email');
        $result = $this->Service_user->send_forget_password_email(array('email' => $email));
        $result == 'email_not_exist' ||  'email_send_fail' || 'email_send_success';
        $this->session->set_flashdata('message', $result);
        redirect('client/user/forget_password');
    }

    public function reset_password_authentication()
    {
        $this->load->model('Service_user');
        $token = $this->input->get('token');
        $result = $this->Service_user->reset_password_authentication(array('token' => $token));
        if($result == 'link_timeout' || $result == 'link_not_exist')
        {
            $this->session->set_flashdata('message', $result);
            redirect('client/user/forget_password');
        }
        if($result == 'authentication_success')
        {
            redirect('client/user/set_new_password');
        }
    }
    public function set_new_password()
    {
        $data = $this->session->flashdata('message');
        var_dump($data);
        $this->load->helper('error');
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('client/user/update_password.html');
    }

    public function update_password()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $data = array(
            'email' => $email,
            'password' => $password
        );
        $this->load->model('Service_user');
        $result = $this->Service_user->update_password($data);
        var_dump($result);
        if($result == 'update_password_success')
        {
             $this->session->set_flashdata('message', 'update_password_success');
             redirect('client/user');
        }
        if($result == 'password_not_reset' || $result == 'email_not_exist')
        {
            $this->session->set_flashdata('message', $result);
            redirect('client/user/set_new_password');
        }
    }

    public function sign_out()
    {
        $this->session->sess_destroy('user');
        redirect('client/user');
    }
}