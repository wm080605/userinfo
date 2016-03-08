<?php /* Smarty version Smarty-3.0.6, created on 2016-03-08 14:57:41
         compiled from "/var/workspace/userinfo/application/views/client/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:43292985656de77e54a3a40-28267764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88d2bd665a1a1cb1ef07758d7d7f85968225aa89' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/register.html',
      1 => 1457420228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43292985656de77e54a3a40-28267764',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open_multipart('client/user/register_submit');?>

    <div class="form-group">   
        <label >Name</label>
        <input class="form-control" type="text"  name="username" value="<?php echo set_value('username');?>
"/>
        <?php echo form_error('username','<label class="error">','</lable>');?>

    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" value="<?php echo set_value('password');?>
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
        <input type="radio" name="sex" value="女"<?php echo set_radio('sex','0');?>
/>W
        <input type="radio" name="sex" value="男"<?php echo set_radio('sex','1');?>
/>M
        <?php echo form_error('sex','<label class="error">','</lable>');?>

    </div>    
    <div class="form-group">
        <label >Address</label>
        <select class="form-control" id="loc_province" name="provice">
            <option>请选择</option>
        </select>
        <select class="form-control" id="loc_city" name="city"></select>
        <?php echo form_error('city','<label class="error">','</lable>');?>

    </div>
    <div class="form-group"  >
        <label>Head Portrait</label>
        <input type="file" name="userfile" size="20"/>
    </div>    
    <input type="submit" value="submit" class="btn btn-lg btn-primary"/>
    <?php echo form_close();?>

    <div id="message" style="display: none;"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
       if( $('#message').html() != ''){
            alert($('#message').html());
       }
    });  
</script>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>