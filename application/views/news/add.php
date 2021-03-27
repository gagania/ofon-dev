<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Content</div>
            </div>
            <form action="<?=base_url()?>news/save" method="post">
            <div class="portlet-body">
                 <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Title</label>
                        <div class="controls">
                            <input type="text" id="news_title" name="news_title" value="<?php echo isset($dataRow[0]['news_title']) ? $dataRow[0]['news_title'] : '' ?>" class="m-wrap medium" placeholder="news title">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Written By</label>
                        <div class="controls">
                            <input type="text" id="news_written_by" name="news_written_by" value="<?php echo isset($dataRow[0]['news_written_by']) ? $dataRow[0]['news_written_by'] : '' ?>" class="m-wrap medium" placeholder="written by">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Published In</label>
                        <div class="controls">
                            <input type="text" id="news_published" name="news_published" value="<?php echo isset($dataRow[0]['news_published']) ? $dataRow[0]['news_published'] : '' ?>" class="m-wrap medium" placeholder="published in">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="control-group">
                    <span class=""> 
                        <label class="control-label" style="float:left;width:120px;">Date :</label>  
                            <div class="input-append date date-picker">
                                <input size="10" type="text" value="<?php echo isset($dataRow[0]['news_date']) ? $dataRow[0]['news_date'] : '' ?>" readonly class="m-wrap" name="news_date">
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>
                    </span>
                </div>  
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                
                                <label class="control-label">Edit Content : </label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="news_content" name="news_content" rows="6"><span class="test"><?php echo isset($dataRow[0]['news_content']) ? $dataRow[0]['news_content']:''; ?></span> </textarea>
                                </div>
                                <br>
                                <center>
                                    <!--<button type="button" class="btn blue preview" onclick="preview()">Preview</button>-->
                                    <button type="submit" class="btn green save">Save</button>
                                    <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                                    <!--<button type="button" class="btn red clear" onclick="clear_content()">Clear</button>--> 
                                </center>
                                
                            </div> 
                        </div>  
                    </div> 
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                </form>
            </div>
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
    function preview(){
        var content = $('textare#company_content').val();
 
            $('.preview_content').html(content);
//            });
//        alert('asd');
    }
    function save(){
        //alert('save');
    }
    function clear_content(){
        $('.test').text('');
        //alert('clear');
    }
</script> 
