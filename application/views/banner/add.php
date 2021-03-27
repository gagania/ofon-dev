<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Banner</div>
            </div>
            <form action="<?=base_url()?>banner/save" method="post" enctype="multipart/form-data">
            <div class="portlet-body">
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Description</label>
                        <div class="controls">
                            <textarea class="span6 m-wrap" id="desc" name="desc" rows="6"><?php echo isset($dataRow[0]['desc']) ? trim($dataRow[0]['desc']):''; ?></textarea>
                            <span class="help-inline" style="color:red;font-weight:bold">(Tambahkan koma untuk memisahkan deskripsi)</span>
                        </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="float:left;width:120px;">Image</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if (isset($dataRow[0]['image_path']) && $dataRow[0]['image_path'] != '') { ?>
                                    <img src="<?php echo isset($dataRow[0]['image_path']) ? base_url() . $dataRow[0]['image_path'] : '' ?>" alt="" />
                                <?php } else { ?>
                                    <img src="<?php echo base_url() . 'assets/metronic/img/no_image.gif' ?>" alt="" />
                                <?php } ?>

                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                            </div>
                            <div style="margin-left:16%">
                                <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" id="banner_image" name="banner_image"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-actions">
                    <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                    <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                    <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                </div>
                </form>
            </div>
        </div>  
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript">
    $(document).ready(function() {
//        FormComponents.init();
    });
</script> 
