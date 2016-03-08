<?php
class User extends CI_Controller
{
    // public function index()
    // {
    //     $this->cismarty->display('client/user/login.html');
    // }
    public function admin_center()
    {
        $this->load->model('Service_user');
        $result = $this->Service_user->admin_center();
        //var_dump($result);  
        $this->cismarty->assign("result",$result);
        $this->cismarty->display('admin/admincenter.html');
    }
}