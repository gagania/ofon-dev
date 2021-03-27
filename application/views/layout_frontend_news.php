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
                  <!-- Widget: Text -->
                  <div class="widget">
                      <h2 class="lined-heading"><span>News List</span></h2>
                      <table class="table table-striped mt30">
                          <tbody>
                            <?php if ($newsData) {
                                  foreach ($newsData as $key => $value) { ?>
                                  <tr>
                                    <td> 
                                      <i class="fa  fa-calendar"></i>
                                    </td>
                                    <td>
                                      <a href="<?=base_url()?>news/page/<?=$value['news_alias']?>"> <?=$value['news_title'];?>  ...</a>
                                      <p>
                                        <i class="fa  fa-clock-o"></i> <?=date("D M d", strtotime($value['news_date']))?>
                                      </p>
                                    </td>
                                  </tr>
                                  <?php

                                  }
                            }
                            ?>  
                          </tbody>
                        </table> 
                  </div>
                </div>
              </aside>
              <aside class="mt50">
                <div class="col-md-8"> 
                  <!-- Widget: Text -->
                  <div class="widget"> 
                      <!--<h2 class="lined-heading bounceIn appear" data-start="800"><span>News</span></h2>-->
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