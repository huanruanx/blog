<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-19 19:07:19
 * @LastEditTime : 2022-11-19 20:22:40
 * @FilePath     : \blog\app\index\controller\Message.php
 */

declare(strict_types=1);

namespace app\index\controller;

use app\index\model\Message as ModelMessage;
use app\index\model\System;
use think\facade\View;
use think\Request;

class Message
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $com = ModelMessage::select();
        $system = System::find(1);
        $data = [
            'message'       =>      $com,
            'system'        =>      $system
        ];
        return View::fetch('', ['data' => $data]);
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
