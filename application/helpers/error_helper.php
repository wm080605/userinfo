<?php
function error_message($data)
{
    $message = '';
    switch ($data) 
    {
        case 'user_not_activation':
            $message =  '用户不能登陆，请先激活邮箱';
            break;
        case 'error_user_or_password':
            $message =  "密码错误或用户名不正确";
            break;
        case 'please_sign_in':
            $message =  '请先登陆';
            break;
        case 'update_password_success':
            $message = '修改密码成功';
            break;
        case 'update_password_fail':
            $message = '修改密码失败';
            break;
        case 'email_not_exist':
            $message = '邮箱不存在';
            break;
        case 'password_not_reset':
            $message = '账户未进行忘记密码操作';
            break;
        case 'email_send_fail':
            $message = '发送失败,请重发';
            break;
        case 'email_send_success':
            $message = '链接已发送';
            break;
        case 'link_not_exist':
            $message = '链接不存在';
            break;
        case 'link_timeout':
            $message = '您的链接有效期已过,请输入邮箱重新发送邮件';
            break;
        case 'activation_success':
            $message = '激活成功';
            break;
        case 'activation_fail':
            $message = '激活失败';
            break;
        case 'register_success':
            $message = '注册成功,请前往邮箱激活';
            break;
        case 'register_fail':
            $message = '注册失败';
            break;
        case 'email_not_exist _or_activation':
            $message = '邮箱不存在或已激活';
            break;
        default:
        $message = '';
            break;
    }
    return $message;
}

