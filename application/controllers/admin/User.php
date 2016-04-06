<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Service_user');
        $login_user = $this->Service_user->login_user_info();
        if($login_user == NULL || $login_user['isadmin'] == FALSE)
        {
            $this->session->set_flashdata('message','please_sign_in');
            redirect('client/user');
        }
        $this->cismarty->assign('name', $login_user['name']);
    }

    public function admin_center()
    {
        $data = $this->session->flashdata('message');
        
        $this->cismarty->assign('message', $data);
        $this->cismarty->display('admin/user/admin_center.html');
    }

    public function users_list()
    {
        $page = $this->input->get();
        $select_data = $this->input->post();

        $data = $this->Service_user->get_users($select_data, $page);

        $this->cismarty->assign('result', $data);
        $this->cismarty->display('admin/user/user_info.html');
    }
}