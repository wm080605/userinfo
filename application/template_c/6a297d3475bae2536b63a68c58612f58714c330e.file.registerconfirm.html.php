<?php /* Smarty version Smarty-3.0.6, created on 2016-03-04 17:38:29
         compiled from "/var/workspace/userinfo/application/views/client/user/registerconfirm.html" */ ?>
<?php /*%%SmartyHeaderCode:177235738556d9579525f736-22971989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a297d3475bae2536b63a68c58612f58714c330e' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/registerconfirm.html',
      1 => 1457084121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177235738556d9579525f736-22971989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open('client/user/useradd');?>

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
   <!--  <input type="submit" class="btn btn-primary" value="确认"/> -->
    <a class="btn btn-primary" role="button" href="register">返 回</a> 
<?php echo form_close();?>

<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>