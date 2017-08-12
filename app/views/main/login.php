<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/6/2017
 * Time: 5:02 PM
 */?>

<form  method="post">
    <div class="col-md-9 col-sm-12 right" >
        <div class="col-md-12" id="login">
            <div class="col-md-6">
                <label for="">Username:<input type="text" name="username"></label>
            </div>
            <div class="col-md-6">
                <label for="">Password:<input type="password" name="password"></label>
            </div>
            <?php $csrf_token = $_SESSION['token'] = md5(rand(999,10000)); ?>
            <div class="col-md-7 col-xs-8">
                <input type="hidden" id="hidden" name="token" value="<?=$csrf_token?>">
                <input id="send" type="submit" value="göndər">
            </div>
</div>
</div>
</form>