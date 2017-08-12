<form  method="post">
    <div class="col-md-9 col-sm-12 right" >
        <div class="col-md-12" id="ph" style="margin-bottom:48.%;">
            <h1>Yeni Kateqoriya</h1>
            <input type="text" name="category" id="" value="<?=$data['title']?>">
            <?php $csrf_token = $_SESSION['token'] = md5(rand(999,10000)); ?>
            <input type="hidden" id="hidden" name="token" value="<?=$csrf_token?>">
            <input type="submit" value="göndər">
        </div>
       </div>
</form>
