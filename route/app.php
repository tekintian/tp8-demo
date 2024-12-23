<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('tp', function () {
    return 'hello,ThinkPHP8!';
});
// 路由到类的方法
// 这种方式的路由可以支持执行任何类的方法，而不局限于执行控制器的操作方法。
// 路由地址的格式为（动态方法）：\完整类名@方法名
// 或者（静态方法）\完整类名::方法名
// 注意这里完整类名实际上就是ns的名字加上类名, 因为这里路由可以直接路由到任何的类
Route::get('hello/:name','\app\index\controller\Index@hello');

// 路由到模板文件 这里是多应用模式下,必须指定:  应用名@控制器名/方法名
Route::view('hello2/:name', 'index@index/hello');

// 注意这里因为是多应用模式,所以必须指定完整的类名
Route::resource('pitfall', '\app\index\controller\Pitfall');


