<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-26 19:47:38
 * @LastEditTime : 2022-11-26 19:47:57
 * @FilePath     : \blog\app\admin\validate\Check.php
 */
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Check extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'content'       =>          'require',
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        'content.require'       =>      '内容不得为空'
    ];
}
