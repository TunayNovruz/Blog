<?php foreach ($data as $page):?>
    <div class="col-md-9 col-sm-12 right">
        <div>
            <div class="post">
                <h1> <b><a href="/cat/<?=$page['id']?>"><?=$page['name']?></a></b></h1>
                <br>
            </div>
            <div class="post_footer">
                <a onclick="cat_sil(<?=$page['id']?>)"><i class="glyphicon glyphicon-trash"></i> Sil</a>
            </div>
        </div>
    </div>
<?php endforeach;?>
<script>
    function cat_sil($id) {
        if(confirm('Kateqoriyanı silmək istədiyinizdən əminsiniz?')){
            window.location = '/admin/cat_sil/'+$id;
        }
    }
</script>
