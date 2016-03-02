<?php /* Smarty version Smarty-3.0.6, created on 2016-02-29 10:20:55
         compiled from "/var/workspace/userinfo/application/views/boo.html" */ ?>
<?php /*%%SmartyHeaderCode:184382899256d3ab07d88c52-54420817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bacce8b44246c24beb51302266e5c8903bdf89b' => 
    array (
      0 => '/var/workspace/userinfo/application/views/boo.html',
      1 => 1456712454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184382899256d3ab07d88c52-54420817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
</head>
<body>
<p><?php echo $_smarty_tpl->getVariable('test')->value;?>
</p>

当前的路径为：<?php echo $_SERVER['PHP_SELF'];?>
<br/>
当前时间为：<?php echo time();?>
<br/>

<ol>
    <?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('books')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
?>
    <li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</li>
    <?php }} ?>
</ol>

<!-- <ol>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('arr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
    <?php }} ?>
</ol> -->

</body>
</html>

