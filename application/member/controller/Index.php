<?php
   namespace app\member\controller;
   use  app\common\controller\UserBase;
   use think\Request;

   class Index extends UserBase
   {
      public function index(Request $request)
      {
         $userName=$request->controller();
        
      }

   }