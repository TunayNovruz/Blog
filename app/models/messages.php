<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/10/2017
 * Time: 11:49 AM
 */

namespace app\models;


use core\Model;

class messages extends Model
{
    protected $table='messages';
    protected $fields=[
        'ad',
        'email',
        'message',
        'created_at'
    ];

}