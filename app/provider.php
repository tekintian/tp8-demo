<?php
use app\ExceptionHandle;
use app\Request;
use app\common\exception\Sentry;

// 容器Provider定义文件
return [
    'think\Request'          => Request::class,
    'think\exception\Handle' => ExceptionHandle::class,
     // 绑定自定义异常处理handle类 app\common\exception
    // 'think\exception\Handle'  => '\\app\\common\\exception\\Sentry',
    // use引入方式
    'think\exception\Handle'  => Sentry::class,
];
