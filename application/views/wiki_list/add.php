<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i><?=$title?></div>
            </div>
            <form action="<?=base_url()?>wiki_list/save" method="post">
            <div class="portlet-body">
                 <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Title</label>
                        <div class="controls">
                            <input type="text" id="wiki_name" name="wiki_name" value="<?php echo isset($dataRow[0]['wiki_name']) ? $dataRow[0]['wiki_name'] : '' ?>" class="m-wrap medium" placeholder="category name">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                <label class="control-label">Description : </label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="wiki_desc" name="wiki_desc" rows="6"><span class="test"><?php echo isset($dataRow[0]['wiki_desc']) ? $dataRow[0]['wiki_desc']:''; ?></span> </textarea>
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