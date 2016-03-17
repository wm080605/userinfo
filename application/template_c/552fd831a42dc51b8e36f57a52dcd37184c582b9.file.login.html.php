<?php /* Smarty version Smarty-3.0.6, created on 2016-03-17 16:10:26
         compiled from "/var/workspace/userinfo/application/views/client/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:152121558956ea66726bdbc1-85623505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '552fd831a42dc51b8e36f57a52dcd37184c582b9' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/login.html',
      1 => 1458202224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152121558956ea66726bdbc1-85623505',
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
    <a  href="<?php echo site_url('client/user/again_activation');?>
">重新发送激活邮件</a>
    <span >|</span>
    <a  href="<?php echo site_url('client/user/find_password');?>
">找回密码</a>
<?php echo form_close();?>

<?php if (isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="error_not_activation"){?>
    <div id="message" >用户不能登陆，请先激活邮箱</div>
<?php }elseif(isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="error_user_or_password"){?>
    <div id="message" >密码错误或用户名不正确</div>
<?php }elseif(isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="error_sign_in"){?>
    <div id="message" >请先登陆</div>
<?php }elseif(isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="error_sign_out"){?>
    <div id="message" >请先退出</div>
<?php }else{ ?>
    <div id="message" ></div>
<?php }?>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>