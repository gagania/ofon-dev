<div class="profile-drawer" style="display:none;right:0px;">
    <div class="profile-drawer__header">
        <div class="profile-drawer__title">Login</div>
        <label class="profile-drawer__close-button" for="nav-profile-drawer">
                <img src="<?=base_url()?>assets/themes/img/profile-drawer__btn-close.svg" alt="" onclick="show_login()">
        </label>
    </div>
    <div class="profile-drawer__body-guest-login">
        <!--<div class="profile-drawer__login-form-title">Login and make your travel memorable</div>-->
        <div class="hr"></div>
        <div class="alert alert-error hide"> 
            <button class="close" data-dismiss="alert"></button>
            <span class="message"></span>
        </div>
        <div class="profile-drawer__login-form">
            <form id="form_login_sidebar" method="post" action="<?=base_url()?>user/login">
                <input placeholder="cstm_name" class="input" type="text" name="cstm_name" id="cstm_name">
                <input placeholder="Password" autocomplete="off" class="input" type="password" name="cstm_pass" id="cstm_pass">
                <input type="button" name="commit" value="Login" onclick="submit_form()" class="submit" data-disable-with="Login">
            </form>
        </div>
    </div>

    <div class="profile-drawer__login-form__other">
        <div class="oauth">

        </div>
            <a class="forgot-password" href="/reset">Forgot Password?</a>
            <div class="hr"></div>
        <div class="not-have-account">Don’t have account ? <a href="/register">SIGN UP</a></div>
    </div>
</div>
<script>
        var base_url = "<?=base_url();?>";
        $('.form_login_sidebar').keypress(function (e) {
            if (e.which == 13) {
                submit_form();
            }
        });
        function submit_form(){ 
            var validate = true;
            $('.alert').addClass('hide');
            var username = $('#cstm_name').val();
            var password = $('#cstm_pass').val();
            if (username === '' && password === '') {
                $('.alert').removeClass('hide');
                $('.message').html('Mohon isi semua data.');
                validate = false;
            } else {
                if (username === '') {
                    $('.alert').removeClass('hide');
                    $('.message').html('');
                    $('.message').html('Mohon isi User Name.');
                    validate = false;
                }
                if (password === '') {
                    $('.alert').removeClass('hide');
                    $('.message').html('');
                    $('.message').html('Mohon isi password.');
                    validate = false;
                }
            }
            
            if(validate){
                $("#form_login_sidebar").submit();
            }
        }
    </script>
