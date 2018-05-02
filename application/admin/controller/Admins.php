<?php
/**
 * Created by PhpStorm.
 * User: zyl
 * Date: 2018/4/18
 * Time: 11:26
 */

namespace app\admin\controller;
use app\common\controller\AdminBase;

use app\admin\validate\Admins as AdminsValidate;

use app\admin\model\Admins as AdminModel;

class Admins extends AdminBase
{
    public function index()
    {
        $list = \think\Db::name('admins')->paginate(2)->each(function($item, $key){
               $item['name']="test".sprintf("00%d",($key+1));
               $item['email']="test".sprintf("00%d@test.com",($key+1));
               $item['addtime']=date("Y-m-d H:i:s",time());
               $item['lastlogintime']=time();
               return $item;
        });
        $this->assign("lists",$list);
        return $this->fetch();
    }

    /**
     * 添加管理员界面
     * @method GET
     * @return ''
    */

    public function create()
    {
        return $this->fetch();
    }

    public function edit($id)
    {
        $db=new AdminModel();
        $info=$db->find($id);
        $this->assign("info",$info);
         return $this->fetch('',['id'=>$id]);
    }

    /**
     * 新增用户
     */
    public function save()
    {
       $params=$this->request->param();
       $params['password']=sys_auth($params['password']);
       $db=new AdminModel();
       if($db->allowField(true)->save($params))
       {
          return $this->success("添加成功");
       }else
       {
           return $this->error("添加成功");
       }
    }

    public function update()
    {
        $data=$this->request->param();
        $validate = new AdminsValidate;
        if (!$validate->scene('edit')->check($data)) {
            $this->error($validate->getError());
        }
        $db=new AdminModel();
        if($db->updateInfo($data))
        {
            $this->success("更新成功");
        }else{
            $this->success("更新失败");
        }

    }

    /*删除*/
    public function delete()
    {
         $ids=$this->request->param("id");
        $db=new AdminModel();
        if(is_array($ids))
        {
           foreach ($ids as $id)
           {
               $db::destroy($id);
           }
        }else
        {
            $db::destroy($ids);
        }

        $this->success("删除成功");

    }

    /**
     * 验证用户名是否重复
     * 20180502
     * @return bool
     */
    public function checkUnique()
    {
        $field=$this->request->param("field");//获取要验证的字段
        $fieldValue=$this->request->param($field);
        $infos=\think\Db::name("admins")->where([$field=>$fieldValue])->find();
        if($infos){
           return json(['valid'=>false]);
        }else{
            return json(['valid'=>true]);
        }
    }

    /**
     * 管理员退出
     */
    public function logout()
    {
        session("adminName",null);
    }
}