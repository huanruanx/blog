<?php
/*
 * @Author       : Lucifer
 * @Date         : 2022-11-18 09:08:34
 * @LastEditTime : 2022-11-18 10:06:31
 * @FilePath     : \blog\app\admin\model\Comment.php
 */
declare (strict_types = 1);

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * @mixin \think\Model
 */
class Comment extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}
