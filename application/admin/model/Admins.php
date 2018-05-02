<?php
namespace app\admin\model;
use think\Model;
class Admins extends Model
{


    public function checkLogin($username,$password){
        session("adminName",$username);
        return true;
    }


    public function updateInfo($data)
    {
          if($this->allowField(true)->save($data, ['id' => $data['id']]))          {
              return true;
          }else
          {
              return false;
          }
    }

    public function setPasswordAttr($value)
    {
        return sys_auth($value);
    }
} 