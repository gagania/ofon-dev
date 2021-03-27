<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>
<br/>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption"><i class="icon-question-sign"></i>Edit Blog</div>
            </div>
            <form action="<?=base_url()?>article_admin/save" method="post" enctype="multipart/form-data">
            <div class="portlet-body">
                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Article Name</label>
                        <div class="controls">
                            <input type="text" id="artc_name" name="artc_name" value="<?php echo isset($dataRow[0]['artc_name']) ? $dataRow[0]['artc_name'] : '' ?>" class="m-wrap medium" placeholder="article name">
                            <!--<img src="<?=base_url()?>assets/starhotel/images/indonesia_flag.png" style="margin-top:8px;width:20px"/>-->
                            <span class="help-inline"></span>
                        </div>
                </div>
<!--                <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;"></label>
                        <div class="controls">
                            <input type="text" id="artc_name_en" name="artc_name_en" value="<?php echo isset($dataRow[0]['artc_name_en']) ? $dataRow[0]['artc_name_en'] : '' ?>" class="m-wrap medium" placeholder="article name">
                            <img src="<?=base_url()?>assets/starhotel/images/en_flag.png" style="margin-top:8px;width:20px"/>
                            <span class="help-inline"></span>
                        </div>
                </div>-->
                <div class="control-group">
                    <label  class="control-label" style="float:left;width:120px;">Category</label>
                      <div class="controls">
                        <select id="artc_ctgr_id" name="artc_ctgr_id">
                            <option value="">-- Choose one --</option>
                            <?php if ($category) {
                                $selected = '';
                                foreach($category as $index => $value) {
                                    if (isset($dataRow[0]['artc_ctgr_id'])) {
                                        if ($dataRow[0]['artc_ctgr_id'] == $value['id']) {
                                            $selected = 'selected=selected';
                                        } else {
                                            $selected = '';
                                        }
                                    }
  ?>
                                    <option value="<?=$value['id']?>" <?=$selected?>><?=$value['artc_ctgr_name']?></option>
                            <?php  }
                            }
                            ?>
                        </select>
                        </div>
                </div>
                <div class="control-group">
                    <span class=""> 
                        <label class="control-label" style="float:left;width:120px;">Date :</label>  
                            <div class="input-append date date-picker">
                                <input size="10" id="artc_date" name="artc_date" type="text" value="<?php echo isset($dataRow[0]['artc_date']) ? $dataRow[0]['artc_date'] : '' ?>" readonly class="m-wrap" name="article date">
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>
                    </span>
                </div> 
                <div class="control-group">
                    <span class=""> 
                        <label class="control-label" style="float:left;width:120px;">Tag :</label>  
                        <input id="artc_tag" name="artc_tag" type="text" value="<?php echo isset($dataRow[0]['artc_tag']) ? $dataRow[0]['artc_tag'] : '' ?>" class="m-wrap" name="article tag">
                    </span>
                </div> 
                <div class="control-group">
                    <span class=""> 
                        <label class="control-label" style="float:left;width:120px;">Foreword :</label>  
                        <textarea id="artc_foreword" name="artc_foreword"><?php echo isset($dataRow[0]['artc_foreword']) ? $dataRow[0]['artc_foreword'] : '' ?></textarea>
                    </span>
                </div> 
                <div class="control-group">
                    <span class=""> 
                        <label class="control-label" style="float:left;width:120px;">Allow Comment</label>  
                        <div class="controls"> <?php $check = '';
                                if (isset($dataRow[0]['allow_comment'])){
                                    if ($dataRow[0]['allow_comment'] == 'Y') {
                                        $check = 'checked="checked"';
                                    }
                                }
                                    ?>
                                <input type="checkbox" name="allow_comment" value="Y" <?=$check?>>
                        </div>
                    </span>
                </div>
                <div class="control-group">
                    <label class="control-label" style="float:left;width:120px;">Image Upload</label>
                    <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <?php if (isset($dataRow[0]['artc_image_path']) && $dataRow[0]['artc_image_path'] != '') {?>
                                    <img src="<?php echo isset($dataRow[0]['artc_image_path']) ? base_url().$dataRow[0]['artc_image_path'] : ''?>" alt="" />
                                    <?php } else {?>
                                    <img src="<?php echo base_url().'assets/metronic/img/no_image.gif'?>" alt="" />
                                    <?php }?>
                                    
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                    
                                </div>
                                <div style="margin-left:16%">
                                    <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" id="artc_image" name="artc_image"/></span>
                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                    </div>
<!--                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input">
                                    <i class="icon-file fileupload-exists"></i> 
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file">
                                    <span class="fileupload-new">Pilih gambar</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default"  id="rsrc_dir_image" name="rsrc_dir_image" multiple='multiple'/>
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>-->
                </div>
<!--                <div class="control-group">
                    <label class="control-label" style="float:left;width:140px;">Attach File</label>									 
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input">
                                    <i class="icon-file fileupload-exists"></i> 
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file">
                                    <span class="fileupload-new">Pilih File</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" class="default" id="artc_attch_file" name="artc_attch_file" multiple='multiple'/>
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                    </div> 
                </div>-->
                <?php //if (isset($dataRow[0]['artc_file_name'])) {?>
<!--                <div class="control-group">
                    <label class="control-label" style="float:left;width:140px;">Latest Attachment</label>									 
                    <div class="controls">
                        <?php echo $dataRow[0]['artc_file_name'];?>
                        <br/>
                    </div> 
                </div>-->
                <?php //} ?>
