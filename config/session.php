<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:46:59
 * @LastEditTime : 2022-11-18 11:13:10
 * @FilePath     : \blog\config\session.php
 */
// +----------------------------------------------------------------------
// | 会话设置
// +----------------------------------------------------------------------

return [
    // session name
    'name'           => 'PHPSESSID',
    // SESSION_ID的提交变量,解决flash上传跨域
    'var_session_id' => '',
    // 驱动方式 支持file cache
    'type'           => 'file',
    // 存储连接标识 当type使用cache的时候有效
    'store'          => null,
    // 过期时间
    'expire'         => 7200,
    // 前缀
    'prefix'         => '',
];
