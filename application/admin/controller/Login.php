<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admins as AdminUserModel;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return view();
    }
    /**
     * 登录验证操作
     *
     * @return \think\Response
     */
    public function login()
    {
         $username=$this->request->param("username");
         $password=$this->request->param('password');
         $isRemember=$this->request->param("remember");

         $adminModel=new AdminUserModel;
         if($adminModel->checkLogin($username,$password)){
              return $this->success("登录成功","admin/index/index");
         }else{
             return $this->error("登录成功","admin/index/index");
         }
    }

}
