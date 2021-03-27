<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-yellow">
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Akun Login</h3>
                </div>
                <div class="box-footer">
                    <form id=form_ganti_passs" name="form_ganti_passs" class="form-horizontal" method="post" action="<?= base_url() ?>user/change_pass">
                        <div class="form-group">
                            <label class="col-lg-4">Password Lama</label>
                            <div class="col-lg-12">
                                <input type="password" id="user_pass_old" name="user_pass_old" value="" class="form-control" required="required" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4">Password Baru</label>
                            <div class="col-lg-12">
                                <input type="password" id="user_pass" name="user_pass" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-lg-6">Ulangi Password Baru</label>
                            <div class="col-lg-12">
                                <input type="password" id="user_pass_retype" name="user_pass_retype" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <!--<input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]->id) ? $dataRow[0]->id : '' ?>"/>-->
                            <button class="btn btn-primary" type="submit">Ganti Password <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>        
    $(document).ready(function(){
       
    });
    var validate = false;
    function change_pass() {
            
            if ($("#user_pass").val() !== $("#user_pass_retype").val()) {
                alert("Password Tidak sama");
                validate = false;
            } else {
                validate = true;
            }
            
            if (validate) {
                document.getElementById('form_ganti_passs').submit();
            }
        }
</script>