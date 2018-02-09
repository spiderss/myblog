<?php
/**
 * Created by PhpStorm.
 * User: LLZG
 * Date: 2018/1/10
 * Time: 16:29
 */

namespace app\mobile\controller;
use app\common\model\LoginModel;
use think\console\Input;

class Login extends \think\Controller
{
    public function index()
    {
        $msg=$this->request->param('msg');

        $ticket=$this->request->param('ticket');
        $login=new LoginModel();
        if($ticket)
        {
            $login->login();
        }else
        {
            return  redirect("https://cas.issll.com/cas/login?server=http://tp5git.com/login");
        }
    }


}