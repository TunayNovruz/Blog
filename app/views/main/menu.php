<?php if(!empty($_SESSION['user_token'])):?>
    <a href="/admin">
        <div id="admin_button">
            <span class="glyphicon glyphicon-user"></span>&nbsp;Admin
        </div>
    </a>
    <a href="/admin/new_post">
        <div id="post_button">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;new post
        </div>
    </a>
<?php endif;?>
<div class="container-fluid">
    <div class="row">
        <div class="navbar col-md-3 col-sm-12 navbar-inverse">
            <div class=" left">
                <div class="navbar-header">
                    <div class="col-md-12 logo">
                        <img src="/images/<?=$profil['image']?>" alt="profil photo"><br>
                        <a href="/"> <?=$profil['owner']?></a>
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class=" collapse navbar-collapse" id="menu">
                   <div class="col-md-10 menu">
                        <a href="/">Əsas Səhifə</a>
                        <?php foreach ($pages as $page):?>
                        <a href="/pages/<?=$page['title']?>"><?=$page['title']?></a>
                        <?php endforeach;?>
                       <a href="/contact">Əlaqə</a>
                    </div>
                    <div class="col-md-10 menu">
                        <h1 style="color: white;">Məqalələr</h1>
                        <?php foreach($menu as $category):?>
                        <a href="/cat/<?=$category['id']?>"><?=$category['name']?></a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>

        