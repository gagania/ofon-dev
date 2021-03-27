<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Content</div>
            </div>
            <form action="<?=base_url()?>author/save" method="post" enctype="multipart/form-data">
            <div class="portlet-body">
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Name</label>
                        <div class="controls">
                            <input type="text" id="author_name" name="author_name" value="<?php echo isset($dataRow[0]['author_name']) ? $dataRow[0]['author_name'] : '' ?>" class="m-wrap medium" placeholder="name">
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Author Type</label>
                        <div class="controls">
                            <input type="text" id="author_type" name="author_type" value="<?php echo isset($dataRow[0]['author_type']) ? $dataRow[0]['author_type'] : '' ?>" class="m-wrap medium" placeholder="type">
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                    <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                    <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                </div>
            </div>
            </form>
        </div>  
    </div>
</div>
<?php                
    $this->load->view("util/formJs");
    $this->load->view("util/formCss");
    
?>
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        FormComponents.init();
    });
</script> 
