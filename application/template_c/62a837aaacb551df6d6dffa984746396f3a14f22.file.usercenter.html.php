<?php /* Smarty version Smarty-3.0.6, created on 2016-03-11 16:13:22
         compiled from "/var/workspace/userinfo/application/views/client/user/usercenter.html" */ ?>
<?php /*%%SmartyHeaderCode:173735278856e27e220ca939-04707457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a837aaacb551df6d6dffa984746396f3a14f22' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/usercenter.html',
      1 => 1457681834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173735278856e27e220ca939-04707457',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<h1>Welcome!!!!!</h1>
<?php if (isset($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
    <div id="message" style="display: none;"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</div>
    <?php }else{ ?>   
    <div id="message" style="display: none;"></div>
<?php }?>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>