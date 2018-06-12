<?php
/**
 * Created by PhpStorm.
 * User: zyl
 * Date: 2018/4/18
 * Time: 11:26
 */

namespace app\admin\controller;
use app\common\controller\AdminBase;


class AdminsGroup extends AdminBase
{
    private $table_name="admins_group";
    public function index()
    {
        $list = \think\Db::name($this->table_name)->paginate(2)->each(function($item, $key){
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

        $info=\think\Db::name($this->table_name)->where('id',$id)->find();
        $this->assign("info",$info);
         return $this->fetch('',['id'=>$id]);
    }

    /**
     * 新增用户
     */
    public function save()
    {
       $data=$this->request->param();
        if(!isset($data['status'])) $data['status']=2;
       if(\think\Db::name($this->table_name)->strict(false)->insert($data))
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
        if(!isset($data['status'])) $data['status']=2;
        if(\think\Db::name($this->table_name)->strict(false)->data($data)->update())
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
        $infos=\think\Db::name($this->table_name)->where([$field=>$fieldValue])->find();
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