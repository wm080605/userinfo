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

    public function user_info()
    {
        $page = $this->input->get('page');
        $this->load->model('Service_user');
        $data = $this->Service_user->page($page);
        // var_dump($data);die();

        $login_user = $this->session->userdata('user');
        $this->cismarty->assign('name', $login_user['name']);
        $this->cismarty->assign('result', $data);
        $this->cismarty->display('admin/user/user_info.html');
    }

    public function user_search()
    {
        $name = $this->input->post('name');
        $email = $this->input ->post('email');
        $this->load->model('Service_user');
        $login_user = $this->session->userdata('user');
        $this->cismarty->assign('name', $login_user['name']);
        $result = $this->Service_user->user_search(array('name' => $name, 'email' =>$email));
        if($result == NULL)
        {
            $this->cismarty->assign('message', 'user_not_exist');
            $this->cismarty->assign('result', $result);
            $this->cismarty->display('admin/user/search_results.html');
        }
        else
        {
            $this->cismarty->assign('result', $result);
            $this->cismarty->display('admin/user/search_results.html');
        }
    }
}