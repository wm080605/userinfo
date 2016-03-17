<?php
class Service_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Logic_user');
    }
    public function get_user_info($data)
    {   
        return  $this->Logic_user->get_user($data);
    }

    public function register_add($data)
    {
        return $this->Logic_user->add($data);
    }

    public function admin_center()
    {
        return $result = $this->Logic_user->get_all();
    }

    public function isexist_email($emaildata)
    {
        return $this->Logic_user->isexist($emaildata);
    }

    public function register_check()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Passconf', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('city', 'Address', 'required');

        $this->form_validation->set_message('required','{field}为必填项');
        $this->form_validation->set_message('matches','{field}和password不同');
        $this->form_validation->set_message('valid_email','{field}格式不正确');
        $this->form_validation->set_message('min_length','{field}不能小于{param} 个字符');
        $this->form_validation->set_message('regex_match','{field}格式不正确');
        
        if ($this->form_validation->run() == FALSE)
        {
            return FALSE;
        }
        else
        {
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
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function send_email($data)
    {
        $this->load->library('parser');
        $token = $data['token'];
   
        // $this->email->initialize($config);
        $this->email->from('wangm@playable.cn');
        $this->email->to($data['email']);
        $this->email->subject('用户帐号激活');

        $list = array(
            'name' => $data['name'],
            'link' =>  base_url('client/user/activation').'?token='.$token
            );
        $this->email->message($this->parser->parse('template/register_temp', $list));

        if( $this->email->send())
        {
            return TRUE;
        }
        else
        {
            $this->email->print_debugger();
            return FALSE;
        }
    }

    public function send_email_fail_update($userdata)
    {
        return $this->Logic_user->email_fail_update($userdata);
    }

    public function activation_fail_update($userdata)
    {
        return $this->Logic_user->fail_update($userdata);
    }

    public function activation_success_update($userdata)
    {
        return $this->Logic_user->update($userdata);
    }

    public function again_activation_update($userdata)
    {
        return $this->Logic_user->activation_update($userdata);
    }

    public function create_token()
    {
        return $token = md5(uniqid());
    }
}