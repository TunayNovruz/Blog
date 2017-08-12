
<div class="col-md-9 col-sm-12 right">
            <div>
                <div class="post">
                    <?php //print_r($data)?>
                    <h1> <b> <?=$data['title']?> </b></h1>
                    <p><?=html_entity_decode($data['post'])?></p>
                    <div class="paylash">
                        <h3>Bunu Paylaş:</h3>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
                <div class="post_footer">
                    <i class="glyphicon glyphicon-calendar"></i><a href="#"><?=date('Y-M-d',$data['created_at'])?></a>
                    <i class="glyphicon glyphicon-folder-open"></i> <a href="/cat/<?=$data['category']?>"><?=$data['cat_name']?></a>
                    <i class="glyphicon glyphicon-comment"></i> <a href="#comment">Comment</a>
                    <?php if(!empty($_SESSION['user_token'])):?>
                    <i class="glyphicon glyphicon-pencil"></i><a href="/admin/edit/<?=$data['id']?>">Redakte et</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
<div class="col-md-9 col-sm-12 right">
    <?php foreach ($data['comments'] as $comment):?>
    <div class="comments">
        <div class="media">
            <div class="media-left">
                <img src="/images/user.jpg" class="media-object" style="width:60px">
            </div>
            <div class="media-body">
                <h2 class="media-heading"> <?=$comment['ad']?> </h2><span>(<?=$comment['email']?>)</span>
                <p style="word-break:break-all"><?=$comment['comment']?></p>
            </div>
            <div class="media-middle">
                <span><?=date('Y-M-d H:m:i',$comment['created_at'])?></span>
            </div>
        </div>
        <hr></div>
        <?php endforeach;?> </div>

<div class="col-md-9 col-sm-12 right">
                <div class="comment " id="comment">
                    <?php $token = $_SESSION['comment_token'] = md5(uniqid());?>
                    <input type="hidden" id="token" value="<?=$token?>">
                    <input type="hidden" id="post_id" value="<?=$data['id']?>">
                    <h3 id="ad_error" class="alert-danger" style="display: none;"> <br> Ad hissə boş ola bilməz</h3>
                    <h3 id="email_error" class="alert-danger" style="display: none;"> <br> Emaildə yalnışlıq var</h3>
                    <h3 id="comment_error" class="alert-danger" style="display: none;"> <br> Şərh boş ola bilməz</h3>
                    <h3 id="captcha_error" class="alert-danger" style="display: none;"> <br> Captcha doğru deyil</h3>
                    <label for="ad">Adınız:</label>
                    <label for="mail" class="col-md-offset-4">Email:</label><br>
                    <input id="ad" type="text" required >&nbsp;
                    <input id = "mail" type="email" required >
                    <h1> Şərh Yazın:</h1>
                    <textarea name="" required id="txa" rows="5" placeholder="Şərhiniz"></textarea><br>
                    <div style="width: 100%">
                        <div id="captcha"><h3 style="display: inline-block;">Şəkildəki mətni daxil edin:</h3></div>
                        <input type="text" name="captcha" id="captcha_text">
                    </div>
                    <button  id="send_comment"> Şərh Göndər</button>
                </div>
        </div>
<script>captcha('post')</script>




