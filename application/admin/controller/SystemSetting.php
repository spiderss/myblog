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
        $somevar=15;
        function addit () {
            GLOBAL $somevar;
            $somevar++ ;
            echo "somevar is $somevar";
        }
        addit ();

    }

    private function hannuo($n,$origin,$big,$small)
    {
//        if($n==1)
//        {
//            echo "$origin->$small <br/>";
//            return "";
//        }
//        $this->hannuo($n-1,$origin,$small,$big);
//        echo "$origin->$small <br/>";
//        $this->hannuo($n-1,$big,$origin,$small);


    }
}
