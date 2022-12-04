<?php

declare(strict_types=1);

namespace app\index\controller;

use app\index\model\Article;
use app\index\model\Comment;
use app\index\model\System;
use think\Request;
use think\facade\View;

class Dispaly
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {
        $art = Article::find($id);
        if (empty($art)) {
            return view::fetch('error');
        }
        $res = Article::find($id);
        $res->save([
            'visit'     =>      $art['visit'] + 1
        ]);
        $system = System::find(1);
        $comm = Comment::where('article_id', $id)->select();
        $comm_count = Comment::where('article_id', $id)->count();
        $data = [
            'article'       =>      $art,
            'comment'       =>      $comm,
            'id'            =>      $art['id'],
            'system'        =>      $system,
            'comment_count' =>      $comm_count
        ];
        return View::fetch('', ['data' => $data]);
    }

    public function comment(Request $request)
    {
        $input = input();
        $system = System::find(1);
        $data = [
            'article_id'        =>      $input['article_id'],
            'name'              =>      $input['name'],
            'mail'              =>      $input['mail'],
            'content'           =>      $input['content'],
            'ip'                =>      $request->ip(),
            'system'            =>      $system
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
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
