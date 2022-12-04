<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-19 10:59:48
 * @LastEditTime : 2022-11-27 13:52:35
 * @FilePath     : \blog\app\index\controller\Links.php
 */

declare(strict_types=1);

namespace app\index\controller;

use app\index\model\Links as ModelLinks;
use app\index\model\System;
use think\facade\View;
use think\Request;

class Links
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $link = ModelLinks::where('status', 'y')->order('id desc')->select();
        $system = System::find(1);
        $data = [
            'links'     =>      $link,
            'system'    =>      $system
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
        $system = System::find(1);
        $data = [
            'system'    =>      $system
        ];
        return view::fetch('', ['data' => $data]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        $input = input();
        $save = new ModelLinks;
        $data = [
            'name'          =>      $input['name'],
            'url'           =>      $input['url'],
            'briefly'       =>      $input['briefly'],
            'status'        =>      'n',
            'color'         =>      $input['color']
        ];
        $save->save($data);
        if (!$save) {
            return showmsg(201);
        } else {
            return showmsg(200);
        }
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
