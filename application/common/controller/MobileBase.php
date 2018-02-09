<?php
namespace app\common\controller;
use think\facade\Env;
use app\common\model\Menu;
class MobileBase extends  \think\Controller
{
   	  public  function __construct()
   	  {

   	  }

      function getNavs()
      {
          return "手机版到岗";
      }

      public function getMenu()
      {
          $menu= new Menu();
          return $menu->getMenu();
      }

}