<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Login | OFON</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<?php				 
		$this->load->view("util/globalCss");
	?>
	<link href="<?=base_url()?>assets/metronic/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<body class="login"> 
	<div class="logo">
		<!--<img src="<?=base_url()?>assets/metronic/img/dmsolidwood-logo-big.png" alt="" />--> 
	</div>
	<div class="content"> 
		<form class="form-vertical login-form" action="#" id="form_login">
			<h3 class="form-title">Login to your account</h3>
			<div class="alert alert-error hide">
				<button class="close" data-dismiss="alert"></button>
				<span class="message"></span>
			</div>
			<div class="control-group"> 
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-user"></i>
						<input class="m-wrap placeholder-no-fix" type="text" placeholder="Username" name="username"/>
					</div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="controls">
					<div class="input-icon left">
						<i class="icon-lock"></i>
						<input class="m-wrap placeholder-no-fix" type="password" placeholder="Password" name="password"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn blue pull-right">Login <i class="m-icon-swapright m-icon-white"></i></button>            
			</div> 
		</form>      
	</div>
	<div class="copyright">
		2019 &copy; OFON.
	</div>
	<?php				 
		$this->load->view("util/globalJs");
	?>
	<script src="<?=base_url()?>assets/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/metronic/scripts/app.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/metronic/scripts/login-soft.js" type="text/javascript"></script>
	<script>
		var base_url = "<?php echo base_url(); ?>";
		jQuery(document).ready(function() {
		  	//App.init();
		  	Login.init();
		});
	</script>
</body> 
</html>