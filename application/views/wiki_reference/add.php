<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i><?=$title?></div>
            </div>
            <form action="<?=base_url()?>wiki_reference/save" method="post">
            <div class="portlet-body">
                 <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">No.</label>
                        <div class="controls">
                            <input type="text" id="number" name="number" value="<?php echo isset($dataRow[0]['number']) ? $dataRow[0]['number'] : '' ?>" class="m-wrap" style="width:30px" placeholder="">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                <label class="control-label">Description : </label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="ref_desc" name="ref_desc" rows="6"><span class="test"><?php echo isset($dataRow[0]['ref_desc']) ? $dataRow[0]['ref_desc']:''; ?></span> </textarea>
                                </div>
                                <br>
                            </div> 
                        </div>  
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
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/ckeditor/ckeditor.js"></script>