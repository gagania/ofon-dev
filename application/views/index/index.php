<?php                
    $this->load->view("util/formJs");
    $this->load->view("util/formCss");
    
?>
<script src="<?=base_url()?>assets/jquery.validate.js"></script>
<script src="<?=base_url()?>assets/admin-dashboard.js"></script>

<div class="banner" style="text-align: center;">
    <!--<img src="<?=base_url()?>assets/metronic/img/workApps.png">-->
</div>
<input type="hidden" id="new_user" name="new_user" value="<?php echo isset($new_user) ? $new_user : ''?>"/>

<div id="new_password" class="modal hide fade" tabindex="" data-width="760">
    <div class="modal-header">
            <h3>Change Password</h3>
    </div>
    <form action="<?=base_url()?>user_admin/change_password" id="new_password_form" method="post">				
            <div class="modal-body">
                    <div class="row-fluid" style="padding-top:20px;">
                        <div class="span12">
                            <span class="span12">&nbsp;</span>
                            <div class="control-group span12">
                                <label class="control-label span3">New Password</label>
                                <div class="controls span9">
                                    <input type="password" id="user_pass" name="user_pass" class="span8 m-wrap">
                                </div>
                            </div>
                            <div class="control-group span12">
                                <label class="control-label span3">Retype Password</label>
                                <div class="controls span9">
                                    <input type="password" id="user_pass_retype" name="user_pass_retype" class="span8 m-wrap" onblur="javascript:checkpassword(this);">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" id="button" onclick="javascript:savenewpass('<?=base_url()?>');"class="btn blue">Save</button>
            </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        if($('#new_user').val() == '1'){ // new user please change password
            $('#new_password').removeAttr('class');
            $('#new_password').attr('class','modal fade in');
        }
    });
    
    function checkpassword(obj) {
        if ($("#user_pass").val() == '') {
            alert('Silahkan isi Password');
            $(obj).val('');
            return;
        }
        if ($(obj).val() != $("#user_pass").val()) {
            alert('Password tidak sama');
            $(obj).val('');
            return;
        }
    }
    
    function savenewpass(baseUrl) {
        $.ajax({
               url : baseUrl+"user_admin/change_password",
               type: "POST",
               dataType:'json',
               data : {
                   user_pass : $("#user_pass").val()
                   },
               success: function(data){
                   console.log(data);
                   if (data['message'] == 2) {
                       alert('Password tidak sama dengan yang ada di database.');
                   } else if (data['message'] == 1) {
                       alert('Ganti Password berhasil');
                        window.location.replace(baseUrl+"login/logout");
                   }

               }
            });
    }
</script>