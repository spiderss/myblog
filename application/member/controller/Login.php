<?php
/**
 * Created by PhpStorm.
 * User: LLZG
 * Date: 2018/1/12
 * Time: 11:18
 */

namespace app\member\controller;


class Login
{
   public function index($random='',$num='')
   {
       echo "login page".$random."---".$num;
   }
}