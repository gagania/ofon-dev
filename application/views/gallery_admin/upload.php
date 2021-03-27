<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Metronic | Form Stuff - Multiple File Upload</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?= base_url() ?>assets/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/css/style-metro.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?= base_url() ?>assets/metronic/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= base_url() ?>assets/metronic/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <div class="page-container row-fluid">
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>portlet Settings</h3>
                    </div>
                    <div class="modal-body">
                        <p>Here will be a configuration form</p>
                    </div>
                </div>
                <!--<div class="container-fluid">-->
                <!--<div class="row-fluid">-->
                <div class="span12">

                    <!-- The file upload form used as target for the file upload widget -->
                    <form id="fileupload" action="<?php base_url()?>/gallery/upload" method="POST" enctype="multipart/form-data">
                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row-fluid fileupload-buttonbar">
                            <div class="span7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
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
                                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="bar" style="width:0%;"></div>
                                </div>
                                <!-- The extended global progress information -->
                                <div class="progress-extended">&nbsp;</div>
                            </div>
                        </div>
                        <!-- The loading indicator is shown during file processing -->
                        <div class="fileupload-loading"></div>
                        <br>
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped">
                            <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
                        </table>
                    </form>
                    <br>

                </div>
                <!--</div>-->
                <div class="row-fluid">
                    <div class="span12">
                        <script id="template-upload" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                            <td class="preview"><span class="fade"></span></td>
                            <td class="name"><span>{%=file.name%}</span></td>
                            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                            {% if (file.error) { %}
                            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                            {% } else if (o.files.valid && !i) { %}
                            <td>
                            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
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
                            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                            {% } else { %}
                            <td class="preview">
                            {% if (file.thumbnail_url) { %}
                            <a class="fancybox-button" data-rel="fancybox-button" href="{%=file.url%}" title="{%=file.name%}">
                            <img src="{%=file.thumbnail_url%}">
                            </a>
                            {% } %}</td>
                            <td class="name">
                            <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                            </td>
                            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                            <td colspan="2"></td>
                            {% } %}
                            <td class="delete">
                            <button class="btn red" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="icon-trash icon-white"></i>
                            <span>Delete</span>
                            </button>
                            <input type="checkbox" class="fileupload-checkbox hide" name="delete" value="1">
                            </td>
                            </tr>
                            {% } %}
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?= base_url() ?>assets/metronic/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
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
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
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
        <!--[if gte IE 8]><script src="<?= base_url() ?>assets/metronic/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script><![endif]-->
        <!-- END:File Upload Plugin JS files-->
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?= base_url() ?>assets/metronic/scripts/app.js"></script>
        <script src="<?= base_url() ?>assets/metronic/scripts/form-fileupload.js"></script>
        <script>
            jQuery(document).ready(function() {
            // initiate layout and plugins
            App.init();
            FormFileUpload.init('<?=base_url()?>');
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>