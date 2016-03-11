$(document).ready(function(){
    $("#register").validate({
        //errorClass:"error",
        rules :{
            username : "required",
            email : {
                required : true,
                email : true
            },
            password : {
                required : true,
                minlength : 8
            },
            passconf : {
                required : true,
                equalTo: '#password'
            },
            phone : {
                required : true,
                minlength : 11
            },
            sex : "required",
            city : "required"
        },
        errorPlacement:function (error,element){
            if(element.is('input:radio') ||element.is('input:checkbox')){
                //console.log(element.attr('name'))
                error.appendTo(element.parent());
            }else{
                error.appendTo(element.parent());
            }
        }
    }); 
})
