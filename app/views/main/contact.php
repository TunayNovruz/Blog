<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/2/2017
 * Time: 3:52 PM
 */
if ($data ==1) echo <<<HTML
<script >alert('Mesajınız uğurla göndərildi');</script>
HTML;
elseif($data==0) {unset($data); echo <<<HTML
<script >alert('Texniki problem oldu,biraz sonra yenidən cəhd edin');
window.location ="/contact";
</script>
HTML;
}
?>
<div class="col-md-9 col-sm-12 right">
    <div class="contact col-md-12">
        <h1>Əlaqə</h1>
        <?php if(is_array($data))foreach ($data as $error):?>
        <div class="alert-danger"><?=$error?></div>
        <?php endforeach;?>
        <form method="post">
            <?php $token = $_SESSION['elaqe_token'] = md5(uniqid())?>
            <input type="hidden" name="elaqe_token" value="<?=$token?>">
            <div class="c_form">
            <label for="c_ad"> <span style="color: red;">*</span>Adınız:</label>
            <input id="c_ad" name="ad" type="text">
        </div>
        <div class="c_form">
            <label for="c_email"><span style="color: red;">*</span>Email:</label>
            <input id="c_email" name="email" type="email">
        </div>
        <div class="c_form">
            <label for="c_mesaj"><span style="color: red;">*</span>Mesajınız:</label>
            <textarea name="mesaj" id="c_mesaj" rows="5"></textarea>
        </div>
            <div style="width: 100%">
                <div id="captcha"><h3 style="display: inline-block;">Şəkildəki mətni daxil edin:</h3></div>
                <input type="text" name="captcha" id="captcha_text">
            </div>
        <div class="c_form">
            <br>
            <button type="submit">Göndər</button>
        </div>
        </form>
        <div class="s_me">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fa fa-github"></i></a>
            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
        </div></div>
</div>
<script>captcha('contact')</script>

