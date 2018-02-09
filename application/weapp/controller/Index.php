<?php
   namespace app\weapp\controller;
   use app\common\controller\HomeBase;
   class Index extends HomeBase
   {
      public function index()
       {
            return ['module'=>'微信小程序入口' ,'des'=>'小程序模块'];
       }
   }