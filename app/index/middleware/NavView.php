<?php
declare (strict_types=1);

namespace app\index\middleware;

use think\facade\Config;

class NavView
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        if (isMobile()) {   //设置手机视图
            Config::set(['view_path' => app_path() . '/view_m/'],'view');
        }
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
