<?php
class User extends CI_Controller
{
    public function admin_center()
    {
        $data = $this->session->userdata('user');
        if($data != NULL && $data['isadmin'] == TRUE)
        {
            $this->load->model('Service_user');
            $this->load->helper('error');
            $all_num = $this->db->count_all('user');
            $page_num = 1;
            $page_all_num = ceil($all_num/$page_num);
            $page = empty($this->input->get('page')) ? 1 : $this->input->get('page');

            $offset = ($page-1)*$page_num;
            $this->db->limit($page_num, $offset);
            $result = $this->db->get('user')->result_array();
            $next = $page>=$page_all_num ? $page_all_num : $page+1 ;
            $last = $page<=1 ? 1 : $page-1 ;

            $this->cismarty->assign("next",$next);
            $this->cismarty->assign("last",$last);
            $this->cismarty->assign("page_all_num",$page_all_num);
            $this->cismarty->assign("page",$page);
            $this->cismarty->assign("result",$result);
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

    public function userinfo()
    {
        $result = $this->Service_user->admin_center();
    }
}