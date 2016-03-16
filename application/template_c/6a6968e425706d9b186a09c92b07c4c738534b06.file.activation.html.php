<?php /* Smarty version Smarty-3.0.6, created on 2016-03-16 13:55:48
         compiled from "/var/workspace/userinfo/application/views/client/user/activation.html" */ ?>
<?php /*%%SmartyHeaderCode:155132418156e8f5645ed6f6-93937396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a6968e425706d9b186a09c92b07c4c738534b06' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/activation.html',
      1 => 1458107580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155132418156e8f5645ed6f6-93937396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open('/client/user/again_activation','class="form-signin" id="login"');?>

    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
    <input type="submit" value="重新发送激活邮件" class="btn btn-lg btn-primary btn-block"/>
<?php echo form_close();?>

<?php if ($_smarty_tpl->getVariable('message')->value=="error_send_fail"){?>
    <div id="message" style="display: none;">发送失败，请重发</div>
<?php }elseif($_smarty_tpl->getVariable('message')->value=="activation_success"){?>   
    <div id="message" style="display: none;">激活链接已发送</div>
<?php }elseif($_smarty_tpl->getVariable('message')->value=="email_not_correct"){?>   
    <div id="message" style="display: none;">邮箱不正确或邮箱已激活</div>
<?php }elseif($_smarty_tpl->getVariable('message')->value=="activation_time_out"){?>   
    <div id="message" style="display: none;">您的激活有效期已过,请输入注册邮箱重新激活</div>   
<?php }else{ ?>
    <div id="message" style="display: none;"></div>
<?php }?>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>