<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('/', 'index/index/index');
Route::get('/about', 'index/index/about');
Route::get('/category/:cate', 'index/index/category');
Route::get('/good/:cate/:id', 'index/index/good');

Route::get('wxpay.php', 'index/hello');
Route::get('user', 'member/index/index');
Route::get('hello/:name', function (Response $response, $name) {
    return $response
        ->data('Hello,' . $name)
        ->code(200)
        ->contentType('text/plain');
});
return [

];
