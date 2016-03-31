<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 13:13:11
         compiled from "/var/workspace/userinfo/application/views/client/user/register_results.html" */ ?>
<?php /*%%SmartyHeaderCode:136986911456fcb1e7e1f096-91529291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a1694bc9ddd9fd5481916c979f076b97e99c16b' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/register_results.html',
      1 => 1459392224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136986911456fcb1e7e1f096-91529291',
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