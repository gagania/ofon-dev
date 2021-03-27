<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Contact Us</div>
            </div>
            <div class="portlet-body form">
                <form action="<?= base_url() ?>contact/save" id="form_input" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="name" value="<?= $content_data[0]['name'] ?>" placeholder="Contact Name">
                        </div>
                    </div>	
                    <div class="control-group">
                        <label class="control-label">Telp</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="telp" value="<?= $content_data[0]['telp'] ?>" placeholder="telp">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Fax</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="fax" value="<?= $content_data[0]['fax'] ?>" placeholder="fax">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">WhatsApp</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="whatsapp" value="<?= $content_data[0]['whatsapp'] ?>" placeholder="No WhatsApp">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label">BBM</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="blackberry" value="<?= $content_data[0]['blackberry'] ?>" placeholder="PIN BBM">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="twitter" value="<?= $content_data[0]['twitter'] ?>" placeholder="Url Twitter">
                        </div>
                    </div><div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="facebook" value="<?= $content_data[0]['facebook'] ?>" placeholder="Url Facebook">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Youtube</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="youtube" value="<?= $content_data[0]['youtube'] ?>" placeholder="Url Youtube">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Instagram</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="instagram" value="<?= $content_data[0]['instagram'] ?>" placeholder="Url Instagram">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input class="span6 m-wrap" type="text" name="email" value="<?= $content_data[0]['email'] ?>" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Building Location</label>
                        <div class="controls">
                            <textarea class="span6 m-wrap" type="text" name="building_location" value="<?= $content_data[0]['building_location'] ?>" placeholder="Building Location"><?= $content_data[0]['building_location'] ?></textarea>
                        </div>
                    </div>                      
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <textarea class="span6 m-wrap" type="text" name="address" value="<?= $content_data[0]['address'] ?>" placeholder="Address"><?= $content_data[0]['address'] ?></textarea>
                        </div>
                    </div>                      
                    <div class="control-group">
                        <label class="control-label">Company Profile</label>
                        <div class="controls fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input">
                                    <i class="icon-file fileupload-exists"></i> 
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file">
                                    <span class="fileupload-new">Pilih File</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" id="compro_file" name="compro_file"/>
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>                      
                        <div class="form-actions" style="text-align:center; padding-left: 0px;">
                            <div class="" style="text-align:center">
                                <button type="submit" class="btn blue">Save</button>
                            </div>
                        </div>
                    </div>  
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
