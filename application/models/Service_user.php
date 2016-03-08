<?php
class Service_user extends CI_Model
{
    public function login_check($email,$password)
    {   
        // $email = $this->input->post('email');
        // $password = $this->input->post('password');
        $this->load->model('Logic_user');
        $result = $this->Logic_user->get_user($email, $password);

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
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('city', 'Address', 'required');
        //$this->form_validation->set_rules('userfile', 'Userflie', 'required');

        $this->form_validation->set_message('required','{field}为必填项');
        $this->form_validation->set_message('matches','{field}和password不同');
        $this->form_validation->set_message('valid_email','{field}格式不正确');
        $this->form_validation->set_message('min_length','{field}不能小于{param} 个字符');
        $this->form_validation->set_message('regex_match','{field}格式不正确');
        
        if ($this->form_validation->run() == FALSE)
        {
            //echo "<script>alert('不正确'); </script>";
            return FALSE;
        }
        else
        {
            //$this->cismarty->display('client/user/registerconfirm.html');
            return TRUE;
        }
    } 
    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            //$data = array('error' => $this->upload->display_errors());
            return FALSE;
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data('file_name'));
            return TRUE;
        }
    }

    public function register_confirm()
    {
        $info = $this->input->post();
        return $info;
    }
}