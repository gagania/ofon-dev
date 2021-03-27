<br/>
<!--<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Preview Company Profile</div>
            </div>
            <div class="portlet-body">
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                <span class="preview_content"><?php echo $content_data[0]['content']; ?> </span>
                            </div> 
                        </div>  
                    </div> 
                </div>
            </div>
        </div>  
    </div>
</div>-->

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Company Profile</div>
            </div>
            <div class="portlet-body">
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">
                                <form action="<?=base_url()?>company/save" method="post">
                                    <label class="control-label">Edit Content : </label>
                                    <div class="controls">
                                        <textarea class="span12 ckeditor m-wrap company_content" id="company_content" name="content" rows="6"><span class="test"><?php echo $content_data[0]['content']; ?></span> </textarea>
                                    </div>
                                    <br>
                                    <center>
                                        <!--<button type="button" class="btn blue preview" onclick="preview()">Preview</button>-->
                                        <button type="submit" class="btn green save">Save</button>
                                        <!--<button type="button" class="btn red clear" onclick="clear_content()">Clear</button>--> 
                                    </center>
                                </form>
                            </div> 
                        </div>  
                    </div> 
                </div>
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
