$(document).ready(function(){
       var provice = {
          "1": {
            "provice_id": "1",
            "name": "北京市"
          },
          "2": {
            "provice_id": "2",
            "name": "天津市"
          }
        }
        var city = {
          "1": {
            "provice_id": "1",
            "city_id": 100,
            "name": "东城区"
          },
          "2": {
            "provice_id": "1",
            "city_id": 101,
            "name": "崇文区"
          },
          "3": {
            "provice_id": "1",
            "city_id": 102,
            "name": "长宁区"
          },
          "4": {
            "provice_id": "2",
            "city_id": 102,
            "name": "丰台区"
          },
          "5": {
            "provice_id": "2",
            "city_id": 103,
            "name": "房山区"
          }
        }
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
