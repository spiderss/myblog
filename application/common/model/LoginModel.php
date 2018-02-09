<?php
/**
 * Created by PhpStorm.
 * User: LLZG
 * Date: 2018/1/10
 * Time: 16:33
 */

namespace app\common\model;


class LoginModel
{
    private $validateServer='';
    function login()
    {

    }

    public function getTicket()
    {

        return  redirect("https://cas.issll.com/cas/login?server=http://tp5git.com/login");
    }
}