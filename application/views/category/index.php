<script type="text/javascript" src="<?= base_url() ?>assets/application.js"></script>
<br/>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i><?php echo $title; ?></div>
            </div>
            <div class="portlet-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a class="btn green" data-toggle="modal" href="#add_category">Add New <i class="icon-plus"></i></a>
                    </div>
                    <div class="btn-group">
                        <button class="btn green" onclick="javascript:delete_menu('<?= base_url() ?>', '<?php echo $this->router->fetch_class();?>');">
                            Delete <i class="icon-plus"></i>
                        </button>
                    </div>
<!--                    <div class="btn-group"> 
                        <a class="btn green" data-toggle="modal" href="#upload_category">Upload Data kategori  <i class="icon-upload"></i></a>
                    </div>-->
                </div>
                <div class="row-fluid" >
                    <div style="float:right;">
                        <div class="dataTables_filter">
                            <label>Search: <input type="text" id="search_desc" name="search_desc" onkeyup="javascript:searchdata('category_list','<?=base_url()?>','<?php echo $this->router->fetch_class();?>',this);" class="m-wrap small"></label>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="category_list">
                    <thead>
                        <tr>
                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                            <th>Nama Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($dataList) {
                            foreach ($dataList as $index => $value) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="delcheck" value="<?php echo $value['id']; ?>" /></td>
                                    <td><a href="#add_category" class="edit-category" data-toggle="modal" data-id="<?= $value['id'] ?>" data-ctgr_name="<?= $value['ctgr_name'] ?>"><?php echo $value['ctgr_name']; ?></a></td>
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
                                <td><button onclick="updatelist('category_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','first');" class="btn-first" type="button">&nbsp;</button></td>
                                <td><button onclick="updatelist('category_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','prev');" class="btn-prev" type="button">&nbsp;</button></td>
                                <td><span class="ytb-sep"></span></td>
                                <td><span class="ytb-text">Page</span></td>
                                <td><input type="text" onkeyup="updatelist('category_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','page', this.value);" size="3" value="<?php echo ($pnumber) ?$pnumber :1;?>" class="pnumber"></td>
                                <td><span class="ytb-text" id="totaldata_view">of <?php echo round($totaldata/10)?></span></td>
                                <td><span class="ytb-sep"></span></td>
                                <td><button onclick="updatelist('category_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','next');" class="btn-next" type="button">&nbsp;</button></td>
                                <td><button onclick="updatelist('category_list','<?php echo base_url();?>','<?php echo $this->router->fetch_class();?>','last');" class="btn-last" type="button">&nbsp;</button></td>
                                <td>
                                    <input type="hidden" id="limit" name="limit" value="0"/>
                                    <input type="hidden" id="totaldata" name="totaldata" value="<?php echo $totaldata;?>"/>
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
<div id="add_category" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>Add Produk</h3>
    </div>
    <form action="<?= base_url() ?>category/save" id="add_category_form" method="post">				
        <div id="kategori-modal-body">
            <div class="row-fluid" style="padding-top:20px;">
                <div class="span12">
                    <span class="span12">&nbsp;</span>
                    <div class="control-group span12">
                        <input class="span8 m-wrap" type="hidden" name="id" id="id">
                        <label class="control-label span3">Nama Produk</label>
                        <div class="controls span9">
                            <input type="text" id="ctgr_name" name="ctgr_name" class="span8 m-wrap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="submit" id="submit" class="btn blue">Save</button>
        </div>
    </form>
</div>
<div id="upload_category" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>Upload Data Lokasi</h3>
    </div>
    <form action="<?= base_url() ?>kategori/upload"  method="post" enctype="multipart/form-data">				
        <div class="modal-body_upload">
            <div class="row-fluid">
                <div class="span12">
                    <span class="span12">&nbsp;</span>
                    <div class="control-group span12">
                        <label class="control-label span3">CSV file</label>									 
                        <div class="controls span9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="icon-file fileupload-exists"></i> 
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-file">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input type="file" class="default"  id="csvdata" name="csvdata" multiple='multiple'/>
                                    </span>
                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div> 
                    </div>	
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="submit" class="btn blue">Upload</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        initPaging();
    });
    
    $('.edit-category').click(function() {
        var table_id = $(this).data('id');
        var ctgr_name = $(this).data('ctgr_name');
        $("#kategori-modal-body #id").val(table_id);
        $("#kategori-modal-body #ctgr_name").val(ctgr_name);
    });
</script>
<script type="text/javascript" src="<?=base_url()?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/metronic/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />