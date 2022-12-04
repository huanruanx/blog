<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-20 12:04:46
 * @LastEditTime : 2022-11-20 13:06:08
 * @FilePath     : \blog\app\admin\controller\Links.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Links as ModelLinks;
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
        return View::fetch();
    }

    public function display()
    {
        $total      = ModelLinks::count();
        $rows       = ModelLinks::select();
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
        $input = input();
        $save = ModelLinks::find($input['id']);
        $save->save(['status'=>'y']);
        if (!$save) {
            return showmsg(201);
        }else{
            return showmsg(200);
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
