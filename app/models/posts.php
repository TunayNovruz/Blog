<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/1/2017
 * Time: 4:05 PM
 */
namespace app\models;
use core\Model;

class posts extends Model {
    public $table = 'posts';
    protected $fields=[
        'title',
        'post',
        'created_at',
        'category',
        'tags'
    ];
}