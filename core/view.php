<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/29/2017
 * Time: 4:18 PM
 */

namespace core;


use app\controllers\maincontroller;
use app\models\category;
use app\models\pages;
use app\models\profil;

class view
{
    static $controller;
    public static function render (array $ar =[])
    {
        if(!empty($ar) && count($ar)>1){
            self::$controller = $folder=$ar['controller'];
            $method=$ar['method'];
            $data=$ar['data'];
            $controller = 'app\controllers\\'.$folder.'controller';
            $menu = self::get_menu();
            $pages = self::get_pages();
            $profil = self::get_profil();
            if ($folder == 'admin'){
                if(empty($_SESSION['user_token']) || md5($profil['token'])!=$_SESSION['user_token'] ){
                    unset($_SESSION['user_token']);
                    header('Location: /login');
                }
            }
            include ROOT."/app/views/".$folder.'/header.html';
            include ROOT."/app/views/".$folder.'/menu.php';
            include ROOT."/app/views/".$folder.'/'.$method.'.php';
            include ROOT."/app/views/".$folder.'/footer.html';
        }
        else{
            header('Location: /');
        }
    }
    public static function get_menu()
    {
//      /*  if(self::$controller == 'admin') $a_p = 1;
//        else $a_p = 0;*/
        $cate = new category();
        $categories =$cate->select()->run();
        return $categories;
    }
    public static function get_pages(){
        $pages = new pages();
        $pages = $pages->select()->run();
        return $pages;
    }
    public static function get_profil(){
        $profil = new profil();
        $profil =$profil->select()->run();
        return $profil[0];
     }

}