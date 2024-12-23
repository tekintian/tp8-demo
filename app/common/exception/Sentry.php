<?php
namespace app\common\exception;

use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use think\Response;
use Throwable;
use Sentry9\Client;

class Sentry extends Handle
{
    /**
     * @var Client
     */
    private $sentry;
    /**
     * 获取Sentry异常处理实例
     *
     * @return Client
     */
    public function getSentry(): Client {
        if (is_null($this->sentry)) {
            // 初始化Sentry
            $dsn = config('app.sentry_dsn');
            $this->sentry = \Sentry9\Sentry::listen($dsn);
        }
        return $this->sentry;
    }
    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param Throwable $exception
     * @return void
     */
    public function render($request, Throwable $e): Response
    {
        // 获取Sentry异常处理实例
        $sentry = $this->getSentry();
         // 记录异常信息  放在这里就是记录所有的异常信息, 如果放在 if里面的话就可以只记录指定类型的异常信息
        $sentry->captureException($e);

        // 参数验证错误
        if ($e instanceof ValidateException) {
             // 记录错误日志
            return json($e->getError(), 422);
        }

        // 请求异常
        if ($e instanceof HttpException && $request->isAjax()) {
           

            return response($e->getMessage(), $e->getStatusCode());
        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }

}