<!--                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">

                                <label class="control-label">Edit Content : 
                                    <img src="<?=base_url()?>assets/starhotel/images/en_flag.png" style="margin-top:8px;width:20px"/></label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="artc_desc_en" name="artc_desc_en" rows="6"><span class="test"><?php echo isset($dataRow[0]['artc_desc_en']) ? $dataRow[0]['artc_desc_en']:''; ?></span> </textarea>
                                </div>
                            </div> 
                        </div>  
                    </div> 
                </div>-->
                <div class="accordion scrollable" id="accordion2">  
                    <div class="accordion-group"> 
                        <div class="accordion-inner">  
                            <div class="control-group">

                                <label class="control-label">Edit Content : 
                                    <!--<img src="<?=base_url()?>assets/starhotel/images/indonesia_flag.png" style="margin-top:8px;width:20px"/></label>-->
                                <div class="controls">
                                    <textarea class="span12 ckeditor m-wrap company_content" id="artc_desc" name="artc_desc" rows="6"><span class="test"><?php echo isset($dataRow[0]['artc_desc']) ? $dataRow[0]['artc_desc']:''; ?></span> </textarea>
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
                <input type="hidden" id="artc_author_alias" name="artc_author_alias" value="<?php echo isset($dataRow[0]['artc_author_alias']) ? $dataRow[0]['artc_author_alias'] : '' ?>"/>
            </div>
            </form>
        </div>
    </div>
<!--list comments-->
<div class="">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption"><i class="icon-globe"></i>Comments</div>
        </div>
        <div class="portlet-body">
            <div class="clearfix">
                <div class="btn-group">
                    <button class="btn green" onclick="javascript:delete_comment('<?= base_url() ?>','<?php echo $this->router->fetch_class();?>');">
                        Delete <i class="icon-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row-fluid">
                <div class="">
                    <div class="dataTables_filter">
                        <label>Search: <input type="text" id="search_desc" name="search_desc" onkeyup="javascript:searchdata('comment_article_list','<?=base_url()?>','<?php echo $this->router->fetch_class();?>',this);" class="m-wrap small"></label>
                    </div>
                </div>
            </div>
            <table style="table-layout:fixed" class="table table-striped table-bordered table-hover table-full-width" id="comment_article_list">
                <thead>
                    <tr>
                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>publish</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($comments)) {
                        foreach ($comments as $indexCmmn => $valueCmn) {
                            ?>
                            <tr class="odd gradeX" >
                                <td><input type="checkbox" class="delcheckcmmn" value="<?php echo $valueCmn['id']; ?>" /></td>
                                <td style="word-wrap: break-word"><?php echo $valueCmn['cmmn_name']; ?></td>
                                <td style="word-wrap: break-word"><?php echo isset($valueCmn['cmmn_email']) ? $valueCmn['cmmn_email'] : ''; ?></td>
                                <td style="word-wrap: break-word"><?php echo isset($valueCmn['cmmn_desc']) ? $valueCmn['cmmn_desc']:''; ?></td>
                                <td><?php echo isset($valueCmn['cmmn_date']) ? $valueCmn['cmmn_date']:''; ?></td>
                                <td id="cmmn_row_<?=$valueCmn['id']?>">
                                    <?php if ($valueCmn['cmmn_publish'] == 0) { //not publish ?>
                                        <button class="btn green" onclick="javascript:publish_comment('<?= base_url() ?>','<?php echo $this->router->fetch_class();?>',<?php echo $valueCmn['id']; ?>,'1');">
                                        Publish 
                                    </button>
                                    <?php } else{ ?>
                                        <button class="btn green" onclick="javascript:publish_comment('<?= base_url() ?>','<?php echo $this->router->fetch_class();?>',<?php echo $valueCmn['id']; ?>,'0');">
                                        UnPublish 
                                    </button>
                                    <?php } 
                                        ?>
                                        
                                    
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <div style="width:100%">
                <div style="width:20%;margin:0 auto;">
                <table class="footer-table">
                    <tbody>
                        <tr>
                            <td><button onclick="updatelist('comment_article_list', '<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','first');" class="btn-first" type="button">&nbsp;</button></td>
                            <td><button onclick="updatelist('comment_article_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','prev');" class="btn-prev" type="button">&nbsp;</button></td>
                            <td><span class="ytb-sep"></span></td>
                            <td><span class="ytb-text">Page</span></td>
                            <td><input type="text" onkeyup="updatelist('comment_article_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','page', this.value);" size="3" value="<?php echo (isset($pnumber)) ?$pnumber :1;?>" class="pnumber"></td>
                            <td><span class="ytb-text" id="totaldata_view">of <?php echo (isset($totaldataComments)) ? round($totaldataComments/10):'0'?></span></td>
                            <td><span class="ytb-sep"></span></td>
                            <td><button onclick="updatelist('comment_article_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','next');" class="btn-next" type="button">&nbsp;</button></td>
                            <td><button onclick="updatelist('comment_article_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','last');" class="btn-last" type="button">&nbsp;</button></td>
                            <td>
                                <input type="hidden" id="limit" name="limit" value="0"/>
                                <input type="hidden" id="totaldata" name="totaldataComments" value="<?php echo (isset($totaldataComments)) ? $totaldataComments:'0'?>"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
<?php                
    $this->load->view("util/formJs");
    $this->load->view("util/formCss");
?>
<!--<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />-->
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        FormComponents.init();
    });
</script> 