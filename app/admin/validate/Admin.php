<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:56:22
 * @LastEditTime : 2022-12-04 16:14:28
 * @FilePath     : \blog\app\admin\validate\Admin.php
 */
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username'      =>      'require',
        'password'      =>      'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'username.require'          =>          '用户名不能为空',
        'password.require'          =>          '安全码不能为空',
    ];
}
