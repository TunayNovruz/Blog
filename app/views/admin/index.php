<?php
if(is_numeric($data) && $data ==1):
    echo<<<HTML
<script >
    alert('Profil Yeniləndi');
</script>
HTML;
elseif(is_numeric($data) && $data ==0):
    echo<<<HTML
<script >
    alert('Yalnışlıq oldu birazdan yenidən yoxlayın');
</script>
HTML;
endif;

$_SESSION['token'] = md5(rand(999,679989))?>
<form  action="" method="post" enctype="multipart/form-data">
    <div class="col-md-9 col-sm-12 right">

        <div class="post">
            <h1>Blog TƏnzimləmələri</h1>
            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
            <div class="set">
                <label for="s_lg">Blog Sahibi</label>
                <input type="text" name="owner" class="profil" id="s_lg" value="<?=$profil['owner']?>">
            </div>
            <div class="set">
                <label for="s_log">Login</label>
                <input type="text" name="username" class="profil" id="s_log" value="<?=$profil['username']?>">
            </div>
            <div class="set">
                <label for="old_psw">Köhnə Parol</label>
                <input type="password" name="old_password" class="profil" id="old_psw">
            </div>
            <div class="set">
                <label for="s_psw">Yeni Parol</label>
                <input type="password" name="yeni_password" class="profil" id="s_psw" >
            </div>
            <div class="set">
                <label for="tek_psw">Yeni Parol təkrar</label>
                <input type="password" name="tekrar_password" class="profil" id="tek_psw" >
            </div>
            <div class="set">
                <label for="s_p">Blog Şəkil </label>
                <input type="file" name="profil" class="pic" id="s_p">
            </div>
            <button class="text-center" type="submit"> Yadda saxla</button>

        </div>
        <div class="post"></div>
        <div class="post"></div>
    </div>
</form>
