<?php /* Smarty version Smarty-3.0.6, created on 2016-03-31 18:49:45
         compiled from "/var/workspace/userinfo/application/views/admin/user/user_info.html" */ ?>
<?php /*%%SmartyHeaderCode:97378164856fd00c93f3e69-89901905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314ae2fc10775d1ae6abb2cd7f5984f3fcb9d932' => 
    array (
      0 => '/var/workspace/userinfo/application/views/admin/user/user_info.html',
      1 => 1459421381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97378164856fd00c93f3e69-89901905',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('admin/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('admin/user/admin_center');?>
">管理员中心</a></li>
        <li class="active"><a href="<?php echo site_url('admin/user/users_list');?>
">用户列表</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="<?php echo site_url('client/user/sign_out');?>
">退 出</a></li>
      </ul>
      <center><p style="color: white; margin-top:14px">欢迎用户<?php echo $_smarty_tpl->getVariable('name')->value;?>
</p></center>
    </div>
  </div>
</nav>
<br>
<br>
<br>
<div>
    <?php echo form_open_multipart('admin/user/users_list','id="search"');?>

        姓名搜索<input type="text" name='name' value=""></input>
        邮箱搜索<input type="text" name="email" value=""></input>
        <input type="submit" value="搜索" class="btn btn-primary"/>
    <?php echo form_close();?>

    <table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>CreateTime</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['createtime'];?>
</td>
    </tr>
    <?php }} ?>
    </table>
    <?php if (empty(set_value('name'))&&empty(set_value('email'))){?>
    <div>
        <a href='<?php echo site_url('admin/user/users_list');?>
'>首页</a> |
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['pre_page'];?>
'>上一页 </a> | 
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['next_page'];?>
'>下一页 </a> | 
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['page_all_num'];?>
'>尾页</a>|
        共<?php echo $_smarty_tpl->getVariable('result')->value['page_all_num'];?>
页,当前是第<?php echo $_smarty_tpl->getVariable('result')->value['current_page'];?>
页
    </div>
    <?php }else{ ?>
    <div>
        <a href='<?php echo site_url('admin/user/users_list');?>
?selectdata=<?php echo serialize($_smarty_tpl->getVariable('result')->value['select_data']);?>
'>首页</a>|
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['pre_page'];?>
& selectdata=<?php echo serialize($_smarty_tpl->getVariable('result')->value['select_data']);?>
'>上一页 </a> | 
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['next_page'];?>
&selectdata=<?php echo serialize($_smarty_tpl->getVariable('result')->value['select_data']);?>
'>下一页 </a> | 
        <a href='<?php echo site_url('admin/user/users_list');?>
?page=<?php echo $_smarty_tpl->getVariable('result')->value['page_all_num'];?>
&selectdata=<?php echo serialize($_smarty_tpl->getVariable('result')->value['select_data']);?>
'>尾页</a>|
        共<?php echo $_smarty_tpl->getVariable('result')->value['page_all_num'];?>
页,当前是第<?php echo $_smarty_tpl->getVariable('result')->value['current_page'];?>
页
    </div>
    <?php }?>
</div>
<?php $_template = new Smarty_Internal_Template('admin/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>