
ThinkPHP 8.0 Demo
===============

## 特性

* 基于PHP`8.0+`重构
* 升级`PSR`依赖
* 依赖`think-orm`3.0版本
* `6.0`/`6.1`无缝升级
* 默认集成了Sentry监控系统
* 默认开启了多应用模式
* 支持vscode xdebug调试
* 更多特性等......


> ThinkPHP8.0的运行环境要求PHP8.0.0+

## 文档

[完全开发手册](https://doc.thinkphp.cn)


## 启动运行

1. 克隆项目
~~~
git clone https://github.com/tekintian/tp8-demo.git
~~~

2. 安装依赖
~~~
cd tp8-demo
composer install
~~~

3. 配置数据库
将.example.env文件复制为.env文件，配置数据库信息和sentry信息

4. 启动服务
在vscode中运行 RUN AND DEBUG (Launch built-in server and debug)即可 
或者 命令行运行
~~~
php think run
~~~

然后就可以在浏览器中访问

~~~
http://localhost:8000
~~~

如果需要更新框架使用
~~~
composer update topthink/framework
~~~

## 命名规范

`ThinkPHP`遵循PSR-2命名规范和PSR-4自动加载规范。


