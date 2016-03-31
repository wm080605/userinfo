<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:14:06
         compiled from "/var/workspace/userinfo/application/views/client/user/user_center.html" */ ?>
<?php /*%%SmartyHeaderCode:148173993956fcb21e2714e3-77151579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dca4f1834d5ff5ea722b5a316618615492baed2e' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/user_center.html',
      1 => 1459392224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148173993956fcb21e2714e3-77151579',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<h1><?php echo $_smarty_tpl->getVariable('name')->value;?>
  Welcome!!!!!</h1>
<a class="btn btn-primary" role="button" href="<?php echo site_url('client/user/sign_out');?>
">退 出</a>
<div id="message"><?php echo error_message($_smarty_tpl->getVariable('message')->value);?>
</div>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>