<?php
namespace app\index\controller;
use app\common\model\AdminUser;
use app\common\controller\HomeBase;
class Index extends HomeBase
{
	private $db;
	public function __construct()
	{
	    parent::__construct();
		$this->db=new AdminUser;
	}
    public function index()
    {
      $seo=array("title"=>"网站首页信心");
      return $this->fetch("index",['seo'=>$seo]);
    }

    public function hello()
    {

          $oauth=new \oAuth\OAuth();
          $oauth->test();

    }

    public function about()
    {

        $seo=array("title"=>"关于我们单页");
        return $this->fetch("about",['seo'=>$seo]);
    }

    public function category($cate=1){
	    $seo=array("title"=>"商品列表页面");
        $goodList=array(
            "1"=>array(
                'catname'=>"新年特惠",
                'list'=>array(
                array("id"=>138,'title'=>"无敌小陀螺与偶",'descript'=>"hello","image"=>"http://img5.imgtn.bdimg.com/it/u=161888459,1712714238&fm=27&gp=0.jpg"),
                array("id"=>142,'title'=>"天严无敌的",'descript'=>"hello","image"=>"http://www.taopic.com/uploads/allimg/140421/318743-140421213T910.jpg"),
                array("id"=>150,'title'=>"凤梨有点太难",'descript'=>"hello","image"=>"http://pic35.nipic.com/20131121/2531170_145358633000_2.jpg"),
                array("id"=>118,'title'=>"补肾芦花鸡",'descript'=>"hello","image"=>"http://img1.imgtn.bdimg.com/it/u=2228783489,1434265682&fm=27&gp=0.jpg"),)
            ),   "2"=>array(
                'catname'=>"特产美食",
                'list'=>array(
                array("id"=>180,'title'=>"分类2的商品1",'descript'=>"hello","image"=>"http://img1.imgtn.bdimg.com/it/u=2228783489,1434265682&fm=27&gp=0.jpg"),
                array("id"=>181,'title'=>"分类2的商品2",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/305266/ZPD127-6957286200591-110_1.jpg"),
                array("id"=>182,'title'=>"分类2的商品3",'descript'=>"hello","image"=>"http://img009.hc360.cn/hb/MTQ3MDQzOTEzNjg5NS03OTkyNzQxODA=.jpg"),
                array("id"=>183,'title'=>"分类2的商品4",'descript'=>"hello","image"=>"http://img010.hc360.cn/k1/M0F/96/51/wKhQwFhU716EYNp7AAAAAG0XSw8315.JPG"),)
            ),"3"=>array(
                'catname'=>"新品来袭",
                'list'=>array(
                array("id"=>190,'title'=>"分类3的商品3",'descript'=>"hello","image"=>"http://imgsrc.baidu.com/image/c0%3Dshijue1%2C0%2C0%2C294%2C40/sign=7f642c5f3cd12f2eda08a62327abbf17/b8389b504fc2d56281bd9d65ed1190ef77c66c84.jpg"),
                array("id"=>191,'title'=>"分类3的商品2",'descript'=>"hello","image"=>"http://imgsrc.baidu.com/imgad/pic/item/a686c9177f3e6709547566f831c79f3df8dc55bb.jpg"),
                array("id"=>192,'title'=>"分类3的商品3",'descript'=>"hello","image"=>"http://img14.360buyimg.com/n12/jfs/t298/184/444026135/484797/3366743/54116596Nf1de7844.jpg"),
                array("id"=>193,'title'=>"分类3的商品4",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/382241/IPO-944341-110_1.jpg"),)
            ),
            "4"=>array(
                'catname'=>"珍诚之宝",
                'list'=>array(
                array("id"=>200,'title'=>"分类4的商品3",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/382241/IPO-944341-110_1.jpg"),
                array("id"=>201,'title'=>"分类4的商品2",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/382241/IPO-944341-110_1.jpg"),
                array("id"=>202,'title'=>"分类4的商品3",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/382241/IPO-944341-110_1.jpg"),
                array("id"=>203,'title'=>"分类4的商品4",'descript'=>"hello","image"=>"http://a.vpimg4.com/upload/merchandise/382241/IPO-944341-110_1.jpg"),)
            ),
        );
        $this->assign("catname",$goodList[$cate]['catname']);
        return $this->fetch("category",['seo'=>$seo,'goodlist'=>$goodList[$cate]['list']]);
    }

    public function good($id=0){
        $seo=array("title"=>"商品详情页");
        $goodList=array(
            array("id"=>138,'title'=>"无敌小陀螺与偶",'descript'=>"hello"),
            array("id"=>142,'title'=>"天严无敌的",'descript'=>"hello"),
            array("id"=>150,'title'=>"凤梨有点太难",'descript'=>"hello"),
            array("id"=>118,'title'=>"补肾芦花鸡",'descript'=>"hello"),
        );
        $goodInfo=array();
        foreach ($goodList as $k=>$v){
            if($v['id']==$id){
                $goodInfo=$v;
            }
        }
        return $this->fetch("good",['seo'=>$seo,'goodinfo'=>$goodInfo]);
    }

}
