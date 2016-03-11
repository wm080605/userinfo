<?php
class Service_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Logic_user');
    }
    public function login_check($email, $password)
    {   
        //$this->load->model('Logic_user');
        return  $this->Logic_user->get_user($email, $password);   
    }

    public function register_add($data)
    {
        //$this->load->model('Logic_user');
        return $this->Logic_user->add($data);
    }

    public function admin_center()
    {
        //$this->load->model('Logic_user');
        return $result = $this->Logic_user->get_all();    
    }

    public function isexist_email($data)
    {
        //$this->load->model('Logic_user');
        return $this->Logic_user->isexist($data);
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

    public function do_email($data)
    {
        $this->load->library('parser');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.exmail.qq.com';
        $config['smtp_user'] = 'wangm@playable.cn';
        $config['smtp_pass'] = 'wm123456';
        $config['smtp_port'] = '465';
        $config['mailtype'] = 'text';
        $config['smtp_crypto'] = 'ssl';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $token = md5($data['name'].$data['email']);

        $this->email->from('wangm@playable.cn');
        $this->email->to($data['email']);   
        $this->email->subject('用户帐号激活');
        $message =  '{name}先生/小姐,感谢注册，请点击以下链接激活你的邮箱{link}';
        $list = array(
            'name' => $data['name'],
            'link' =>  'http://localhost/index.php/client/user/activation?token='.$token
            );
        $result = $this->parser->parse_string($message,$list);
        $this->email->message($result); 

        if( $this->email->send() )
        {
            return TRUE;
        }
        else
        {
            $this->email->print_debugger();
            return FALSE;
        }
    }

    public function insert_token($data)
    {
        //$this->load->model('Logic_user');
        return $this->Logic_user->token_add($data);
    }
}