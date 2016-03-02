<?php
/**
* 
*/
class User extends CI_Controller
{
    public function index()
    {
        // $list=array(
        //     array('name'=>'jack','password'=>11111,'email'=>'sda@qq.com'),
        //     array('name'=>'jack2','password'=>11111,'email'=>'sda2@qq.com'),
        //     array('name'=>'jack3','password'=>11111,'email'=>'sda3@qq.com')
        //     ); 
        // $data['list'] = $list;
        //$this->load->vars($data);
        // $this->load->helper('url');
        // $this->load->helper('form');
        $this->cismarty->display('client/user/login.html');
    }    
    public function test()
    {
        $test="hahahahahahahahah";
        $this->cismarty->assign('test', $test);
        $this->cismarty->display('test.html');
    }


    public function upload()
    {
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 100;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);
    }
    public function login()
    {   
        $this->load->helper(array('url','form'));
        $this->load->database();
        // $login=$_POST['login']; 
        // $register=$_POST['register'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql="select * from user where  password = '$password' and email = '$email'";
        //echo $sql;
        $res=$this->db->query($sql);//执行sql查询
        $num=$res->row_array();//获取记录数
        //var_dump($num);

        if($num){
            if($num['isadmin'] == null){
                echo "登陆成功";   
                // $this->load->model('User_model');
                // $data['list']=$this->User_model->getAll();
                // $this->load->view('admin_view',$data);
                $this->cismarty->display('client/user/usercenter.html');
            }else{
                //echo "user登陆成功";
                echo "密码错误或用户名不正确"; 
                $this->cismarty->display('client/user/login.html');
                //$this->load->view('user_view');
            }  
        }else{  
            echo "密码错误或用户名不正确";
            //echo "<script>alert('密码错误或用户名不正确'); </script>";
            //$this->load->view('client/user/login');
            $this->cismarty->display('client/user/login.html');
        }
    }
    public function register(){ 
        //$this->load->helper(array('form', 'url'));
        $this->cismarty->display('client/user/register.html');
    }

    public function registercheck()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[11]');
        // /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        $this->form_validation->set_message('required','{field}为必填项');
        $this->form_validation->set_message('matches','{field}和password不同');
        $this->form_validation->set_message('valid_email','{field}格式不正确');
        $this->form_validation->set_message('min_length','{field}must have at least {param} characters.');
        //$this->form_validation->set_message('regex_match','{field}格式不正确');
        if ($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('不正确'); </script>";
            $this->cismarty->display('client/user/register.html');
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }

    public function add()
    {
        $this->load->database();
        $sql =" insert into user(name,password,email) values('mar2','12345','asqw@sw.com')";    
        $bool =$this->db->query($sql);
        if($bool){
            echo"受影响行数". $this->db->affected_rows();
            echo"ID". $this->db->insert_id();
        }
        $this->load->helper('url');
        $this->load->view('user');
    }
}