<?php
function error($data)
{
    if ($data != '')
    {
        if ($data == "user_not_activation")
        {
            return '用户不能登陆，请先激活邮箱';
        }
        elseif ($data == "error_user_or_password")
        {
            return  "密码错误或用户名不正确";
        }
        elseif ($data == "please_sign_in")
        {
            return  '请先登陆';
        }
        elseif ($data == "update_password_success")
        {
            return '修改密码成功';
        }
    }    
}