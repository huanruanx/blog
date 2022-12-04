<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-12-02 11:27:35
 * @LastEditTime : 2022-12-04 12:55:05
 * @FilePath     : \blog\app\api\controller\Index.php
 */

declare(strict_types=1);

namespace app\api\controller;

use app\api\model\Area;
use app\api\model\Article;
use app\api\model\Banner;
use app\api\model\Comment;
use app\api\model\Links;
use app\api\model\System;
use app\api\model\Visit;
use think\facade\View;

/**
 * 博客接口，通过接口可以实现前端全部功能！！！如需关闭可通过后台进行关闭，
 * FQA：
 *      问：为什么会有Api接口？
 *      答：根据不同的需求，有了Api接口当需要与其他软件对接时为工作提高更大的开发效率
 */

class Index
{
    public function index($code = '')
    {
        $stop = System::find(1);
        if ($stop['api_status'] == 'false') {
            return showmsg(201, 'Api接口已在后台被管理员关闭，如需使用可前往后台【系统管理->网站设置】中开启或关闭');
        }
        $input = input();
        if (empty($code)) return view::fetch();
        switch ($code) {
            case  'get_article':
                return $this->get_article();
                break;
            case  'get_area':
                return $this->get_area();
                break;
            case  'get_comment':
                return $this->get_comment($input);
                break;
            case  'get_links':
                return $this->get_link();
                break;
            case  'get_system':
                return $this->get_system();
                break;
            case  'send_com':
                return $this->send_comm();
                break;
            case  'read_art':
                return $this->read_art();
                break;
            case  'banner':
                return $this->banner();
                break;
            default:
                return View::fetch();
                break;
        }
    }

    /**
     * 获取列表
     */
    function get_article()
    {
        $visit = new Visit();
        $visit->save(['ip' => getip()]);
        $arti = Article::order('id desc')->select();
        $data = [
            'article'       =>      $arti
        ];
        return showmsg(200, '获取成功', $data);
    }

    /**
     * 获取分类列表
     */
    function get_area()
    {
        $area = Area::select();
        $data = [
            'area'      =>      $area
        ];
        return showmsg(200, '获取成功', $data);
    }

    /**
     * 获取评论列表
     */
    function get_comment($input)
    {
        $art = Article::find($input['article_id']);
        if (empty($art)) return showmsg(201, '文章不存在');
        $com = Comment::where('article_id', $input['article_id'])->select();
        $data = [
            'comment'       =>      $com
        ];
        return showmsg(200, '', $data);
    }

    /**
     * 获取友链
     */
    function get_link()
    {
        $link = Links::select();
        $data = [
            'links' =>  $link
        ];
        return showmsg(200, '', $data);
    }

    /**
     * 获取系统配置
     */
    function get_system()
    {
        $sys = System::where('id', 1)->select();
        $data = [
            'system'    =>  $sys
        ];
        return showmsg(200, '', $data);
    }

    /**
     * 发送评论
     */
    function send_comm()
    {
        $input = input();
        $art = Article::find($input['id']);
        if (empty($art)) return showmsg(201, '文章不存在');
        $data = [
            'article_id'        =>      $input['article_id'],
            'name'              =>      $input['name'],
            'mail'              =>      $input['mail'],
            'content'           =>      $input['content'],
            'ip'                =>      getip()
        ];
        $save = new Comment;
        $save->save($data);
        if (!$save) {
            return showmsg(201);
        } else {
            return showmsg(200);
        }
    }

    /**
     * 访问某一篇文章
     */
    function read_art()
    {
        $input = input();
        $art = Article::find($input['id']);
        if (empty($art)) {
            return showmsg(201);
        } else {
            return showmsg(200, '', $art);
        }
    }

    /**
     * 获取横幅
     */
    function banner()
    {
        $info = Banner::select();
        return showmsg(200, '', ['data' => $info]);
    }
}
