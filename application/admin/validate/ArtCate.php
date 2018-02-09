<?php
namespace app\admin\validate;
use think\Validate;
/**
 *
*/
class ArtCate extends Validate
{
    protected $rule=[
        'cate_name'=>'require|max:80',
    ];

    protected $message=[
        'cate_name.require'=>"分类名称不能为空",
        'cate_name.max'=>'分类名称不能超过80个字符'
    ];
}