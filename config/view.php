<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:46:59
 * @LastEditTime : 2022-11-25 10:43:57
 * @FilePath     : \blog\config\view.php
 */
// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------

return [
    // 模板引擎类型使用Think
    'type'          => 'Think',
    // 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写 3 保持操作方法
    'auto_rule'     => 1,
    // 模板目录名
    'view_dir_name' => 'view',
    // 模板后缀
    'view_suffix'   => 'html',
    // 模板文件名分隔符
    'view_depr'     => DIRECTORY_SEPARATOR,
    // 模板引擎普通标签开始标记
    'tpl_begin'     => '{',
    // 模板引擎普通标签结束标记
    'tpl_end'       => '}',
    // 标签库标签开始标记
    'taglib_begin'  => '{',
    // 标签库标签结束标记
    'taglib_end'    => '}',
    //静态资源
    'tpl_replace_string'  => [
        '__CSS__'       => 'static/admin/css',
        '__JS__'        => 'static/admin/js',
        '__IMG__'       => 'static/admin/images',
        '__FONT__'      => 'static/admin/font',
        '__tinymce__'   => 'static/admin/tinymce',
        '__ICSS__'       => 'static/index/css',
        '__IJS__'        => 'static/index/js',
        '__IIMG__'       => 'static/index/images',
        '__IFONT__'      => 'static/index/font',
        '__PUBLIC__'        =>      'static/public'
    ]

];
