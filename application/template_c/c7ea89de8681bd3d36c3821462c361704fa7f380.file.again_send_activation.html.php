<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:12:31
         compiled from "/var/workspace/userinfo/application/views/client/user/again_send_activation.html" */ ?>
<?php /*%%SmartyHeaderCode:63698381756fcb1bfef3c41-07571510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7ea89de8681bd3d36c3821462c361704fa7f380' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/again_send_activation.html',
      1 => 1459392224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63698381756fcb1bfef3c41-07571510',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open('/client/user/again_activation','class="form-signin" id="login"');?>

    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
    <input type="submit" value="重新发送激活邮件" class="btn btn-lg btn-primary btn-block"/>
<?php echo form_close();?>

<div id="message"><?php echo error_message($_smarty_tpl->getVariable('message')->value);?>
</div>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>