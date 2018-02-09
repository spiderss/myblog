<?php
/**
 * Created by PhpStorm.
 * User: LLZG
 * Date: 2018/1/11
 * Time: 10:01
 */

namespace app\common\model;
use think\Model;

class Menu extends Model
{
  protected $table="ecs_ecsmart_menu";
   function getMenu()
   {
       return $this->select();
   }
}