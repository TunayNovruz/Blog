<?php
foreach ($data as $post):?>
<div class="col-md-9 col-sm-12 right">
            <div>
            <div class="post">
                <h1><b><a href="/post/<?=$post['id']?>"><?=$post['title']?></a></b></h1>
                <p><?=html_entity_decode($post['post'])?></p>
                <a href="/post/<?=$post['id']?>">Read More</a>
            </div>
            <div class="post_footer">
                <i class="glyphicon glyphicon-calendar"></i><a href="/post/<?=$post['id']?>"> <?= Date('Y-M-d',$post['created_at'])?></a>
                <i class="glyphicon glyphicon-folder-open"></i><a href="/cat/<?=$post['category']?>"><?=$post['cat_name']?></a>
                <i class="glyphicon glyphicon-comment"></i> <a href="/post/<?=$post['id']?>#comment">Comment</a>
                <?php if(!empty($_SESSION['user_token'])):?>
                <i class="glyphicon glyphicon-pencil"></i><a href="/admin/edit/<?=$post['id']?>">Redakte et</a>
                <?php endif;?>
            </div>
        </div>
        </div>
<?php endforeach;?>