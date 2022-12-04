<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 10:07:10
 * @LastEditTime : 2022-11-25 10:25:57
 * @FilePath     : \blog\config\su.php
 */
return [
    'key'                       =>          env('su.key', ''),
    'version'   =>  '123456',
    'api'                       =>          [
        'ip_ascription'         =>          'https://ip.useragentinfo.com/json?ip='
    ],
    'host'                      =>          'http://127.0.0.1/',
];
