<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>

<section class="parallax-effect">
  <div id="parallax-pagetitle" style="background-image: url(<?=base_url()?>assets/starhotel/images/parallax/parallax-01.jpg);">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li class="active">Company Profile</li>
            </ol>
            <h1>Company Profile</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div style="width: 70%; margin: 50px auto; min-height: 300px;">
    <?php echo $content_data_company[0]['content']; ?>
</div>

