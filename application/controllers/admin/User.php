<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $this->load->model('Service_user');
        $result = $this->Service_user->admin_center();
        $this->cismarty->assign("result",$result);

        $this->cismarty->assign('message', '登陆成功');
        $this->cismarty->display('admin/user/admincenter.html');
    }
}