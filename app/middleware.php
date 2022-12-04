<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:46:59
 * @LastEditTime : 2022-11-24 20:07:49
 * @FilePath     : \blog\app\middleware.php
 */
// 全局中间件定义文件
return [
    // 全局请求缓存
    // \think\middleware\CheckRequestCache::class,
    // 多语言加载
    \think\middleware\LoadLangPack::class,
    // Session初始化
    \think\middleware\SessionInit::class,
];
