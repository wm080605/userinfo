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

    public function update_user_info($data, $user_id)
    {
        return $this->Logic_user->update_user($data, $user_id);
    }

    // public function register_add($data)
    // {
    //     return $this->Logic_user->add($data);
    // }

    public function admin_center()
    {
        return $result = $this->Logic_user->get_all();
    }

    public function register_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Passconf', 'required|matches[password]');
        $this->form_validation->set_rules(
                'email', 
                'Email', 
                array('required', 
                          'valid_email', 
                          array('email_callable', array($this->Service_user,'email_validation'))
                )
        );
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

    public function email_validation($data)
    {
        $this->load->library('form_validation');
        $emaildata = array('email' => $data);
        $email = $this->Logic_user->email_exist($emaildata);
        if($data == $email['email'])
        {
            $this->form_validation->set_message('email_callable', 'The {field} 已经使用');
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
        
        $this->load->config('email', true);
        //item()获取email配置项  
        $email_config = $this->config->item('email');
        $this->load->library('email');
        $this->email->from($email_config['from']);
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
            echo $this->email->print_debugger();
            return FALSE;
        }
    }

    public function send_password_email($data)
    {
        $this->load->library('parser');
        $token = $data['token'];
        
        $this->load->config('email',true);
        $email_config = $this->config->item('email');
        $this->load->library('email');

        $this->email->from($email_config['from']);
        $this->email->to($data['email']);
        $this->email->subject('找回密码');
        $list = array(
            'name' => $data['name'],
            'link' =>  base_url('client/user/reset_password_authentication').'?token='.$token
            );
        $this->email->message($this->parser->parse('template/find_password_temp', $list));

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

    public function create_token()
    {
        return md5(uniqid());
    }

    public function create_token_out_time()
    {
        return time() + 60 * 60 * 24;
        // return $token_out_time = time();
    }

    public function register($data)
    {
        $register_validation_result = $this->register_validation();
        if ($register_validation_result == TRUE)
        {
            $token = $this->create_token();
            $token_out_time = $this->create_token_out_time();
            $userdata = array(
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'password' =>md5($data['password']),
                    'createtime' => date("Y-m-d H:i:s"),
                    'token_out_time' => $token_out_time,
                    'token' => $token
            );
            $register_result = $this->Logic_user->add($userdata);
            if($register_result)
            {
                $send_email_result = $this->send_email($userdata);
                if($send_email_result == FALSE)
                {
                    $user_id = $this->Logic_user->add();
                    $data = array(
                        'token' => NULL,
                        'token_out_time' => NULL
                    );
                    $this->Logic_user->update_user($data, $user_id);
                    $result = 'email_send_fail';
                }
                else
                {
                    $result= 'register_success';
                }
            }
            else
            {
                $result = 'register_fail';
            }
        }
        else
        {
            $result = 'register_validation_fail';
        }
        return $result;
    }

    public function register_activation($token)
    {
        $nowtime = time();
        $userdata = $this->Logic_user->get_user($token);

        if($userdata && $userdata['status'] == 0)
        {
            if($nowtime > $userdata['token_out_time'])
            {     
                $data = array(
                            'token' => NULL,
                            'token_out_time' => NULL
                        );
                $this->Logic_user->update_user($data, $userdata['id']);
                $result = 'link_timeout';
            }
            else
            {
                $data =  array(
                    'token' => NULL,
                    'token_out_time' => NULL,
                    'status' => 1
                );
                $this->Logic_user->update_user($data, $userdata['id']);
                $result = 'activation_success';
            }
        }
        else
        {
            $result = 'activation_fail';
        }
        return $result;
    }

    public function again_register_activation($email)
    {
        $userdata = $this->Logic_user->get_user($email);
        if($userdata['email'] && $userdata['status'] == 0 )
        {
            $token_out_time = $this->create_token_out_time();
            $token = $this->create_token();
            $data = array(
                    'token' =>$token,
                    'token_out_time' =>$token_out_time,
            );
            $this->Logic_user->update_user($data, $userdata['id']);
            $data = array(
                'email' => $userdata['email'],
                'name' => $userdata['name'],
                'token' => $token
            );
            $result = $this->send_email($data);
            if($result == FALSE)
            {
                $data = array(
                    'token' =>NULL,
                    'token_out_time' =>NULL
                );
                $this->Logic_user->update_user($data, $userdata['id']);
                $result = 'email_send_fail';
            }
            else
            {
                $result = 'email_send_success';
            }
        }
        else
        {
            $result = 'email_not_exist';
        }
        return $result;
    }

    public function send_forget_password_email($email)
    {
        $userdata = $this->Logic_user->get_user($email);
        if(!$userdata)
        {
            $result = 'email_not_exist';
        }
        else
        {
            $token = $this->create_token();
            $token_out_time = $this->create_token_out_time();
            $data = array(
                'token' => $token,
                'token_out_time' => $token_out_time,
                'id' => $userdata['id']
            );
            $this->Logic_user->update_user($data, $userdata['id']);

            $data = array(
                'name' => $userdata['name'],
                'email' => $userdata['email'],
                'token' => $token
            );
            $result = $this->send_password_email($data);
            if($result == FALSE)
            {
                $data = array(
                    'token' => NULL,
                    'token_out_time' => NULL
                );
                $result = 'email_send_fail';
            }
            else
            {
                $result = 'email_send_success';
            }
        }
        return $result;
    }
    
    public function reset_password_authentication($token)
    {
        $nowtime = time();
        $userdata = $this->Logic_user->get_user($token);
        
        if($userdata)
        {
            if($nowtime > $userdata['token_out_time'])
            {
                $data = array(
                        'token' => NULL,
                        'token_out_time' => NULL
                );
                $this->Logic_user->update_user($data, $userdata['id']);
                $result = 'link_timeout';
            }
            else
            {
                $data = array(
                        'token' => NULL,
                        'token_out_time' => NULL,
                        'authentication' => 1
                );
                $this->Logic_user->update_user($data, $userdata['id']);
                $result = 'authentication_success';
            }
        }
        else
        {
            $result = 'link_not_exist';
        }      
        return $result;
    }

    public function update_password($data)
    {
        $userdata = $this->Logic_user->get_user(array('email' => $data['email']));
        if(!$userdata)
        {
            return 'email_not_exist';
        }
        else
        {   
            if($userdata['authentication'] == 1)
            {
                $data = array(
                    'authentication' => 0,
                    'password' => $data['password']
                );
                $this->Logic_user->update_user($data, $userdata['id']);
                return 'update_password_success';
            }
            else
            {
                return 'password_not_reset';
            } 
        }
    }
}