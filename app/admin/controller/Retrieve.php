<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-26 19:51:09
 * @LastEditTime : 2022-11-26 20:23:51
 * @FilePath     : \blog\app\admin\controller\Retrieve.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Comment;
use think\facade\View;

class Retrieve
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return View::fetch();
    }

    /**
     * 显示评论页面
     * 
     * @return \think\Response
     */
    public function comment()
    {
        return view::fetch();
    }

    public function art_res()
    {
        $rows = Article::onlyTrashed()->select();
        $total = Article::onlyTrashed()->count();
        $data = [
            'rows'      =>      $rows,
            'total'     =>      $total
        ];
        return json($data);
    }

    public function com_res()
    {
        $rows = Comment::onlyTrashed()->select();
        $total = Comment::onlyTrashed()->count();
        $data = [
            'rows'      =>      $rows,
            'total'     =>      $total
        ];
        return json($data);
    }

    /**
     * 还原文章
     *
     * @return \think\Response
     */
    public function back($id)
    {
        $rticle = Article::onlyTrashed()->find($id);
        $rticle->restore();
        if (!$rticle) {
            return showmsg(201);
        }else{
            return showmsg(200);
        }
    }
    
    /**
     * 还原文章
     *
     * @return \think\Response
     */
    public function back_com($id)
    {
        $rticle = Comment::onlyTrashed()->find($id);
        $rticle->restore();
        if (!$rticle) {
            return showmsg(201);
        }else{
            return showmsg(200);
        }
    }

    public function art_del($id)
    {
        $art = Article::destroy($id,true);
        if (!$art) {
            return showmsg(201);
        }else{
            return showmsg(200);
        }
    }

    public function com_del($id)
    {
        // $com = Comment::find($id);
        $com = Comment::destroy($id,true);
        if (!$com) {
            return showmsg(201);
        }else{
            return showmsg(200);
        }
    }
}
