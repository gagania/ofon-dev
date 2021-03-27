<script type="text/javascript" src="<?=base_url()?>assets/application.js"></script>
<div class="row-fluid" style="padding-top:20px;">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <form method="post" action="<?= base_url() ?>faq_admin/save" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Kategori</label>
                        <div class="controls">
                            <select id="faq_ctgr" name="faq_ctgr" tabindex="1" class="medium m-wrap">
                                <?php 
                                $selected='';
                                foreach($category as $index => $value) { 
                                    if (isset($dataRow[0]['faq_ctgr'])) {
                                        if ($dataRow[0]['faq_ctgr'] == $index) {
                                            $selected = "selected=selected";
                                        } else {
                                            $selected = '';
                                        }
                                    }
                                ?>
                                    <option value="<?=$index?>" <?php echo $selected;?>><?=$value?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Pertanyaan</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <textarea id="faq_qstn" name="faq_qstn"><?php echo isset($dataRow[0]['faq_qstn']) ? $dataRow[0]['faq_qstn'] : '' ?></textarea>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" style="float:left;width:120px;">Jawaban</label>
                        <div class="controls" style="display:inline-block;width:250px;">
                            <textarea id="faq_answer" name="faq_answer"><?php echo isset($dataRow[0]['faq_answer']) ? $dataRow[0]['faq_answer'] : '' ?></textarea>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="id" name="id" value="<?php echo isset($dataRow[0]['id']) ? $dataRow[0]['id'] : '' ?>"/>
                        <button class="btn blue" type="submit"><i class="icon-ok"></i> Save</button>
                        <button class="btn" type="submit" id="btncancel" name="btncancel" value="Cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />