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
    <?php echo form_open('user/registercheck'); ?>
        <div class="form-group">   
            <label >Name</label>
            <input class="form-control" type="text"  name="username" value="<?php echo set_value('username'  );?>">
            <?php echo form_error('username','<label class="error">','</lable>');?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" value="<?php echo set_value('password');?>"></input>
            <?php echo form_error('password','<label class="error">','</lable>');?>
        </div> 
        <div class="form-group">
            <label>Passconf</label>
            <input class="form-control" type="password" name="passconf" value="<?php echo set_value('passconf');?>"></input>
            <?php echo form_error('passconf','<label class="error">','</lable>');?>
        </div>
        <div class="form-group">
            <label >Email</label>
            <input class="form-control" type="text" name="email" value="<?php echo set_value('email');?>">
            <?php echo form_error('email','<label class="error">','</lable>');?>
        </div>
        <div class="form-group">
            <label >Phone</label>
            <input class="form-control"type="text" name="phone" value="<?php echo set_value('phone');?>">
            <?php echo form_error('phone','<label class="error">','</lable>');?>
        </div>
        <div class="form-group">
            <label >Sex</label>
            <input type="radio" name="sex" value="0"<?php echo set_radio('sex','0');?>/>W
            <input type="radio" name="sex" value="1"<?php echo set_radio('sex','1');?>/>M
            <?php echo form_error('sex','<label class="error">','</lable>');?>
        </div>    
        <div class="form-group">
            <label >Address</label>
            <select class="form-control" id="loc_province" name="provice" value="<?php echo  set_select('provice'); ?>"></select>
            <select class="form-control" id="loc_city" name="city"></select>
            <select class="form-control" id="loc_town" name="town"></select>
 <!--            <?php echo form_error('address','<label class="error">','</lable>');?> -->
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                showLocation();
            });
        </script>
        <input type="submit" value="submit" class="btn btn-lg btn-primary"></input>
    </form>
    <?php echo form_open_multipart('user/do_upload');?>
        <input type="file" name="userfile" size="20" />
        <input type="submit" value="upload" />
    </form>
</body>
</html>