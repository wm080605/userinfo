<?php /* Smarty version Smarty-3.0.6, created on 2016-03-16 15:34:49
         compiled from "/var/workspace/userinfo/application/views/client/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:20107672556e90c99706ae5-97710091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88d2bd665a1a1cb1ef07758d7d7f85968225aa89' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/register.html',
      1 => 1458113680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20107672556e90c99706ae5-97710091',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!--     <script type="text/javascript " src="/resources/js/register_check.js"></script> -->
    <script type="text/javascript " src="/resources/js/provice.js"></script>
<?php echo form_open_multipart('client/user/register_submit','id="register"');?>

    <div class="form-group">   
        <label >Name</label>
        <input class="form-control" type="text"  name="username" value="<?php echo set_value('username');?>
"/>
        <?php echo form_error('username','<label class="error">','</lable>');?>

    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" id="password" value="<?php echo set_value('password');?>
"/>
        <?php echo form_error('password','<label class="error">','</lable>');?>

    </div> 
    <div class="form-group">
        <label>Passconf</label>
        <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf');?>
"/>
        <?php echo form_error('passconf','<label class="error">','</lable>');?>

    </div>
    <div class="form-group">
        <label >Email</label>
        <input class="form-control" type="text" name="email" value="<?php echo set_value('email');?>
">
        <?php echo form_error('email','<label class="error">','</lable>');?>

    </div>
    <div class="form-group">
        <label >Phone</label>
        <input class="form-control" type="text" name="phone" value="<?php echo set_value('phone');?>
">
        <?php echo form_error('phone','<label class="error">','</lable>');?>

    </div>
    <div class="form-group">
        <label >Sex</label>
        <input type="radio" name="sex" value="0"<?php echo set_radio('sex','0');?>
/>女
        <input type="radio" name="sex" value="1"<?php echo set_radio('sex','1');?>
/>男
        <?php echo form_error('sex','<label class="error">','</lable>');?>

    </div>    
    <div class="form-group">
        <label >Address</label>
        <select class="form-control" id="loc_province" name="provice">
            <option value="0">请选择</option>
        </select>
        <select class="form-control" id="loc_city" name="city"></select>
        <?php echo form_error('city','<label class="error">','</lable>');?>

    </div>
<!--     <div class="form-group"  >
        <label>Head Portrait</label>
        <input type="file" name="userfile" size="20"/>
    </div>   -->  
    <input type="submit" value="submit" class="btn  btn-primary"/>
<?php echo form_close();?>

<?php if (isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="email_exist"){?>
    <div id="message" style="display: none;">邮箱已经使用</div>
<?php }elseif(isset($_smarty_tpl->getVariable('message',null,true,false)->value)&&$_smarty_tpl->getVariable('message')->value=="error_send_fail"){?>
    <div id="message" style="display: none;">邮件发送失败</div>
<?php }else{ ?>   
    <div id="message" style="display: none;"></div>
<?php }?>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>