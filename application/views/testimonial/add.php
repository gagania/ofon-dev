<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>
<div class="row-fluid" style="padding-top:20px;">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form method="post" action="<?= base_url() ?>testimonial/save" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Nama</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="tstm_name" name="tstm_name" value="<?php echo isset($dataRow[0]['tstm_name']) ? $dataRow[0]['tstm_name'] : '' ?>" class="m-wrap medium" placeholder="">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Jabatan</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <input type="text" id="tstm_position" name="tstm_position" value="<?php echo isset($dataRow[0]['tstm_position']) ? $dataRow[0]['tstm_position'] : '' ?>" class="m-wrap medium" placeholder="">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Testimonial</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <textarea id="tstm_desc" name="tstm_desc"><?php echo isset($dataRow[0]['tstm_desc']) ? $dataRow[0]['tstm_desc'] : '' ?></textarea>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Image</label>
                        <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if (isset($dataRow[0]['tstm_image_path']) && $dataRow[0]['tstm_image_path'] != '') { ?>
                                        <img src="<?php echo isset($dataRow[0]['tstm_image_path']) ? base_url() . $dataRow[0]['tstm_image_path'] : '' ?>" alt="" />
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . 'assets/metronic/img/no_image.gif' ?>" alt="" />
                                    <?php } ?>

                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                                </div>
                                <div style="margin-left:16%">
                                    <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input type="file" class="default" id="testimonial_image" name="testimonial_image"/></span>
                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                        <button class="btn blue" type="submit" ><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="button" onclick="javascript:cancelButton('<?=base_url()?>','menu');">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />