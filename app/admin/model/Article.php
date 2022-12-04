<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 08:54:35
 * @LastEditTime : 2022-11-18 09:46:45
 * @FilePath     : \blog\app\admin\model\Article.php
 */
declare (strict_types = 1);

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * @mixin \think\Model
 */
class Article extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}
