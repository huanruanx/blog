<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-19 17:23:04
 * @LastEditTime : 2022-11-19 19:03:37
 * @FilePath     : \blog\app\index\controller\Comment.php
 */
declare (strict_types = 1);

namespace app\index\controller;

use app\index\model\Comment as ModelComment;
use think\facade\View;
use think\Request;

class Comment
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $com = ModelComment::select();
        $data = [
        'comment'       =>      $com
        ];
        return View::fetch('',['data'=>$data]);
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
