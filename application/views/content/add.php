<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Content</div>
            </div>
            <form action="<?=base_url()?>content/save" method="post">
            <div class="portlet-body">
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Menu</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <?=$menuList?>
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Written By</label>
                        <div class="controls">
                            <input type="text" id="written_by" name="written_by" value="<?php echo isset($dataRow[0]['written_by']) ? $dataRow[0]['written_by'] : '' ?>" class="m-wrap medium" placeholder="written by">
                            
                            <span class="help-inline"></span>
                        </div>
                </div>
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                
                                <label class="control-label">Edit Content : </label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="content_data" name="content_data" rows="6"><span class="test"><?php echo isset($dataRow[0]['content_data']) ? $dataRow[0]['content_data']:''; ?></span> </textarea>
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
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">
    function preview(){
        var content = $('textare#company_content').val();
        alert(content);
//        alert(content);
//        $.ajax({
//               url : baseUrl+controllerName+"/"+functionName,
//               type: "POST",
//               dataType:'json',
//               data : {
//                   dataDelete : dataDelete
//
//            //                asrs_data:JSON.stringify(data_tables)
//                   },
//               success: function(data){
//
//                   if (data['success']) {
//                       alert(data['message']);
//                       window.location.replace(baseUrl+data['url']);
//                   }
//
//               }
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
