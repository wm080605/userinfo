<?php
/**
* 
*/
class Test extends MY_Controller
{
    
    public function php()
    {
        // $test='CI + smarty  配置成功';
        // $this->assign('title',"第一个程序");
        // $this->assign('test',$test);
        $bookinfo=array("object"=>"book","type"=>"computer","name"=>"PHP软件开发","publishing"=>"中艺出版社");
        $this->assign('title',"使用foreach循环输出数组内容");
        $this->assign('bookinfo',$bookinfo);

        $this->display('test.html');
    }
}