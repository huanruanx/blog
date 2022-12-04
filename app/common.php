<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:46:59
 * @LastEditTime : 2022-12-04 13:20:50
 * @FilePath     : \blog\app\common.php
 */
// 应用公共文件

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param int $code
 * @param null $message 提示信息
 * @param array $data 返回数据
 */
function showmsg($code = 200, $message = null, $data = array())
{
    header('Content-type: application/json');
    if ($code == 201) {
        if ($message == null) {
            $message = "操作失败";
        }
    } elseif ($code == 200) {
        if ($message == null) {
            $message = '操作成功';
        }
    }
    $result = array(
        'code' => $code,
        'msg' => $message,
        'data' => $data,
        'time' => time()
    );
    echo json_encode($result);
    exit;
}

/**
 * 获取一串字符串
 * @return string
 */
function key_code($strs = true)
{
    $str = md5(uniqid(md5(microtime(true)), true));
    $str = sha1($str); //加密
    if ($strs) {
        return strtoupper($str);
    } else {
        return $str;
    }
}


/**
 * 客户端IP地址读取
 * @return 1.1.1.1
 */
function getip()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknow")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknow")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknow")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknow")) {
        $ip = $_SERVER["REMOTE_ADDR"];
    } else {
        $ip = "unknow";
    }
    return $ip;
}
