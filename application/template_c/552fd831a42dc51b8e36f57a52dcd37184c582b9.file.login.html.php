<?php /* Smarty version Smarty-3.0.6, created on 2016-03-02 11:46:37
         compiled from "/var/workspace/userinfo/application/views/client/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:167917502956d6621d72a2d7-46211529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '552fd831a42dc51b8e36f57a52dcd37184c582b9' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/login.html',
      1 => 1456890394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167917502956d6621d72a2d7-46211529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<<?php ?>?php echo }form_open('/client/user/login','class="form-inline"');?<?php ?>>
    <div class="form-group">
        <label class="sr-only">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email"/>
    </div>
    <div class="form-group">
        <label class="sr-only">Password</label>
        <input type="password" class="form-control" name="password"placeholder="Password"/>
    </div>
    <div class="form-group">    
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary" value="登陆"/>
            <a class="btn btn-primary" role="button" href="<<?php ?>?php echo site_url('user/register')?<?php ?>>">注册</a>
        </div>
    </div>
</form>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>