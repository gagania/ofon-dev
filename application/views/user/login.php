<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>My Ofon</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=base_url()?>assets/lte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>My</b> Ofon
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg ">Login</p>
        <div class="alert alert-error hide"> 
            <button class="close" data-dismiss="alert"></button>
            <span class="message"></span>
        </div>
        <form class="login-form" action="<?=base_url().$this->router->fetch_class();?>/login" id="form_login" method="post">
          <div class="form-group has-feedback">
            <input type="text" id="cstm_name" name="cstm_name" class="form-control form_input" placeholder="User name" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="cstm_pass" name="cstm_pass" class="form-control form_input" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="button" onclick="submit_form()" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/lte/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
    <script>
        var base_url = "<?=base_url();?>";
        $('.form_input, #modules').keypress(function (e) {
            if (e.which == 13) {
                submit_form();
            }
        });
        function submit_form(){ 
            var validate = true;
            $('.alert').addClass('hide');
            var username = $('#cstm_name').val();
            var password = $('#cstm_pass').val();
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
            
            if (username === '' && password === '') {
                $('.alert').removeClass('hide');
                $('.message').html('Mohon isi semua data.');
                validate = false;
            }
            if(validate){
                $("#form_login").submit();
//                $.ajax({
//                    type : "POST",
//                    url  : base_url+<?=$this->router->fetch_class()?>+"/login",
//                    data : $('#form_login').serialize(),
//                    datatype: "json",
//                    success: function(data){ 
//                    console.log(data);
//                        if(data['success']){
//                            window.location = base_url+<?=$this->router->fetch_class()?>;
//                        }else if(!data['success']){
//                            $('.alert').removeClass('hide');
//                            $('.message').html('Username dan password salah.');
//                        }
//                    }
//                });
            }
        }
    </script>
  </body>
</html>
