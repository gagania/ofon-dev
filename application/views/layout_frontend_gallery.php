<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">

<?php include('css-javascript.php') ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.<?=base_url()?>assets/starhotel/js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="pattern-1">
    <div style="background-color: #fff;"> 
        <?php include('header-itclrc.php') ?>
        <?php include('menu-frontend.php') ?>
        <div class="container" style="z-index: 200">
            <div class="row">
              <aside class="mt50">
                <div class="col-md-8"> 
                  <!-- Widget: Text -->
                  <div class="widget"> 
                  <br>
                      <h2 class="lined-heading"><span>GALLERY</span></h2>
                        <!-- Article Image-->
                        <?php $this->load->view($content); ?>
                  </div>
                </div>
              </aside>
              <aside class="mt50">
                <div class="col-md-4">                  
                    <?php //include('event-list.php'); ?>
                </div>
              </aside>
            </div>
        </div>
        <!-- footer -->
        <?php include('footer.php') ?>

        <!-- Go-top Button -->
        <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
    </div>
</body>
</html>