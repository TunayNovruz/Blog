<?php foreach ($data as $page):?>
<div class="col-md-9 col-sm-12 right">
    <div>
        <div class="post">
            <h1> <b><a href="/pages/<?=$page['title']?>"><?=$page['title']?></a></b></h1>
            <br>
        </div>
        <div class="post_footer">
            <a onclick="page_sil(<?=$page['id']?>)"><i class="glyphicon glyphicon-trash"></i> Sil</a>
            <a href="page_edit/<?=$page['id']?>"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Redakte et</a>
            <a href="/pages/<?=$page['title']?>"><i class="glyphicon glyphicon-eye-open"></i> Səhifəni göstər</a>
        </div>
    </div>
</div>
<?php endforeach;?>
<script>
    function page_sil($id) {
        if(confirm('Səhifəni silmək istədiyinizdən əminsiniz?')){
            window.location = '/admin/page_sil/'+$id;
        }
    }
</script>
