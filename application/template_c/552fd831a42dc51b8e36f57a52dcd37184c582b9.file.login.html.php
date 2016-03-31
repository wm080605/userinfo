<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:11:31
         compiled from "/var/workspace/userinfo/application/views/client/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:127178578656fcb1830c4f79-58870452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '552fd831a42dc51b8e36f57a52dcd37184c582b9' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/login.html',
      1 => 1459392224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127178578656fcb1830c4f79-58870452',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <script type="text/javascript " src="/resources/js/login_check.js"></script>
<?php echo form_open('/client/user/login','class="form-signin" id="login"');?>

    <h2 class="form-sigin-heading">欢迎登陆</h2>
    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
    <button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">登 陆</button>
    <a href="<?php echo site_url('client/user/register');?>
">注   册</a>
    <span >|</span>
    <a  href="<?php echo site_url('client/user/send_activation');?>
">重新发送注册激活邮件</a>
    <span >|</span>
    <a  href="<?php echo site_url('client/user/forget_password');?>
">忘记密码</a>
<?php echo form_close();?>

<div id="message" ><?php echo error_message($_smarty_tpl->getVariable('message')->value);?>
</div>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>