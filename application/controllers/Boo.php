<?php 
  
class Boo extends MY_Controller { 
    public function index()   
    {

        $test='CI + smarty  配置成功';
        $this->assign('title',"第一个smarty程序");
        $this->assign('test',$test);

        $arr=array("computerbook","name"=>"php从入门到精通","unit_price"=>array("price"=>"￥65.00","unit"=>"本"));
        $this->assign("arr",$arr);                        //将数组传递给模板

        $books=array (100,101,102,103);
        $this->assign("books",$books); 

        // $this->assign('no',array(array('phone' => '1' , 'email' => '2'),
        //                                      array('phone'=>'123' , 'email' =>''));

        $this->display('boo.html');

        // $str1="这是一个实例";
        // $str2="\n图书->   计算机类->PHP\n书名：《PHP软件开发》";
        // $str3="\n价格：￥59/本";
        // $this->assign("title","使用变量修饰方法");
        // $this->assign("str",$str1.$str2.$str3);  
    }   
} 