<?php foreach (array_reverse($data)  as $comment):?>
<div class="col-md-9 col-sm-12 right">
    <div>
        <div class="post">
            <h1 style="word-break: break-all"> <b><?=$comment['comment']?></b></h1>
            <h2>Ad:<?=$comment['ad']?>&nbsp;Email: <?=$comment['email']?></h2>
            <br>
        </div>
        <div class="post_footer">
            <a class="sil_comment" data-target="<?=$comment['id']?>"><i class="glyphicon glyphicon-trash"></i> Sil</a>
            <a href="/post/<?=$comment['post_id']?>"><i class="glyphicon glyphicon-eye-open"></i> Postu göstər</a>
        </div>
    </div>
</div>
<?php endforeach;?>
