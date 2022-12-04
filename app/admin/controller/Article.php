<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:54:43
 * @LastEditTime : 2022-11-26 11:36:31
 * @FilePath     : \blog\app\admin\controller\Article.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Area;
use app\admin\model\Article as ModelArticle;
use app\BaseController;
use think\facade\Filesystem;
use think\facade\Validate;
use think\facade\View;
use think\response\Json;

class Article extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view::fetch();
    }

    /**
     * 显示文章列表
     * 
     * @return \think\Response
     */
    public function display()
    {
        $total      = ModelArticle::count();
        $rows       = ModelArticle::order('id desc')->select();
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
        $area = Area::select();
        $data = [
            'area'  =>  $area
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
        $save = new ModelArticle;
        $save->save([
            'title'     =>      $input['title'],
            'outline'   =>      $input['outline'],
            'label'     =>      $input['label'],
            'content'   =>      $input['content'],
            'area_id'   =>      $input['area'],
            'outline_img'   =>      $input['picurl']
        ]);
        if (!$save) {
            return showmsg(201, "");
        } else {
            return showmsg(200, "");
        }
    }

    /**
     * 上传首页概览图
     *
     * @param  file $file
     * @return \think\Response
     */
    public function upload_img()
    {
        $data = input();
        if (!empty($data['img'])) {
            $reg = '/data:image\/(\w+?);base64,(.+)$/si';
            preg_match($reg, $data['img'], $match_result);
            $file_name = time() . '.' . $match_result[1];
            $logo_path = app()->getRootPath() . '/public/static/upload_img/'.$file_name;
            $num = file_put_contents($logo_path, base64_decode($match_result[2]));
            if (!empty($num)) {
                $data = [
                    'state'     =>      200,
                    'picurl'    =>      '/static/upload_img/'.$file_name,
                    'message'   =>      '上传成功'
                ];
                return json($data);
            } else {
                return json(['state'=>'201','message'=>'保存失败']);
            }
        } else {
            return json(['state'=>201,'message'=>'参数有误']);
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $res = ModelArticle::where()->find($id);
        return view::fetch('', ['data' => $res]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update($id)
    {
        $res = ModelArticle::find($id);
        $res->save([]);
        if ($res) {
            return showmsg();
        } else {
            return showmsg(201);
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
        $res = ModelArticle::find($id);
        $res->delete();
        if (!$res) {
            return showmsg(201, "删除失败");
        } else {
            return showmsg(200);
        }
    }

    /**
     * 上传图片资源
     * 
     * @param file $file
     * @return json 
     */
    public function upload()
    {
        $file = request()->file('file');
        if (empty($file)) return showmsg(201);
        $vail = Validate::rule([
            'image'     =>      'file|fileExt:jpg,png,gif'
        ]);
        $result = $vail->check([
            'image' =>  $file
        ]);
        if (!$result) return showmsg(201, '上传失败可能是因为不是图片文件');
        $save = Filesystem::putFile('', $file);
        $data = [
            'location'  =>  '/static/upload/image/' . $save
        ];
        return json($data);
    }

    public function test()
    {
        return app()->getRootPath() . 'public/static/upload/image';
    }
}
