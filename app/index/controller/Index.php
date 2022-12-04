<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:48:20
 * @LastEditTime : 2022-12-01 19:16:52
 * @FilePath     : \blog\app\index\controller\Index.php
 */

declare(strict_types=1);

namespace app\index\controller;

use app\index\model\Article;
use app\index\model\Banner;
use app\index\model\System;
use app\index\model\Visit;
use think\Request;
use think\facade\View;

class Index
{
    /**
     * blog index
     * 
     * @return object
     */
    public function index(Request $request,$area = null)
    {
        $visit = new Visit;
        $visit->save(['ip' => $request->ip()]);
        if (empty($area)) {
            $arti = Article::order('id desc')->paginate(10);
        }else{
            if (!is_numeric($area)) return showmsg(201,'参数有误');
            $arti = Article::where('area_id',$area)->order('id desc')->paginate(10);
        }
        $page = $arti->render();
        $banner = Banner::select();
        $hot = Article::order('visit desc')->limit(5)->select();
        $system = System::find(1);
        $data = [
            'article'       =>      $arti,
            'hot'           =>      $hot,
            'banner'        =>      $banner,
            'system'        =>      $system,
            'page'          =>      $page
        ];
        return view::fetch('',['data' => $data]);
    }
}
