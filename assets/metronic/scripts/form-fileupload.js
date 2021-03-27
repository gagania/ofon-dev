var FormFileUpload = function () {


    return {
        //main function to initiate the module
        init: function (baseUrl) {
            var eventId;
            
            
            if ($('#event_id').val() !== '') {
                eventId = $('#event_id').val();
            }
//            if ($('#product_id').val() !== '') {
//                eventId = $('#product_id').val();
//            } else if ($('#jns_kayu_name').val() !== ''){
//                eventId = $('#jns_kayu_name').val();
//            } else if ($('#prjc_name').val() !== ''){
//                eventId = $('#prjc_name').val();
//            }
            // Initialize the jQuery File Upload widget:
            if (eventId) {
                $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
//                url: 'assets/metronic/plugins/jquery-file-upload/server/php/'
                url: baseUrl+ 'gallery_admin/upload/event_id/'+eventId
                 });
            } else {
                $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
//                url: 'assets/metronic/plugins/jquery-file-upload/server/php/'
                url: baseUrl+ 'banner/upload/'
                 });
            }
            
           
            // Load existing files:
            // Demo settings:
//            if (eventId) {
                $.ajax({
                    // Uncomment the following to send cross-domain cookies:
                    //xhrFields: {withCredentials: true},
                    url: $('#fileupload').fileupload('option', 'url'),
                    dataType: 'json',
                    context: $('#fileupload')[0],
                    maxFileSize: 5000000,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    process: [{
                            action: 'load',
                            fileTypes: /^image\/(gif|jpeg|png)$/,
                            maxFileSize: 20000000 // 20MB
                        }, {
                            action: 'resize',
                            maxWidth: 1440,
                            maxHeight: 900
                        }, {
                            action: 'save'
                        }
                    ]
                }).done(function (result) {
                    $(this).fileupload('option', 'done')
                        .call(this, null, {
                        result: result
                    });
                });
//            }

            // Upload server status check for browsers with CORS support:
            if (eventId) {
                if ($.support.cors) {
                    $.ajax({
                        url: baseUrl+ 'gallery_admin/upload/event_id/'+eventId,
    //                    url: 'assets/metronic/plugins/jquery-file-upload/server/php/',
                        type: 'HEAD'
                    }).fail(function () {
                        $('<span class="alert alert-error"/>')
                            .text('Upload server currently unavailable - ' +
                            new Date())
                            .appendTo('#fileupload');
                    });
                }
            } else {
                if ($.support.cors) {
                    $.ajax({
                        url: baseUrl+ 'banner/upload/',
    //                    url: 'assets/metronic/plugins/jquery-file-upload/server/php/',
                        type: 'HEAD'
                    }).fail(function () {
                        $('<span class="alert alert-error"/>')
                            .text('Upload server currently unavailable - ' +
                            new Date())
                            .appendTo('#fileupload');
                    });
                }
            }
            
            

            // initialize uniform checkboxes  
            App.initUniform('.fileupload-toggle-checkbox');
        }

    };

}();