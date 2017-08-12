<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/3/2017
 * Time: 9:19 PM
 */
if(is_numeric($data)):

    if ($data ==1):
        echo<<<HTML
<script >
    alert('Səhifə Yeniləndi');
     window.location ="/admin/pages";
</script>
HTML;
    else:
        header("Location: /admin/edit/$data");
    endif;
else: ?>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckeditor/samples/js/sample.js"></script>
    <form  method="post" onsubmit="return add();">
        <div class="col-md-9 col-sm-12 right" >
            <div class="col-md-12" id="ph">
                <h1>Başlıq</h1>
                <input type="text" name="title" id="" value="<?=$data['title']?>">
                <input type="hidden" id="hidden" name="content" value="">
                <?php $csrf_token = $_SESSION['token'] = md5(rand(999,10000)); ?>
                <input type="hidden"  name="token" value="<?=$csrf_token?>">
            </div>
            <div class="new-post col-md-12">
                <h1>Məlumat</h1>
                <div id="editor">
                    <?=html_entity_decode($data['content'])?>
                </div>
                <div class="c_form">
                    <br>
                    <button type="submit" onclick="update()">Göndər</button>
                </div>
            </div>

        </div>

    </form>
    <script>
        initSample();
        function add() {
            document.getElementById('hidden').value = CKEDITOR.instances.editor.getData();
            return true;
        }
    </script>
<?php endif;