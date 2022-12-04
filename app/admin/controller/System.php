<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 09:26:51
 * @LastEditTime : 2022-12-03 11:45:12
 * @FilePath     : \blog\app\admin\controller\System.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\System as ModelSystem;
use think\facade\View;
use think\Request;
use think\service\ModelService;

class System
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $sys = ModelSystem::find(1);
        $data = [
            'system'  =>  $sys
        ];
        return View::fetch('', ['data' => $data]);
    }

    public function pass()
    {
        $admin = Admin::find(1);
        $data = [
            'admin' => $admin
        ];
        return view::fetch('',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $res = ModelSystem::find(1);
        $key = key_code();
        $res->save([
            'key'   =>  $key
        ]);
        if (!$res) {
            return showmsg(201);
        } else {
            return showmsg(200, '', ['key' => $key]);
        }
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $input = input();
        switch ($input['banner']) {
            case '1':
                $ban = '';
                break;
            case '2':
                $ban = 'hidden="hidden"';
                break;
        }
        $data = [
            'webname'       =>      $input['webname'],
            'copyright'     =>      $input['copyright'],
            'banner_img'    =>      $ban,
            'weburl'        =>      $input['weburl'],
            'about'         =>      $input['about'],
            'api_status'    =>      $input['api_status']
        ];
        $save = ModelSystem::find(1);
        $save->save($data);
        if (!empty($save)) {
            return showmsg(200, '更新成功');
        } else {
            return showmsg(201, '更新失败');
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
    public function update()
    {
        $input = input();
        $old = Admin::where('id', 1)->find();
        if ($input['old_password'] != $old['password']) return showmsg(201, "原始密码不正确");
        if ($input['old_password'] == $input['confirm_password']) return showmsg(201, "不能与原密码一致");
        if ($input['new_password'] != $input['confirm_password']) return showmsg(201, "二次密码与一次密码不正确");
        if (empty($input['confirm_password'])) return showmsg(201, "密码不能为空");
        $data = [
            'username'     =>      $input['username'],
            'password'  =>      $input['new_password']
        ];
        $res = ModelSystem::where('id', 1)->update($data);
        if ($res) {
            return showmsg(200, "修改成功");
        } else {
            return showmsg(201, "修改失败");
        }
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
