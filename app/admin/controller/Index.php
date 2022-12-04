<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:48:17
 * @LastEditTime : 2022-12-04 16:18:16
 * @FilePath     : \blog\app\admin\controller\Index.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Article;
use app\admin\model\Comment;
use app\admin\model\Visit;
use think\facade\View;

class Index
{
    public function index()
    {
        $article = Article::count();
        $del_article = Article::onlyTrashed()->count();
        $comment = Comment::count();
        $visits = Article::sum('visit');
        $visit_total = [];
        $data_time = [];
        $msg_total = [];
        for ($i = 0; $i <= 7; $i++) {
            $time = $i * 86400;
            $day = time() - $time;
            $start = date("Y-m-d", $day) . ' 00:00:00';
            $end = date("Y-m-d", $day) . '23:59:59';
            $visit = Visit::whereBetweenTime('create_time', $start, $end)->count();
            array_push($visit_total, $visit);
            $days = date("d", time() - $time);
            array_push($data_time, intval($days));
        }
        for ($i = 0; $i <= 7; $i++) {
            $time = $i * 86400;
            $day = time() - $time;
            $start = date("Y-m-d", $day) . ' 00:00:00';
            $end = date("Y-m-d", $day) . '23:59:59';
            $visit = Comment::whereBetweenTime('create_time', $start, $end)->count();
            array_push($msg_total, $visit);
        }
        $lately = Comment::limit(4)->order('id', 'desc')->select()->toArray();
        $data = [
            'article'       =>      $article,
            'comment'       =>      $comment,
            'visit'         =>      $visits,
            'del_article'   =>      $del_article,
            'visit_total'   =>      json_encode($visit_total),
            'data_time'     =>      json_encode($data_time),
            'msg_total'     =>      json_encode($msg_total),
            'dynamic'       =>      $lately,
        ];
        return View::fetch('', ['data' => $data]);
    }

    public function update()
    {
        //
    }
}
