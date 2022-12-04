<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-24 19:45:43
 * @LastEditTime : 2022-11-24 20:20:39
 * @FilePath     : \blog\app\admin\controller\Area.php
 */
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Area as ModelArea;
use think\facade\View;
use think\Request;

class Area
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
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $rows = ModelArea::order('id desc')->select();
        $total = ModelArea::count();
        $data = [
            'rows'  =>  $rows,
            'total' =>  $total
        ];
        return json($data);
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
        if (empty($input['content'])) return showmsg(201,'内容为空');
        $area = new ModelArea();
        $area->save([
            'name'      =>      $input['content'],
            'outline'   =>      $input['outline']
        ]);
        if (!$area) {
            return showmsg(201);
        }else{
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
        $info = ModelArea::find($id);
        return showmsg(200,'',$info);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        
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
        $area = ModelArea::find($input['id']);
        $area->save([
            'name'  =>  $input['name']
        ]);
        if (!$area) {
            return showmsg(201);
        }else{
            return showmsg(200);
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
        $area = ModelArea::find($id);
        $area->delete();
        if (!$area) {
            return showmsg(201);
        }else{
            return showmsg(200);
        }
    }
}
