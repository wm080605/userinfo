<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $login_data = $this->session->userdata('user');
        if($login_data != NULL && $login_data['isadmin'] == TRUE)
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('admin/user/admin_center.html');
        }
        else
        {
            $this->session->set_flashdata('message','please_sign_in');
            redirect('client/user');
        }
    }

    public function user_info()
    {
        $page = $this->input->get('page');
        $this->load->model('Service_user');
        $data = $this->Service_user->page($page);

        $this->cismarty->assign('result', $data);
        $this->cismarty->display('admin/user/user_info.html');
    }
}