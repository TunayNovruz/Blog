<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/1/2017
 * Time: 9:59 PM
 */

namespace app\models;


use core\Model;

class category extends Model
{
    protected $table = 'Categories';
    protected $fields = [
        'name'
    ];
}