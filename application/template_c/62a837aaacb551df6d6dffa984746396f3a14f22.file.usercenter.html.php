<?php /* Smarty version Smarty-3.0.6, created on 2016-03-16 09:44:32
         compiled from "/var/workspace/userinfo/application/views/client/user/usercenter.html" */ ?>
<?php /*%%SmartyHeaderCode:76156746856e8ba80395d78-75080374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a837aaacb551df6d6dffa984746396f3a14f22' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/usercenter.html',
      1 => 1458092662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76156746856e8ba80395d78-75080374',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<h1>Welcome!!!!!</h1>
<a class="btn btn-primary" role="button" href="<?php echo base_url('client/user/sign_out');?>
">退 出</a>
<?php if ($_smarty_tpl->getVariable('message')->value=="error_sign_out"){?>   
    <div id="message" style="display: none;">请先退出</div>
    <?php }elseif($_smarty_tpl->getVariable('message')->value=="error_sign_in"){?>   
    <div id="message" style="display: none;">请先登陆</div>
    <?php }else{ ?>   
    <div id="message" style="display: none;"></div> 
<?php }?>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>