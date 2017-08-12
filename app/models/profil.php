<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/6/2017
 * Time: 11:40 AM
 */
namespace app\models;

use core\Model;

class profil extends Model{
    public $table = "profil";
    protected $fields = [
        'owner',
        'username',
        'password',
        'token',
        'image'
    ];
}