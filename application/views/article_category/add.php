<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Category</div>
            </div>
            <form action="<?=base_url()?>article_category/save" method="post">
            <div class="portlet-body">
                 <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Title</label>
                        <div class="controls">
                            <input type="text" id="artc_ctgr_name" name="artc_ctgr_name" value="<?php echo isset($dataRow[0]['artc_ctgr_name']) ? $dataRow[0]['artc_ctgr_name'] : '' ?>" class="m-wrap medium" placeholder="category name">
                            
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