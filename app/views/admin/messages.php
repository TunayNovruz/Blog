<?php foreach ($data as $message):?>
    <div class="col-md-9 col-sm-12 right">
        <div>
            <div class="post">
                <h1> <b><?=$message['ad']?></b></h1>
                <h2> <b><?=$message['email']?></b></h2>
                <p> <b><?=$message['message']?></b></p>
                <br>
            </div>
            <div class="post_footer">
                <a class="message_sil" data-target="<?=$message['id']?>"><i class="glyphicon glyphicon-trash"></i> Sil</a>
                <a><i class="glyphicon glyphicon-time"></i> <?=date('Y-M-d H:s:i',$message['created_at'])?></a>
            </div>
        </div>
    </div>
<?php endforeach;?>