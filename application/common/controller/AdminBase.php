<?php

namespace app\common\controller;

use think\Container;
use think\Controller;
use think\Request;
use think\Config;

class AdminBase extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign("v","0.1");
        if(!session("adminName")){
            $this->error("请先登录","login/index");
        }
    }

    public function getMenus()
    {

    }
}
