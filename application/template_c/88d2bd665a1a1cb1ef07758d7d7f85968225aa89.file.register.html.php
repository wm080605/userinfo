<?php /* Smarty version Smarty-3.0.6, created on 2016-03-04 14:46:17
         compiled from "/var/workspace/userinfo/application/views/client/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:196753376356d92f39337d97-48231320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88d2bd665a1a1cb1ef07758d7d7f85968225aa89' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/register.html',
      1 => 1457073973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196753376356d92f39337d97-48231320',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('client/share/_header.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php echo form_open_multipart('client/user/registercheck');?>

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
            <input type="file" name="userfile" size="20" value="<?php echo set_value('userfile');?>
" />
           <!--  <input type="button" value="upload"/> -->
        </div>    
        <input type="submit" value="submit" class="btn btn-lg btn-primary"/>
    <?php echo form_close();?>

    <script type="text/javascript">
        var provice = {
          "1": {
            "provice_id": "北京市",
            "name": "北京市"
          },
          "2": {
            "provice_id": "天津市",
            "name": "天津市"
          }
        }
        var city = {
          "1": {
            "provice_id": "北京市",
            "city_id": 100,
            "name": "东城区"
          },
          "2": {
            "provice_id": "北京市",
            "city_id": 101,
            "name": "崇文区"
          },
          "3": {
            "provice_id": "北京市",
            "city_id": 102,
            "name": "长宁区"
          },
          "4": {
            "provice_id": "天津市",
            "city_id": 102,
            "name": "丰台区"
          },
          "5": {
            "provice_id": "天津市",
            "city_id": 103,
            "name": "房山区"
          }
        }
        $(document).ready(function(){
            $.each(provice,function(n){
                    $("#loc_province").append("<option value="+provice[n]['provice_id'] +">" + provice[n]['name'] +"</option>")
                })
                $("#loc_province").change(function(){
                    $("#loc_city").html("");
                    $.each(city,function(n){
                        value = $("#loc_province").val();
                        if(value == city[n]['provice_id']){
                            $("#loc_city").append("<option >" + city[n]['name'] +"</option>")
                        }
                    })
                })
        })
    </script>
<?php $_template = new Smarty_Internal_Template('client/share/_footer.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>