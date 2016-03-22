<?php
function error_message($data)
{
    switch ($data) 
    {
        case 'user_not_activation':
            return '用户不能登陆，请先激活邮箱';
            break;
        case 'error_user_or_password':
            return  "密码错误或用户名不正确";
            break;
        case 'please_sign_in':
            return  '请先登陆';
            break;
        case 'update_password_success':
            return '修改密码成功';
            break;
        default:
            break;
    }
}