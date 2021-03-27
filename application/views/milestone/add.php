<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Content</div>
            </div>
            <form action="<?= base_url() ?>milestone/save" method="post">
                <div class="portlet-body">
                    <div class="control-group">
                        <span class=""> 
                            <label class="control-label" style="float:left;width:120px;">Tahun :</label>  
                            <div class="input-append date date-picker-year">
                                <input size="10" type="text" value="<?php echo isset($dataRow[0]['year']) ? $dataRow[0]['year'] : '' ?>" readonly class="m-wrap" name="year">
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>
                        </span>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Kota</label>
                        <div class="controls">
                            <textarea id="town" name="town" rows="4" cols="50"><?php echo isset($dataRow[0]['town']) ? $dataRow[0]['town'] : '' ?></textarea>
                            <span class="help-inline" style="color:red;font-weight:bold">(ex : Jakarta | Batam)</span>
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
<script type="text/javascript">
    $(document).ready(function () {
        FormComponents.init();
        
        $('.date-picker-year').datepicker({
            rtl : App.isRTL(),
            format: 'yyyy',
            minViewMode: 2

        });
    });
</script> 
