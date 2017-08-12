<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/9/2017
 * Time: 1:06 AM
 */

namespace app\models;


use core\Model;

class comment extends Model
{
    protected $table = 'comments';
    protected $fields =[
        'ad',
        'email',
        'created_at',
        'comment',
        'post_id'
    ];
}