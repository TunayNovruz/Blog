<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/29/2017
 * Time: 1:22 PM
 */

namespace app\controllers;


use app\models\category;
use app\models\comment;
use app\models\messages;
use app\models\pages;
use app\models\posts;
use app\models\profil;
use app\models\user;

class maincontroller
{

    public function index($id=[]){
        $posts = new posts();
        $data = $posts->select()->run();
        return $data =$this->get_post_cat($data) ;
    }
    public function post($id=[0]){
        if(!empty($_SESSION[$_SERVER['REMOTE_ADDR'].'_post_captcha_img'])) {
            unlink($_SESSION[$_SERVER['REMOTE_ADDR'].'_post_captcha_img']);
        }
        $post = new posts();
        $data = $post->select()->where(['id='=>$id[0]])->run();
        $data = $this->get_post_cat($data);
        $comments = new comment();
        $comments = $comments->select()->where(['post_id='=>$id[0]])->run();
        $data[0]['comments'] = $comments;
        return $data[0];
    }
    public function cat($id=[0]){
        if ($id[0]!=0){
            $posts = new posts();
            $data =$posts->select()->where(['category='=>$id[0]])->run();
            if(count($data)>0) return $data = $this->get_post_cat($data);
            else header('Location:/');
        }
        else{
            header('Location:/');
        }
    }
    public function get_post_cat($data){
        if(!empty($data)) {
            $cats = new category();
            $cats = $cats->select()->run();
            $i=0;
            foreach($data as $post){
                foreach ($cats as $cat){
                    if($cat['id']==$post['category']){
                        $data[$i]['cat_name'] = $cat['name'];
                    }
                }
                $i++;
            }
            return $data;
        } else {
                home();
                exit;
            }
    }
    public function pages($title=[]){
        if(!empty($title) && is_string($title[0])){
            $title=$title[0];
            $pages = new pages();
            $data = $pages->select()->where(['title='=>$title])->run();
            if (!empty($data)) return $data;
                else home();
        }else{
            home();
        }
    }
    public function login(){
        if(!empty($_POST) && $_POST['token'] == $_SESSION['token']){
            $pro = new profil();
            $username = strip_tags(trim($_POST['username']));
            $password = sha1($_POST['password']);
            $result = $pro->select()->where(['username='=>$username,'password='=>$password])->run();
            if ($result && count($result)>0){
                session_regenerate_id();
                $_SESSION['user_token'] = md5($result[0]['token']);
                header('Location: /admin');
            }
        }elseif(!empty($_SESSION['user_token']))header('Location: /admin');
    }
    public function contact(){
        if(!empty($_SESSION[$_SERVER['REMOTE_ADDR'].'_contact_captcha_img'])) {
            unlink($_SESSION[$_SERVER['REMOTE_ADDR'].'_contact_captcha_img']);
        }
        if(!empty($_POST['elaqe_token']) && $_POST['elaqe_token']==$_SESSION['elaqe_token']&& $_SESSION[$_SERVER['REMOTE_ADDR'].'_captcha_text'] == $_POST['captcha'])
        {
            $error = [];
            if(!empty(trim($_POST['ad']))){
                $ad = strip_tags(trim($_POST['ad']));
            }else {
                $error[] = 'Ad hissə boş ola bilməz';
            }
            if(!empty(trim($_POST['email']))){
                $email = strip_tags(trim($_POST['email']));
            }else{
                $error[] = 'Email hissə boş ola bilməz';
            }
            if(!empty(trim($_POST['mesaj']))){
                $mesaj = strip_tags(trim($_POST['mesaj']));
            }else{
                $error[]= 'Mesaj hissə boş ola bilməz';
            }

            if(empty($error)){
                $message = "Ad: $ad \n\r";
                $message.="Email: $email \n\r";
                $message.="Mesaj: $mesaj";
                $m1 =@mail('tunaynovruz@gmail.com','Blog Contact',$message);
                $m2 =@mail('tunay1qu@gmail.com','Blog Contact',$message);
                $mdb = new messages();
                $m3 = $mdb->insert([$ad,$email,$mesaj,time()])->run();
                if($m1 or $m2 or $m3)return 1;
                else return 0;
            }else{
                return $error;
            }

        }
        return 5;
    }
    public  function ajax($topic){
        if ($topic[0]=='comment' && $_SESSION['comment_token'] == $_POST['comment_token'] && $_SESSION[$_SERVER['REMOTE_ADDR'].'_captcha_text'] == $_POST['captcha']){
            unlink($_SESSION[$_SERVER['REMOTE_ADDR'].'_captcha_img']);
            $ad = strip_tags(trim($_POST['name']));
            $email = strip_tags(trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)));
            $comment = strip_tags(trim(filter_var($_POST['comment'],FILTER_SANITIZE_STRING)));
            $created_at = time();
            $post_id = intval($_POST['id']);
            if($ad!=='' && strlen($ad)>3 && filter_var($email,FILTER_VALIDATE_EMAIL) && !empty($comment)){
                $comme = new comment();
                $result =$comme->insert([$ad,$email,$created_at,$comment,$post_id])->run();
                if ($result) echo 1;
                else echo  -1;
            }else echo  0;

        exit;}else home();
    }
    public function captcha(){
        if(!empty($_POST['topic'])){
            $topic=$_POST['topic'];
        $im = imagecreatetruecolor(200,50);
        $white = imagecolorallocate($im, 255, 255, 255);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 200, 50, $grey);
        $arr = range('a','z');
        $arr = array_merge($arr,range(0,9));
        shuffle($arr);
        $text = implode('',array_slice($arr,0,5));
        $font = "fonts/arial.ttf";
        imagettftext($im, 20, 0, 20, 30, $black,$font, $text);
        $save = "images/captcha/".uniqid().".png";
        imagepng($im,$save);
        imagedestroy($im);
        $_SESSION[$_SERVER['REMOTE_ADDR'].'_'.$topic.'_captcha_text'] = $text;
        $_SESSION[$_SERVER['REMOTE_ADDR'].'_'.$topic.'_captcha_img'] = $save;
        echo $save;
        exit;
        }else home();
    }
}