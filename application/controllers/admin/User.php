<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $data = $this->session->userdata('user');
        if($data == NULL)
        {
            redirect('client/user');
        }
        else
        {
            $this->load->model('Service_user');
            $result = $this->Service_user->admin_center();
            $this->cismarty->assign("result",$result);
            //$sessiondata = $this->session->userdata('user');

            $this->cismarty->assign('message', '你已经登陆,请先退出');
            $this->cismarty->display('admin/user/admincenter.html');         
        }

    }
}