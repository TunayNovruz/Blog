$(document).ready(function () {
    $("#send_comment").click(function(){
        var ad = $('#ad').val();
        var email = $('#mail').val();
        var comment = $('#txa').val();
        var token = $('#token').val();
        var post_id = $('#post_id').val();
        var captcha = $('#captcha_text').val();

        var div = document.createElement("div");
        div.innerHTML = comment;
        comment = div.textContent || div.innerText || "";

        var error = 0;
        if(ad.trim()=== '' || ad.length < 3){
            error =1;
            $('#ad_error').show(1000,function () {
                $('#ad_error').delay(3000).hide(1000);
            });
        }
        if(email.trim() ==='' || !validateEmail(email) ){
            error =1;
            $('#email_error').show(1000,function () {
                $('#email_error').delay(3000).hide(1000);
            });
        }
        if(comment.trim()===''){
            error =1;
            $('#comment_error').show(1000,function () {
                $('#comment_error').delay(3000).hide(1000);
            });
        }
        if(token==='' || token.length<32) error =1;
        if(captcha.trim()==='' || captcha.length!=5) {
            error =1;
            $('#captcha_error').show(1000,function () {
                $('#captcha_error').delay(3000).hide(1000);
            });
            error=1;
        }
        if(error === 0){
            $.post("/ajax/comment",
                {
                    name: ad,
                    email: email,
                    comment:comment,
                    comment_token:token,
                    id:post_id,
                    captcha:captcha
                },
                function(data, status){
                    if(data==1) location.reload();
                    else if(data==0) alert('Bütün sahələri yenidən yoxlayın');
                    else if(data==-1) alert('Texniki problem yaşandı,birazdan birdə yoxlayın');
                });
        }
    });
    $(".sil_comment").click(function () {
        var id = $(this).data('target');
        if(confirm('Silmək istədiyinizdən əminsiniz?')){
            $.post("/admin/comment_sil",
                {
                    id:id
                },
                function(data, status){
                    if(data==1) location.reload();
                    else alert('Birazdan birdə yoxlayın');
                    });
        }
    });
    $(".message_sil").click(function () {
        var id = $(this).data('target');
        if(confirm('Silmək istədiyinizdən əminsiniz?')){
            $.post("/admin/message_sil",
                {
                    id:id
                },
                function(data, status){
                    if(data==1) location.reload();
                    else alert('Birazdan birdə yoxlayın');
                    });
        }
    });
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

});

function captcha(topic) {
    $.post("/captcha",
        {
            topic:topic
        },
        function(data, status){
            if (status=='success'){
                var img = document.createElement("img");
                img.src = '/'+data;
                img.style="z-index:33;";
                document.getElementById('captcha').appendChild(img);
            }
        });
}