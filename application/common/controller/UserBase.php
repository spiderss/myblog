<?php
/**
 * Created by PhpStorm.
 * User: LLZG
 * Date: 2018/1/12
 * Time: 11:27
 */

namespace app\common\controller;
use think\Controller;

class UserBase extends Controller
{
    protected $beforeActionList = [
        'checkLogin',
    ];
    public function checkLogin()
    {
        if(session("userId"))
        {
            return $this->error("please login first","member/login/index");
        }
    }
}