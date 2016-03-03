<?php /* Smarty version Smarty-3.0.6, created on 2016-03-03 14:38:23
         compiled from "/var/workspace/userinfo/application/views/admin/admincenter.html" */ ?>
<?php /*%%SmartyHeaderCode:149750102656d7dbdf368ce1-62721819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da425f790c9e2e4cefd7b1de8f48d602ec3b6390' => 
    array (
      0 => '/var/workspace/userinfo/application/views/admin/admincenter.html',
      1 => 1456987096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149750102656d7dbdf368ce1-62721819',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<center>
    <table border="1" class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Password</td>
            <td>Email</td>
            <td>CreateTime</td>
            <td>UpdateTime</td>
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
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['createTS'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['updateTS'];?>
</td>
        </tr>
        <?php }} ?>
    </table>
</center>
<?php $_template = new Smarty_Internal_Template('admin/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>