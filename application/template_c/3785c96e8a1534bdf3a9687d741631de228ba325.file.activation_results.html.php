<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:13:47
         compiled from "/var/workspace/userinfo/application/views/client/user/activation_results.html" */ ?>
<?php /*%%SmartyHeaderCode:129874073156fcb20b3c2732-66836624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3785c96e8a1534bdf3a9687d741631de228ba325' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/activation_results.html',
      1 => 1459392224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129874073156fcb20b3c2732-66836624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="message"><?php echo error_message($_smarty_tpl->getVariable('message')->value);?>
</div>
<a class="btn btn-primary" role="button" href="<?php echo site_url('client/user');?>
">返 回</a>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>