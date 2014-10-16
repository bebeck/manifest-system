<link rel="stylesheet" type="text/css" href="<?=base_url('style/css/login-style.css')?>">

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
           <div class="account-wall">
                <img class="profile-img" src="<?=base_url('asset/images/icon-photo.png')?>"alt="">
                <div class="form-signin">
                <input type="text" class="form-control username" placeholder="Username" name="login"  required autofocus>
                <input type="password" class="form-control password" placeholder="Password" name="password" required>
                <p class="danger error">Username or password incorrect</p>
                <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block submit-form" value="Sign in">                    
                </div>
            </div>          
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
    $('.submit-form').click(function(){
        username = $('.username').val();
        password = $('.password').val();
        $('.error').hide();

        $.ajax({
            url: '<?=base_url('login')?>',
            type: 'post',
            data: {'username': username, 'password': password},
            dataType: 'json',
            success: function(data){
                if(data.status == 1) {
                    $('.error').show();
                } else {
                    window.location = data.redirect;
                }
            }
        })
    })
})
</script>