function submit_form(id){
    if(id == 0){//batal
        window.location.href = base_url+"dmsolidwood_dashboard";
    }else if(id == 1){//proses lanjut
        var user_add = $('#user_add').val(); 
        if(user_add != null){
            var keyword=user_add.toString();
            var partsOfUserAdd = keyword.split(",");
            if(partsOfUserAdd[1]){
                if($('.user_1_and_or').val() == 0){
                    alert('isi operator approval selanjutnya');
                    return false;
                }
            }
            var deadline = $('#deadline').val();
            if(deadline == ''){
                alert('isi tanggal deadline approval selanjutnya.');
                return false;
            }
        }
        if(user_add != null){
            var save = confirm("Anda yakin akan melajutkan Proses dengan Menmbahkan Approval selanjutnya?"); 
        }else{
            var save =  confirm("Anda yakin akan melajutkan Proses selanjutnya?");
        } 
        
        if (save == true) {
            $(".loading").show();        
            $('#form_process').attr('action', ''); 
            $('#form_process').attr('action', base_url+'dmsolidwood_process/next_approve');
            $('#form_process').submit(); 
        } else {
            return false;
        }
    }else if(id == 2){//proses kembali
        $(".loading").show();
        $('#form_process').attr('action', ''); 
        $('#form_process').attr('action', base_url+'dmsolidwood_process/back_approve');
        $('#form_process').submit(); 
    }else if(id == 3){//proses batal
        alert('lanjut');
    }else if(id == 4){//proses add note
        //alert('asd');
        $(".loading").show();        
        $('#form_note_assistant').attr('action', ''); 
        $('#form_note_assistant').attr('action', base_url+'dmsolidwood_process/note_assistant');
        $('#form_note_assistant').submit();
    }
}

function add_attach_versi_cetak(){
    $(".group_versi_cetak").append('<div class="controls">'+
                                        '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="input-append">'+
                                                '<div class="uneditable-input">'+
                                                    '<i class="icon-file fileupload-exists"></i>'+ 
                                                    '<span class="fileupload-preview"></span>'+
                                                '</div>'+
                                                '<span class="btn btn-file">'+
                                                    '<span class="fileupload-new">Select file</span>'+
                                                    '<span class="fileupload-exists">Change</span>'+
                                                    '<input id="fileToUpload" type="file" class="default" class="userfile" name="userfile[]" multiple="multiple"/>'+
                                                '</span>'+
                                                '<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>');
}
$("input[name=optionsFile]:radio").change(function () {
    $('.group_attach').html('');
    if($(this).val() == 1){
        $('.group_change_attach').hide();        
        $('.group_attach').html('');
    }else if($(this).val() == 2){
        $('.group_change_attach').hide();
        $('.group_attach').html('<label class="control-label">Tambah File</label>'+
                                    '<div class="controls">'+
                                        '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="input-append">'+
                                                '<div class="uneditable-input">'+
                                                    '<i class="icon-file fileupload-exists"></i>'+ 
                                                    '<span class="fileupload-preview"></span>'+
                                                '</div>'+
                                                '<span class="btn btn-file">'+
                                                    '<span class="fileupload-new">Select file</span>'+
                                                    '<span class="fileupload-exists">Change</span>'+
                                                    '<input id="fileToUpload" type="file" class="default" class="userfile" name="userfile[]" multiple="multiple"/>'+
                                                '</span>'+
                                                '<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>'+
                                            '</div>'+                              
                                            '<span>'+
                                                '<button type="button" class="btn green" style="margin-top:-10px" onclick="add_attach()"><i class="icon-plus"></i></button>'+
                                            '</span>'+ 
                                        '</div>'+
                                    '</div>');
    }else{
        $('.group_change_attach').show();
        $('.group_attach').html('<label class="control-label">Ganti File</label>'+
                                    '<div class="controls">'+
                                        '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="input-append">'+
                                                '<div class="uneditable-input">'+
                                                    '<i class="icon-file fileupload-exists"></i>'+ 
                                                    '<span class="fileupload-preview"></span>'+
                                                '</div>'+
                                                '<span class="btn btn-file">'+
                                                    '<span class="fileupload-new">Select file</span>'+
                                                    '<span class="fileupload-exists">Change</span>'+
                                                    '<input id="fileToUpload" type="file" class="default" class="userfile" name="userfile[]" multiple="multiple"/>'+
                                                '</span>'+
                                                '<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>'+
                                            '</div>'+                              
                                            '<span>'+
                                                '<button type="button" class="btn green" style="margin-top:-10px" onclick="add_attach()"><i class="icon-plus"></i></button>'+
                                            '</span>'+ 
                                        '</div>'+
                                    '</div>');
    }
});