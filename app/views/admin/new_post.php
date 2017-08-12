<?php
/**
 * Created by PhpStorm.
 * User: Tunay
 * Date: 8/3/2017
 * Time: 9:19 PM
 */
if ($data !=0):
   echo<<<HTML
<script >
    alert('Məqalə Əlavə olundu');
     window.location ="/admin/posts";
</script>
HTML;
else: ?>
    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/plugins/ckeditor/samples/js/sample.js"></script>
    <form  method="post" onsubmit="return add();">
        <div class="col-md-9 col-sm-12 right" >
            <div class="col-md-12" id="ph">
                <h1>Başlıq</h1>
                    <input type="text" name="title" id="" value="<?=$data['title']?>">
                <input type="hidden" id="hidden" name="post" value="">
                <?php $csrf_token = $_SESSION['token'] = md5(rand(999,10000)); ?>
                <input type="hidden" id="hidden" name="token" value="<?=$csrf_token?>">
                 </div>
            <div class="col-md-6">
                <label for="select"><h1>Kateqoriya:</h1></label>
                <br>
                <select name="category" id="select" >
                    <?php foreach($menu as $category):?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tags"><h1>Teqlər:</h1></label><br>
                <input type="text" name="tags" id="tags">
            </div>
            <div class="new-post col-md-12">
                <h1>Məqalə</h1>
                <div id="editor">
                    <?=$data['post']?>
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