<html>
    <head><script src="<?= base_url() ?>assets/application.js" type="text/javascript"></script>
    <link href="<?= base_url() ?>assets/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?= base_url() ?>assets/metronic/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/metronic/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <link rel="shortcut icon" href="favicon.ico" />
<style>
    .black_overlay{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        /*position: absolute;*/
        /*top: 25%;*/
        /*left: 25%;*/
        /*width: 50%;*/
        /*height: 50%;*/
        padding: 16px;
        border: 12px solid orange;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
    .white_content2 {
        display: none;
        /*position: absolute;*/
        /*top: 25%;*/
        /*left: 25%;*/
        /*width: 50%;*/
        /*height: 50%;*/
        padding: 16px;
        border: 12px solid orange;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
    .button-href {
        display: block;
        width: 100px;
        height: 15px;
        background: #d84a38;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        color: white;
    }
</style>
</head>

<div class="page-container row-fluid">
    <div class="row-fluid">
        <div class="">
            <form id="form_ctgr" method="post" action="<?= base_url() ?>gallery_admin/index">
            <div id="product" class="span4" style="">
                    <label>Choose Event : 
                        <select id="event_id" name="event_id" tabindex="1" class="medium m-wrap" 
                                onchange="javascript:getImageByCategory('<?= base_url() ?>', '<?php echo $this->router->fetch_class(); ?>', this)"
                                >
                                    <?php
                                    $selected = '';
                                    foreach ($eventList as $index => $value) {
                                        if (isset($eventId) && $eventId != '') {
                                            if ($eventId == $index) {
                                                $selected = 'selected=selected';
                                            } else {
                                                $selected = '';
                                            }
                                        }
                                        ?>
                                <option value="<?= $index ?>" <?= $selected ?>><?=$value?></option>
                            <?php } ?>
                        </select></label>
            </div>
<!--            <div class="btn-group" style="border-radius:5px;">
                <a class="btn green" data-toggle="modal" href="#category_content">Add New <i class="icon-plus"></i></a>
                <a onclick="javascript:add_photo_category('<?= base_url() ?>');" class="btn green">Add New <i class="icon-plus"></i></a>
            </div>-->
            <?php if (isset($showdelete)) {?>
<!--            <div id="delete_photo_ctgr" class="btn-group">
                <a class="btn green"onclick="javascript:delete_photo_category('<?= base_url() ?>','<?php echo $this->router->fetch_class();?>');">Delete
                    <i class="icon-minus"></i></a>
                <a onclick="javascript:add_photo_category('<?= base_url() ?>');" class="btn green">Add New <i class="icon-plus"></i></a>
            </div>-->
            <?php }?>
            </form>

        </div>
    </div>
</div>
<?php if (isset($eventId) && $eventId != '') { ?>
    <div id="upload_template" class="span12">
        <form id="fileupload" action="<?=base_url() ?>/gallery_admin/upload" method="POST" enctype="multipart/form-data">
            <div class="row-fluid fileupload-buttonbar">
                <div class="span7">
                    <span class="btn green fileinput-button">
                        <i class="icon-plus icon-white"></i>
                        <span>Add files...</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                    <button type="submit" class="btn blue start">
                        <i class="icon-upload icon-white"></i>
                        <span>Start upload</span>
                    </button>
                    <button type="reset" class="btn yellow cancel">
                        <i class="icon-ban-circle icon-white"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type="button" class="btn red delete">
                        <i class="icon-trash icon-white"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" class="toggle fileupload-toggle-checkbox">
                </div>
                <!-- The global progress information -->
                <div class="span5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-success progress-striped active" 
                         role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="bar" style="width:0%;"></div>
                    </div>
                    <!-- The extended global progress information -->
                    <div class="progress-extended">&nbsp;</div>
                </div>
            </div>
            <!-- The loading indicator is shown during file processing -->
            <div class="fileupload-loading"></div>
            <br>
            <table class="table_gallery table-striped">
                <tr>
                    <td style="width:42%">Image</td>
                    <td style="width:13%">Description</td>
                    <td style="10%">Size</td>
                    <td colspan="2" style="width:5%"></td>
                    <td style="width: 15%">Move</td>
                    <td style="width: 13%">Delete</td>
                    <td style="width: 5%">Publish</td>
                </tr>
            </table>
            <!-- The table listing the files available for upload/download -->
            <table id="gallery_table" role="presentation" class="table_gallery table-striped">
                <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
                </tbody>
            </table>
        </form>
        <br>

    </div>
<?php } ?>

<!--<div id="category_content" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>Add Category</h3>
    </div>
    <form action="<?= base_url() ?>gallery_admin/add_photo_category"  method="post" enctype="multipart/form-data">				
        <div class="modal-body_upload">
            <div class="row-fluid">
                <div class="span12">
                    <span class="span12">&nbsp;</span>
                    <div class="control-group span12">
                        <label class="control-label span3">Name</label>									 
                        <div class="controls span9">
                            <input type="text" id="ctgr_name" name="ctgr_name"/>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="submit" class="btn blue">Save</button>
        </div>
    </form>
</div>-->

<div></div>
<div class="row-fluid">
    <div class="span12">
        <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
            <td class="preview"><span class="fade"></span></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">Error</span> 
            {%=file.error%}</td>
            {% } else if (o.files.valid && !i) { %}
            <td>
            <div class="progress progress-success progress-striped active" 
            role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" 
            style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
            <button class="btn">
            <i class="icon-upload icon-white"></i>
            <span>Start</span>
            </button>
            {% } %}</td>
            {% } else { %}
            <td colspan="2"></td>
            {% } %}
            <td class="cancel">{% if (!i) { %}
            <button class="btn red">
            <i class="icon-ban-circle icon-white"></i>
            <span>Cancel</span>
            </button>
            {% } %}</td>
            </tr>
            {% } %}
        </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
            
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
            {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">Error</span>{%=file.error%}</td>
            {% } else { %}
            <td class="preview">
            {% if (file.thumbnail_url) { %}
            <a class="fancybox-button" data-rel="fancybox-button" href="{%=file.url%}" title="{%=file.name%}">
            <img style="height: 150px; width: 300px" src="{%=file.thumbnail_url%}">
            </a>
            {% } %}</td>
            <td class="name">
            <p><a href = "javascript:void(0)" onclick = "document.getElementById('light_{%=i*1%}').style.display='block';document.getElementById('fade_{%=i*1%}').style.display='block';javascript:getDesc('<?= base_url() ?>', '<?= $this->router->fetch_class() ?>','{%=file.name%}','{%=i%}')">Description</a></p>       
            <div id="light_{%=i%}" class="white_content">
            <textarea id="img_desc_{%=i%}"/></textarea>
            <div>
            <input type="button" id="btn-desc_{%=i%}" value="save" name="btn-desc_{%=i%}" onclick="javascript:saveDesc('<?= base_url() ?>', '<?= $this->router->fetch_class() ?>','{%=file.name%}','{%=i%}')">
            <input type="button" id="btn-img-close" value="Close" name="btn-img-close" onclick="document.getElementById('light_{%=i%}').style.display='none';document.getElementById('fade_{%=i%}').style.display='none'">
            </div>
            </div>
            <div id="fade_{%=i%}" class=""></div>

            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
            {% } %}
            <td class="">
            <a class="button-href" href = "javascript:void(0)" onclick = "document.getElementById('move_div_{%=i%}').style.display='block';"><i class="icon-trash icon-white"></i>&nbsp;move</a>
            <div id="move_div_{%=i%}" class="white_content2">
            <select id="event_id_move_{%=i%}" name="event_id_move_{%=i%}" tabindex="1" class="medium m-wrap">
                <?php 
