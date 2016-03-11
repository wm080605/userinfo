<?php /* Smarty version Smarty-3.0.6, created on 2016-03-09 09:31:55
         compiled from "/var/workspace/userinfo/application/views/admin/user/admincenter.html" */ ?>
<?php /*%%SmartyHeaderCode:4623690556df7d0b6e2e01-75914952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7389318a2fa841579c74ed8be001537321e0a4ab' => 
    array (
      0 => '/var/workspace/userinfo/application/views/admin/user/admincenter.html',
      1 => 1457438006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4623690556df7d0b6e2e01-75914952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<center>
    <table border="1" class="table table-hover">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Password</td>
            <td>Email</td>
            <td>CreateTime</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['password'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['createtime'];?>
</td>
        </tr>
        <?php }} ?>
    </table>
</center>
<?php $_template = new Smarty_Internal_Template('admin/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>