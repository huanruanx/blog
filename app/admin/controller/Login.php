<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:48:40
 * @LastEditTime : 2022-12-04 11:10:01
 * @FilePath     : \blog\app\admin\controller\Login.php
 */

declare(strict_types=1);

namespace app\admin\controller;

use app\admin\model\Admin as ModelAdmin;
use app\admin\validate\Admin;
use think\exception\ValidateException;
use think\facade\Session;
use think\facade\View;
use think\Request;

class Login
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
    public function create(Request $request)
    {
        $input = input();
        try {
            validate(Admin::class)->check([
                'username'      =>      $input['username'],
                'password'      =>      $input['password']
            ]);
        } catch (ValidateException $e) {
            return showmsg(201, $e->getError());
        }
        //调用内置的函数手动验证
        if (!captcha_check($input['yzm'])) {
            return showmsg(201, '验证码有误');
        }
        $admin = ModelAdmin::where(['username' => $input['username'], 'password' => $input['password']])->find();
        if (empty($admin)) {
            return showmsg(201, '用户或密码有误');
        }
        $data = [
            'code'  =>  '200',
            'msg'   =>  '登录成功',
            'time'  =>  time(),
            'token' =>  key_code()
        ];
        $auth = Session::set("auth", $data);
        Session::set('token', ['code' => '200', 'msg' => '登陆成功', 'time' => time()]);
        if ($auth) {
            return showmsg(201, '登录失败更换浏览器重试');
        } else {
            return Session::get('token');
            return showmsg(200, '', $auth);
        }
    }

    public function logout()
    {
        Session::clear();
        return redirect("../../admin/login");
    }
}
