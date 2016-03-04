<?php /* Smarty version Smarty-3.0.6, created on 2016-03-04 13:06:54
         compiled from "/var/workspace/userinfo/application/views/client/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:172791226056d917ee16eb66-35420648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '552fd831a42dc51b8e36f57a52dcd37184c582b9' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/login.html',
      1 => 1457068003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172791226056d917ee16eb66-35420648',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open('/client/user/login','class="form-horizontal"');?>

<!-- <form class="form-horizontal" action="user/login" method="post"> -->
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">登 陆</button>
            <a class="btn btn-primary" role="button" href="user/register    ">注 册</a>   
        </div>
    </div>
<?php echo form_close();?>

<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>