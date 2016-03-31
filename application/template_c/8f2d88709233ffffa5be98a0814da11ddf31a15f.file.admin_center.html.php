<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:16:55
         compiled from "/var/workspace/userinfo/application/views/admin/user/admin_center.html" */ ?>
<?php /*%%SmartyHeaderCode:129702482256fcb2c73aaa01-74554620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f2d88709233ffffa5be98a0814da11ddf31a15f' => 
    array (
      0 => '/var/workspace/userinfo/application/views/admin/user/admin_center.html',
      1 => 1459395801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129702482256fcb2c73aaa01-74554620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('admin/user/admin_center');?>
">管理员中心</a></li>
        <li><a href="<?php echo site_url('admin/user/users_list');?>
">用户列表</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="<?php echo site_url('client/user/sign_out');?>
">退 出</a></li>
      </ul>
      <center><p style="color: white; margin-top:14px">欢迎用户<?php echo $_smarty_tpl->getVariable('name')->value;?>
</p></center>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<h1>Welcome!!</h1>
<div id="message"><?php echo error_message($_smarty_tpl->getVariable('message')->value);?>
</div>
<?php $_template = new Smarty_Internal_Template('admin/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>