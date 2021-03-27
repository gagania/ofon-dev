<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Add Link</div>
            </div>
            <form action="<?=base_url()?>link/save" method="post" enctype="multipart/form-data">
            <div class="portlet-body">
                <div class="control-group">
                    <label class="control-label" style="float:left;width:140px;">Link Image</label>
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if (isset($dataRow[0]['link_file_path']) && $dataRow[0]['link_file_path'] != '') {?>
                                <img src="<?php echo isset($dataRow[0]['link_file_path']) ? base_url().$dataRow[0]['link_file_path'] : ''?>" alt="" />
                                <?php } else {?>
                                <img src="<?php echo base_url().'assets/metronic/img/no_image.gif'?>" alt="" />
                                <?php }?>

                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                            </div>
                            <div style="margin-left:18%">
                                <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" class="default" id="link_image" name="link_image"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" style="float:left;width:140px;">Url</label>
                    <div class="controls">
                        <input type="text" id="link_url" name="link_url" value="<?php echo isset($dataRow[0]['link_url']) ? $dataRow[0]['link_url'] : '' ?>" class="m-wrap medium" placeholder="name">
                        <span class="help-inline"></span>
                    </div>
                </div>
                <div class="control-group">

                    <center>
                        <button type="submit" class="btn green save">Save</button>
                        <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                    </center>

                </div> 
                <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                <input type="hidden" id="link_file_path_old" name="link_file_path_old" value="<?php echo isset($dataRow[0]['link_file_path']) ? $dataRow[0]['link_file_path'] : '' ?>"/>
            </div>
            </form>
        </div>  
    </div>
</div>
<?php                
    $this->load->view("util/formJs");
    $this->load->view("util/formCss");
?>
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript">
    $(document).ready(function() {
        FormComponents.init();
    });
</script> 
