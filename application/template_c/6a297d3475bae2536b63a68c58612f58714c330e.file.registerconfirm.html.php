<?php /* Smarty version Smarty-3.0.6, created on 2016-03-03 17:52:41
         compiled from "/var/workspace/userinfo/application/views/client/user/registerconfirm.html" */ ?>
<?php /*%%SmartyHeaderCode:41114301156d809697cec63-63718285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a297d3475bae2536b63a68c58612f58714c330e' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/registerconfirm.html',
      1 => 1456997511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41114301156d809697cec63-63718285',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open_multipart('client/user/useradd');?>

    <ul>
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</li>  
        <?php }} ?>
    </ul>
    <input type="submit" value="submit"/>
<?php echo form_close();?>

<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>