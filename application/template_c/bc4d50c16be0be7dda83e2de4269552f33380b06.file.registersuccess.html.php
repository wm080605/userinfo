<?php /* Smarty version Smarty-3.0.6, created on 2016-03-15 11:12:50
         compiled from "/var/workspace/userinfo/application/views/client/user/registersuccess.html" */ ?>
<?php /*%%SmartyHeaderCode:48225779956e77db22666a9-64914760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc4d50c16be0be7dda83e2de4269552f33380b06' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/registersuccess.html',
      1 => 1458011562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48225779956e77db22666a9-64914760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <h1>激活邮件已发送，请24小时内登陆激活!!!!<h1><br>
    <?php if (isset($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
        <div id="message" style="display: none;"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</div>
    <?php }else{ ?>   
        <div id="message" style="display: none;"></div>
    <?php }?>
    <a class="btn btn-primary" role="button" href="<?php echo base_url('client/user');?>
">返 回</a> 
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>