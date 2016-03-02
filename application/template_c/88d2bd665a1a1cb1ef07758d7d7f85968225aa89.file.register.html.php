<?php /* Smarty version Smarty-3.0.6, created on 2016-03-02 14:41:41
         compiled from "/var/workspace/userinfo/application/views/client/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:210649381556d68b25d94d96-72852365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88d2bd665a1a1cb1ef07758d7d7f85968225aa89' => 
    array (
      0 => '/var/workspace/userinfo/application/views/client/user/register.html',
      1 => 1456884891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210649381556d68b25d94d96-72852365',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
    <title>注册页面</title>
    <script type="text/javascript" src="/resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="/resources/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/resources/location/area.js"></script>
    <script type="text/javascript" src="/resources/location/location.js"></script>
    <link rel="stylesheet" type="text/css" href="/resources/bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        input.error { 
            border: 1px solid red; 
        }
        label.error {
            padding-left: 8px;
            padding-bottom: 2px;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
    <<?php ?>?php echo form_open('user/registercheck'); ?<?php ?>>
        <div class="form-group">   
            <label >Name</label>
            <input class="form-control" type="text"  name="username" value="<<?php ?>?php echo set_value('username'  );?<?php ?>>">
            <<?php ?>?php echo form_error('username','<label class="error">','</lable>');?<?php ?>>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="<<?php ?>?php echo set_value('password');?<?php ?>>"></input>
            <<?php ?>?php echo form_error('password','<label class="error">','</lable>');?<?php ?>>
        </div> 
        <div class="form-group">
            <label>Passconf</label>
            <input class="form-control" type="password" name="passconf" value="<<?php ?>?php echo set_value('passconf');?<?php ?>>"></input>
            <<?php ?>?php echo form_error('passconf','<label class="error">','</lable>');?<?php ?>>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input class="form-control" type="text" name="email" value="<<?php ?>?php echo set_value('email');?<?php ?>>">
            <<?php ?>?php echo form_error('email','<label class="error">','</lable>');?<?php ?>>
        </div>
        <div class="form-group">
            <label >Phone</label>
            <input class="form-control"type="text" name="phone" value="<<?php ?>?php echo set_value('phone');?<?php ?>>">
            <<?php ?>?php echo form_error('phone','<label class="error">','</lable>');?<?php ?>>
        </div>
        <div class="form-group">
            <label >Sex</label>
            <input type="radio" name="sex" value="0"<<?php ?>?php echo set_radio('sex','0');?<?php ?>>/>W
            <input type="radio" name="sex" value="1"<<?php ?>?php echo set_radio('sex','1');?<?php ?>>/>M
            <<?php ?>?php echo form_error('sex','<label class="error">','</lable>');?<?php ?>>
        </div>    
        <div class="form-group">
            <label >Address</label>
            <select class="form-control" id="loc_province" name="provice" value="<<?php ?>?php echo  set_select('provice'); ?<?php ?>>"></select>
            <select class="form-control" id="loc_city" name="city"></select>
            <select class="form-control" id="loc_town" name="town"></select>
 <!--            <<?php ?>?php echo form_error('address','<label class="error">','</lable>');?<?php ?>> -->
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                showLocation();
            });
        </script>
        <input type="submit" value="submit" class="btn btn-lg btn-primary"></input>
    </form>
    <<?php ?>?php echo form_open_multipart('user/do_upload');?<?php ?>>
        <input type="file" name="userfile" size="20" />
        <input type="submit" value="upload" />
    </form>
</body>
</html>