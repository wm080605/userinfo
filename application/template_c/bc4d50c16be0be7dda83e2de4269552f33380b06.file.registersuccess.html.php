<?php /* Smarty version Smarty-3.0.6, created on 2016-03-10 14:00:28
         compiled from "/var/workspace/userinfo/application/views/client/user/registersuccess.html" */ ?>
<?php /*%%SmartyHeaderCode:79260767856e10d7c3b3584-51143804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc4d50c16be0be7dda83e2de4269552f33380b06' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/registersuccess.html',
      1 => 1457587643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79260767856e10d7c3b3584-51143804',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <h1>注册成功!!!!<h1><br>
    <?php if (isset($_smarty_tpl->getVariable('message',null,true,false)->value)){?>
        <div id="message" style="display: none;"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</div>
    <?php }else{ ?>   
        <div id="message" style="display: none;"></div>
    <?php }?>
    <a class="btn btn-primary" role="button" href="http://localhost/index.php/client/user">返 回</a> 
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>