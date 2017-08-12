<div class="container-fluid">
    <div class="row">
        <div class="navbar col-md-3 col-sm-12 navbar-inverse">
            <div class=" left">
                <div class="navbar-header">
                    <div class="col-md-12 logo">
                        <img src="/images/<?=$profil['image']?>" alt="profil photo"> <br>
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
                        <a href="/admin">Profil</a><br>
                        <a href="/admin/pages">Səhifələr</a><a class="plus" href="/admin/new_page"> <i class="glyphicon glyphicon-plus"></i></a> <br>
                        <a href="/admin/posts">Blog Yazıları</a><a class="plus" href="/admin/new_post"><i class="glyphicon glyphicon-plus"></i></a> <br>
                        <a href="/admin/cats">Kateqoriyalar</a><a class="plus" href="/admin/cat_add"><i class="glyphicon glyphicon-plus"></i></a> <br>
                        <a href="/admin/comments">Şərhlər</a><br>
                        <a href="/admin/messages">Mesajlar</a><br>
                        <a href="/admin/logout">Çıxış</a><br>
                    </div>
                </div>
            </div>
        </div>