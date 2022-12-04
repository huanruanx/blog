<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 09:08:28
 * @LastEditTime : 2022-11-18 11:39:39
 * @FilePath     : \blog\app\admin\controller\Comment.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Comment as ModelComment;
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
        return View::fetch();
    }

    /**
     * 显示列表
     * 
     * @return \think\response
     */
    public function dispaly()
    {
        $total      = ModelComment::count();
        $rows       = ModelComment::select()->toArray();
        $data = [
            'rows'  =>  $rows,
            'total' =>  $total
        ];
        return json($data);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view::fetch();
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
        $res = ModelComment::find($id);
        $res->delete();
        if (!$res) {
            return showmsg(201);
        }else{
            return showmsg();
        }
    }
}
