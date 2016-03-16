<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $data = $this->session->userdata('user');
        if($data != NULL && $data['isadmin'] == TRUE)
        {
            $this->load->model('Service_user');
            $result = $this->Service_user->admin_center();
            $this->cismarty->assign("result",$result);

            $this->cismarty->assign('message', 'error_sign_out');
            $this->cismarty->display('admin/user/admin_center.html');         
        }
        else
        {
            $this->cismarty->assign('message', 'error_sign_in');
            $this->cismarty->display('client/user/login.html');
        }

    }
}