//                if ($checked_role_y != '') {
                    foreach ($eventList as $index => $value) {?>
                    <option value="<?= $index ?>"><?= $value ?></option>
            <?php }?>
            </select>
            <a class="button-href" href = "javascript:void(0)" onclick = "javascript:moveimage('<?= base_url() ?>', '<?= $this->router->fetch_class() ?>','{%=file.name%}','{%=i%}')"><i class="icon-trash icon-white"></i>&nbsp;save</a>
            </div>
            <div id="fade_move{%=i%}" class=""></div>
            </td>
            <td class="delete">
            
            <!--<button class="btn red" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>-->
            <button class="btn red" onclick="javascript:delete_image('<?= base_url() ?>', '<?= $this->router->fetch_class() ?>','{%=file.name%}',this.parentNode.parentNode.rowIndex)"><i class="icon-trash icon-white"></i>
            <span>Delete</span>
            </button>
            <input type="checkbox" class="fileupload-checkbox" name="delete" value="1">
            </td>
            <td class="name">
                <input type="checkbox" class="fileupload-checkbox" name="publish" value="1" onclick="javascript:publish_image(this,'<?= base_url() ?>', '<?= $this->router->fetch_class() ?>','{%=file.name%}',this.parentNode.parentNode.rowIndex)">
            </td>
            </tr>
            {% } %}
        </script>
    </div>
</div>
</html>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="<?= base_url() ?>assets/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap 
tooltip conflict with jquery ui tooltip -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="<?= base_url() ?>assets/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?= base_url() ?>assets/metronic/plugins/excanvas.min.js"></script>
<script src="<?= base_url() ?>assets/metronic/plugins/respond.min.js"></script>  
<![endif]-->   
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="<?= base_url() ?>assets/metronic/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/metronic/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url() ?>assets/metronic/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<!-- BEGIN:File Upload Plugin JS files-->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing 
functionality -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-
upload/js/cors/jquery.xdr-transport.js"></script><![endif]-->
<!-- END:File Upload Plugin JS files-->
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?= base_url() ?>assets/metronic/scripts/app.js"></script>
<script src="<?= base_url() ?>assets/metronic/scripts/form-fileupload.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // initiate layout and plugins
        FormFileUpload.init('<?= base_url() ?>');
    });

 function getType(type) {
    if(type == 'product'){
        if ($("#product_id").val() == '') {
            $('#upload_template').hide();
        } else {
            $('#upload_template').show();
        }
            
        $('#product').show();
        $('#gallery_type').val(type);
    } else{
        $("#product_id").val('');
        $('#product').show();
        $('#gallery_type').val('');
    }
}
</script>