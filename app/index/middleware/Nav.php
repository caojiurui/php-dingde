<?php
declare (strict_types = 1);

namespace app\index\middleware;

class Nav
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }

    /**
     * 结束调度
     * @param \think\Response $response
     */
    public function end(\think\Response $response)
    {
    }
}
