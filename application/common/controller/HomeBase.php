<?php
namespace app\common\controller;
use think\facade\Env;
use think\Controller;
class HomeBase extends Controller
{
   	  public  function __construct()
   	  {
   	      parent::__construct();
        // echo Env::get('app_path')."<br/>";
         $this->assign("tongji",app()->config->get('tongjicode'));

         $this->assign("cat",$this->request->param('cate')?$this->request->param('cate'):"about");
   	  }


}