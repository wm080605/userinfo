<?php /* Smarty version Smarty-3.0.6, created on 2016-03-15 09:51:22
         compiled from "/var/workspace/userinfo/application/views/client/user/again_activation.html" */ ?>
<?php /*%%SmartyHeaderCode:142144183956e76a9a0301a0-15665141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2469908584c6a6e381b18646b8d85c406e21ab9c' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/again_activation.html',
      1 => 1458006679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142144183956e76a9a0301a0-15665141',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('error')->value;?>

<form>
    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
    <input type="submit" value="重新激活" class="btn  btn-primary"/>
</form>


<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>