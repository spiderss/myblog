<?php

namespace app\admin\controller;

use app\common\controller\AdminBase ;
class SystemSetting extends AdminBase
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($config=[])
    {
       return $this->fetch();
    }


}
