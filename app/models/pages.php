<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/2/2017
 * Time: 3:30 PM
 */
namespace app\models;
use core\Model;

class pages extends Model{
    protected $table ='pages';
    protected $fields =[
        'title',
        'content',
        'created_at'
    ];
}