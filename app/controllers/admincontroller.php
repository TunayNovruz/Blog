<?php

/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 7/29/2017
 * Time: 1:21 PM
 */
namespace app\controllers;
use app\models\category;
use app\models\comment;
use app\models\messages;
use app\models\pages;
use app\models\posts;
use app\models\profil;
use app\models\user;

class admincontroller
{
    public function index(){
        if (!empty($_POST) && $_POST['token'] ==$_SESSION['token']){
            $update = [];
            if(!empty(trim($_POST['owner']))) $update['owner'] = trim($_POST['owner']);
            if(!empty(trim($_POST['username']))) $update['username'] = trim($_POST['username']);
            if(!empty($_POST['old_password']) && !empty($_POST['yeni_password']) && !empty($_POST['tekrar_password'])){
                if($_POST['yeni_password'] == $_POST['tekrar_password']){
                    $psw = new profil();
                    $psws =$psw ->select()->where(['password='=>sha1($_POST['old_password'])])->run();
                    if(!empty($psws) && count($psws)>0){
                        $update['password'] = sha1($_POST['yeni_password']);
                    }
                }
            }
            if(!empty($_FILES['profil'])){
                $ext =pathinfo($_FILES['profil']['name'],PATHINFO_EXTENSION);
                if($ext == "jpg" || $ext == "png"){
                    $target = "images/profil.".$ext;
                    if(move_uploaded_file($_FILES["profil"]["tmp_name"], $target)){
                        $update['image'] = basename($target);
                    }
                }
            }
            $profil = new profil();
            $result =$profil->update($update)->where(['id='=>1])->run();
            if ($result) return 1;
            else return 0;
        }
    }
    public function pages(){
        $pages = new pages();
        $data = $pages->select()->run();
        return $data;
    }
    public function posts(){
        $posts = new posts();
        $data = $posts->select()->run();
        return $data;
    }
    public function edit($id=[]){
        if(!empty($_POST) && !empty($_POST['token'])&& $_POST['token'] == $_SESSION['token']){
            $title = strip_tags(trim($_POST['title']));
            $post = htmlentities(str_replace('<script>','',$_POST['post']));
            $category = intval(strip_tags($_POST['category']));
            $tags = strip_tags(trim($_POST['tags']));
            $new_post = new posts();
            if($title!='' and $tags!='' and $category!='' and $post!=''){
                $result =$new_post->update(['title'=>$title,'post'=>$post,'category'=>$category,'tags'=>$tags])->where(['id='=>$id[0]])->run();
                if ($result) return 1;
                else return $id[0];
            }else return $id[0];

        }else{
            if(!empty($id)){
                $post = new posts();
                $data = $post->select()->where(['id='=>$id[0]])->run();
                if($data)return $data[0];
                else home();
            }
            else{
                home();
            }
        }

    }
    public function sil($id=[]){
        $id = $id[0];
        $post = new posts();
        $data = $post->delete()->where(['id='=>$id])->run();
        $stmt =$post->statement;
        if($stmt->rowCount() >0) return  "Məqalə silindi";
        else return 'yalnışlıq var biraz sonra yenidən yoxlayın';
    }
    public function new_post(){
     if(!empty($_POST) && !empty($_POST['token'])&& $_POST['token'] == $_SESSION['token']){
        $title = strip_tags($_POST['title']);
        $post = htmlentities(str_replace('<script>','',$_POST['post']));
        $created_at = time();
        $category = intval(strip_tags($_POST['category']));
        $tags = strip_tags(trim($_POST['tags']));
        if(!empty($post) && !empty($category) && !empty($tags)) {
            $new_post = new posts();
            $result = $new_post->insert([$title, $post, $created_at, $category, $tags])->run();
            if ($result) return 1;
        }
        return 0;
     }else{
       return 0;
     }
    }
    public function new_page(){
        if(!empty($_POST) && !empty($_POST['token'])&& $_POST['token'] == $_SESSION['token']){
            $title = strip_tags($_POST['title']);
            $content = htmlentities(str_replace('<script>','',$_POST['content']));
            $created_at = time();
            $new_page = new pages();
            $result =$new_page->insert([$title,$content,$created_at])->run();
            if ($result) return 1;
            else return 0;
        }else{
            return 0;
        }
    }
    public function page_edit($id=[]){
        if(!empty($_POST) && !empty($_POST['token'])&& $_POST['token'] == $_SESSION['token']){
            $title = strip_tags($_POST['title']);
            $content = htmlentities(str_replace('<script>','',$_POST['content']));
            $updated_page = new pages();
            $result =$updated_page->update(['title'=>$title,'content'=>$content])->where(['id='=>$id[0]])->run();
            if ($result) return 1;
            else return $id[0];
        }else{
            if(!empty($id)){
                $page = new pages();
                $data = $page->select()->where(['id='=>$id[0]])->run();
                if($data)return $data[0];
                else home();
            }
            else{
                home();
            }
        }
    }
    public function page_sil($id=[]){
        if(!empty($id) && is_numeric($id[0])){
            $page = new pages();
            $data = $page->delete()->where(['id='=>$id[0]])->run();
            $stmt = $page->statement;
            if($stmt->rowCount()>0) return  "Səhifə silindi";
            else return 'yalnışlıq var biraz sonra yenidən yoxlayın';

        }
    }
    public function cats(){
        $cats = new category();
        $cats = $cats->select()->run();
        return $cats ;
    }
    public function cat_sil($id=[]){
        if(!empty($id[0]) && is_numeric($id=$id[0])){
            $cat = new category();
            $cat->delete()->where(['id='=>$id])->run();
            $stmt =$cat->statement;
            if($stmt->rowCount()>0) return 'Categoryiya silindi';
            else return 'problem yarandı biraz sonra yenidən yoxlayın';
        }
    }
    public function cat_add(){
        if(!empty($_POST) && $_POST['token']==$_SESSION['token']){
            $cat = new category();
            $cat->insert([$_POST['category']])->run();
            header('location: /admin/cats');
        }
    }
    public function logout(){
        session_destroy();
        session_unset();
        header('Location: /login');
    }
    public function messages(){
        $m = new messages();
        $data= $m->select()->run();
        return $data;
    }
    public function comments(){
        $comments = new comment();
        $data =$comments->select()->run();
        return$data;
    }
    public function comment_sil(){
        if (!empty($_POST['id'])){
            $comment  = new comment();
            $comment->delete()->where(['id='=>intval($_POST['id'])])->run();
            $stm = $comment->statement;
            if($stm->rowCount()>0) echo 1;
            else echo 0;
            exit;
        }
    }
    public function message_sil(){
        if (!empty($_POST['id'])){
            $comment  = new messages();
            $comment->delete()->where(['id='=>intval($_POST['id'])])->run();
            $stm = $comment->statement;
            if($stm->rowCount()>0) echo 1;
            else echo 0;
            exit;
        }
    }
}