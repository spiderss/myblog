<?php
/**
 * Admins.php
 * 文件描述
 * Date: 2018/5/2 15:43
 * create by  zyl
 */
namespace  app\admin\validate;
use think\Validate;
class Admins extends Validate
{
    protected $rule=[
        'password'=>"require",
        "repassword"=>"require"
    ];

    protected $scene=['edit'=>'password,repassword'];
}