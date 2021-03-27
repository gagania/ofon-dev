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
                <div class="col-md-4">  
                    <h2 class="lined-heading"><span>Events Category</span></h2>
                    <div class="control-group">
                        <div class="controls" style="width:100%;display:inline-block; vertical-align:top; overflow:hidden;">
                            <form action="<?=base_url()?>events/index" method="post">
                                <select id="event_ctgr" onclick="this.form.submit()" name="event_ctgr" tabindex="1" style="width:100%;padding:10px;" multiple="true" class="medium m-wrap">
                                <option value="">All Category</option>
                                <?php 
                                $selected='';              

                                foreach($eventCtgr as $index => $value) { ?>
                                    <option value="<?=$value['id']?>" <?php echo $selected;?>><?=$value['event_ctgr_name']?></option>
                                <?php }?>
                            </select>
                            </form>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                </div>
              </aside>
              <aside class="mt50">
                <div class="col-md-8"> 
                  <!-- Widget: Text -->
                  <div class="widget"> 
                      <h2 class="lined-heading"><span>Events</span></h2>
                      
                        <!-- Article Image-->
                        <?php $this->load->view($content); ?>
                             
                  </div>
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