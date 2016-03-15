<?php /* Smarty version Smarty-3.0.6, created on 2016-03-15 11:08:46
         compiled from "/var/workspace/userinfo/application/views/client/user/activation.html" */ ?>
<?php /*%%SmartyHeaderCode:60747607756e77cbeaf2611-90515198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a6968e425706d9b186a09c92b07c4c738534b06' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/activation.html',
      1 => 1458011324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60747607756e77cbeaf2611-90515198',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo $_smarty_tpl->getVariable('error')->value;?>

<?php echo form_open('/client/user/again_activation','class="form-signin" id="login"');?>

    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
    <input type="submit" value="重新激活" class="btn btn-lg btn-primary btn-block"/>
<?php echo form_close();?>

<script type="text/javascript">
    
</script>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>