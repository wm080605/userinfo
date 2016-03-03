<?php
class Service_user extends CI_Model
{
    public function login_check()
    {   
        $email = $this->input->post('email', true);
        $password = $this->input->post('password',true);
        $this->load->model('Logic_user');
        $result = $this->Logic_user->get_user($email,$password);

        return $result;
    }
    public function admin_center()
    {
        $this->load->model('Logic_user');
        $result = $this->Logic_user->get_all();
        return $result;
    }

    public function register_check()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]');
        // /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('city', 'Address', 'required');

        $this->form_validation->set_message('required','{field}为必填项');
        $this->form_validation->set_message('matches','{field}和password不同');
        $this->form_validation->set_message('valid_email','{field}格式不正确');
        $this->form_validation->set_message('min_length','{field}must have at least {param} characters.');
        $this->form_validation->set_message('regex_match','{field}格式不正确');
        $this->form_validation->set_message('min','请选择地区');
        
        if ($this->form_validation->run() == FALSE)
        {
            //echo "<script>alert('不正确'); </script>";
            return false;
        }
        else
        {
            //$this->cismarty->display('client/user/registerconfirm.html');
            return true;
        }
    }
    public function register_confirm()
    {
        $info = $this->input->post();
        return $info;
    }
}