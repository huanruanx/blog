<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-22 09:26:00
 * @LastEditTime : 2022-11-26 20:58:33
 * @FilePath     : \blog\config\captcha.php
 */
// +----------------------------------------------------------------------
// | Captcha配置文件
// +----------------------------------------------------------------------

return [
    //验证码位数
    'length'   => 4,
    // 验证码字符集合
    'codeSet'  => 'QWERTYUIOPASDFGHJKLZXCVBNM',
    // 验证码过期时间
    'expire'   => 1800,
    // 是否使用中文验证码
    'useZh'    => false,
    // 是否使用算术验证码
    'math'     => false,
    // 是否使用背景图
    'useImgBg' => true,
    //验证码字符大小
    'fontSize' => 25,
    // 是否使用混淆曲线
    'useCurve' => true,
    //是否添加杂点
    'useNoise' => true,
    // 验证码字体 不设置则随机
    'fontttf'  => '',
    //背景颜色
    'bg'       => [243, 251, 254],
    // 验证码图片高度
    'imageH'   => 0,
    // 验证码图片宽度
    'imageW'   => 0,

    // 添加额外的验证码设置
    // verify => [
    //     'length'=>4,
    //    ...
    //],
];
