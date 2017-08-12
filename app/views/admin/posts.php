<?php foreach ($data as $post):?>
<div class="col-md-9 col-sm-12 right">
    <div>
        <div class="post">
            <h1> <b><a href="/post/<?=$post['id']?>"><?=$post['title']?></a></b></h1>
            <br>
        </div>
        <div class="post_footer">
            <a onclick="post_sil(<?=$post['id']?>)"><i class="glyphicon glyphicon-trash"></i> Sil</a>
            <a href="/admin/edit/<?=$post['id']?>"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Redakte et</a>
            <a href="/post/<?=$post['id']?>"><i class="glyphicon glyphicon-eye-open"></i> Postu göstər</a>
        </div>
    </div>
</div>
<?php endforeach;?>
<script>
    function post_sil($id){
        if(confirm('Məqaləni silmək istədiyinizdən əminsiniz?')){
            window.location = "/admin/sil/"+$id;
        }
    }
</script>
    