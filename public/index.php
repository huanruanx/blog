<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:46:59
 * @LastEditTime : 2022-12-04 15:21:29
 * @FilePath     : \blog\public\index.php
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

/**
 * 判断程序是否安装，原理是判断install目录下是否存在【su.lock】文件
 */
if (! is_file('install/su.lock')) {
    header("location:/install");
    exit;
}

require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);

