$(document).ready(function(){
    $("#login").validate({
        //errorClass:"error",
        rules :{
            email : {
                required : true,
                email : true
            },
            password :{
                required : true,
                minlength : 8
            }
        },
        // message : {
        //     email : {
        //         required : "请输入邮箱",
        //         email : "请输入正确的邮箱格式"
        //     },
        //     password : {
        //         required : "请输入Password",
        //         minlength : "Password不能小于8个字符"
        //     }
        // },
    }); 
})
