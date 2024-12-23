<?php
namespace app\index\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        $ss = sprintf('<h2><a href="%s" target="_blank">Sentry Demo</a></h2>', url('index/index/demoSentry'));
        return '<style>*{ padding: 0; margin: 0; }</style><h1>Hello world!</h1>'.$ss;
    }
    /**
     * http://0.0.0.0:8000/index/index/hello
     * @param mixed $name
     * @return string
     */
    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
    /**
     * 
     * Sentry demo
     * Division by zero  
     * 获取当前方法的访问URL: url('index/index/demoSentry')
     * 获取的URL类似于: http://localhost:8000/index/index/demoSentry.html
     *
     * @return void
     */
    public function demoSentry()
    {
        // 触发异常 这里的异常会被sentry捕获 并发送到sentry 进行记录
        $a = 1/0;
        return '<style>*{ padding: 0; margin: 0; }</style><h1>Hello Sentry!</h1>';
    }
}
