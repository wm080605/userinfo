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

            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('admin/user/admin_center.html');
        }
        else
        {
            $this->session->set_flashdata('message','not_sign_in');
            redirect('client/user');
        }

    }
}