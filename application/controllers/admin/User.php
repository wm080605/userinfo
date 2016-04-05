<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $login_user = $this->session->userdata('user');
        if($login_user != NULL && $login_user['isadmin'] == TRUE)
        {
            $data = $this->session->flashdata('message');
            $this->cismarty->assign('name', $login_user['name']);
            $this->cismarty->assign('message', $data);
            $this->cismarty->display('admin/user/admin_center.html');
        }
        else
        {
            $this->session->set_flashdata('message','please_sign_in');
            redirect('client/user');
        }
    }

    public function users_list()
    {
        $login_user = $this->session->userdata('user');

        $page = $this->input->get();
        $select_data = $this->input->post();
        $this->load->model('Service_user');
        $data = $this->Service_user->select_page($select_data, $page);
        $this->cismarty->assign('name', $login_user['name']);
        $this->cismarty->assign('result', $data);
        $this->cismarty->display('admin/user/user_info.html');
    }
}