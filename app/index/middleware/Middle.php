<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-25 07:26:26
 * @LastEditTime : 2022-12-01 19:04:13
 * @FilePath     : \blog\app\index\middleware\Middle.php
 */
declare (strict_types = 1);

namespace app\index\middleware;

use app\index\model\Area;
use app\index\model\System;
use think\facade\View;

/**
 * 公共部分写到了中间件中，该文件为前置中间件
 */

class Middle
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
        $system = System::find(1);
        $area = Area::select();
        $data = [
            'system'    =>      $system,
            'area'      =>      $area,
        ];
        View::assign(['middle'=>$data]);
        return $next($request);
    }
}
