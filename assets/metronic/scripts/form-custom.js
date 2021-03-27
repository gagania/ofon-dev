 

function remove_user_approve() {
  	var num = (document.getElementById('numApprove').value);
  	var numMin = (document.getElementById('numApprove').value -1);

 	var numi = document.getElementById('numApprove');
  	numi.value = numMin;
	$( ".approve"+num ).remove();
	if(numMin == 1){
		$('.remove_user_approve_btn').hide();
	}
	set_role_persetujuan();
}
function remove_user_approve_role() {
  	var num = (document.getElementById('numApprove').value);
  	var numMin = (document.getElementById('numApprove').value -1);

 	var numi = document.getElementById('numApprove');
  	numi.value = numMin;
	$( ".approve"+num ).remove();
	if(numMin == 1){
		$('.remove_user_approve_btn').hide();
	} 
}
function check_user_approve(data){
	var length_user =  $("."+data+" :selected").length;
	if(length_user > 1){
		$('.'+data+'_and_or').show();
	}else{
		$('.'+data+'_and_or').hide();
	}

}
 
function set_role_persetujuan(){	
    var num = (document.getElementById('numApprove').value);
    var id_category = $('#category').val();
    $("#role_persetujuan").html('');
    if(id_category != ''){
        $.ajax({
            url : base_url+"dmsolidwood_form/get_data_category",
            type: "POST",
            data : {category_id : id_category},
            success: function(response)
            {
                var note = response[0].category_note.replace(/\n/g,"<br>"); 
                $("#category_help").html(wordWrap(note, 40));
            }
        });

	$("#role_persetujuan").html('');
            $.ajax({
                url : base_url+"dmsolidwood_form/get_role_persetujuan",
                type: "POST",
                data : {category_id : id_category},
                success: function(response)
                {  
                    if(response == ''){
                        $("#role_persetujuan").append('');                       
                        document.getElementById('numCountApprove').value = num;
                    }else{
                        $("#role_persetujuan").append('<span class="span12"></span>');
                        num = parseInt(num)+1;
                        for (var i=0; i<response.length; i++) {  
                            var user = response[i].user_id.split(",");
                            var usernames = '';
                            var divis_name = '';
                            $.each(arrayUser, function(index, value) {
                                for (var x = 0; x < user.length; x++) {
                                    if(value.id == user[x]){
                                         $.each(arrayDivisi, function(index, valueDivisi) {
                                            if(value.user_divisi_id == valueDivisi.id){
                                                var divis_name = valueDivisi.dvs_name;
                                                usernames += value.user_real_name+' - '+ divis_name + ' , ';
                                            }                                 
                                        });
                                
                                        
                                    } 
                                }
                            });
                            var today = new Date();
                            var date_role = new Date();
                            date_role.setDate(today.getDate()+parseInt(response[i].plus_day));
                            var dd = date_role.getDate();
                            var mm = date_role.getMonth()+1; //January is 0!
                            var yyyy = date_role.getFullYear();
                            var hours = date_role.getHours();
                            var minute = date_role.getMinutes();
                            var seconds = date_role.getSeconds(); 
                            if(dd<10) {
                                dd='0'+dd
                            } 

                            if(mm<10) {
                                mm='0'+mm
                            } 

                            today = yyyy+'/'+mm+'/'+dd+' '+hours+':'+minute+':'+seconds;

                            value = '<div class="control-group alert-success" style="margin-top:-25px;">'+
                                                    '<div class="control-group span12">'+
                                                            '<label class="control-label">Role Approval Ke-'+(i+1)+'</label>'+
                                                            '<div class="controls">'+
                                                                    '<div class="span6"><input type="text" value="'+usernames+'" readonly>';

                                                                    if(response[i].role_operator != 0 || response[i].role_operator != ''){ 
                                                                            if( response[i].role_operator == 1){
                                                                                    operator_name = ' Atau';
                                                                            }else{
                                                                                    operator_name = ' Dan';													
                                                                            }
                                                                            value += operator_name;
                                                                    }
                                                                    value += '</div>';
                                                                    value += '<input type="hidden" name="user_to_'+num+'[]" value="'+response[i].user_id+'" readonly>';
                                                                    value += '<input type="hidden" name="user_to_'+num+'_operator" value="'+response[i].role_operator+'" readonly>';

                                                            '</div>'+
                                                    '</div>';

                            value += '<div class="control-group">'+
                                                            '<span class=""> Deadline ke-'+(i+1)+':  '+
                                                                    '<div class="input-append date">'+
                                                                            '<input size="10" type="text" value="'+today+'" readonly class="m-wrap" name="deadline[]">'+
                                                                    '</div>' +
                                                            '</span>'+
                                                    '</div> </div>';
                            $("#role_persetujuan").append(value);  
                            num = num+1;
                    }
                        document.getElementById('numCountApprove').value = num-1;
                    }
                }
            });
	}
}

$('#category').change(function() {
	set_role_persetujuan();
});

function add_user_approve(){ 
    var num = (document.getElementById('numApprove').value -1)+ 2;
    var numi = document.getElementById('numApprove');
    numi.value = num;
    
        
    document.getElementById('numCountApprove').value = num;

    var sel = $(".group_user_to");
    var deadline = $(".group_deadline");
	$.post(base_url+"dmsolidwood_form/get_users_approve/"+userActive[0].user_divisi_id+'/'+userActive[0].user_lokasi_id,
  	function(data) {
	    if(data != ''){
                $('<div class="approve'+num+'"><br><label class="control-label">Approval ke - '+num+'</label>'+
                    '<div class="controls span6" style="margin-left:20px">'+
                    add_select(data, num)+
                    '</div></div>'+
                    '<select name="user_to_'+num+'_operator" style="width:70px;"  class="hide user_'+num+'_and_or">'+
                            '<option value="0">---</option>'+
                            '<option value="1">Atau</option>'+
                            '<option value="2">Dan</option>'+ 								
                    '</select>'
                    ).appendTo(sel);

                    $('<div class="approve'+num+'"><br><span class=""> Deadline ke - '+num+' :  '+
                                    '<div class="input-append date form_datetime">'+
                                            '<input size="16" type="text" value="" readonly class="m-wrap" name="deadline[]">'+
                                            '<span class="add-on"><i class="icon-calendar"></i></span>'+
                                    '</div>'+ 
                            '</span>'+
                    '<script type="text/javascript">$(".form_datetime").datetimepicker({format: "yyyy/mm/dd hh:ii", pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left")});</script>'+
                    '<script type="text/javascript">$(".chosen").each(function () { $(this).chosen({ allow_single_deselect: $(this).attr("data-with-diselect") === "1" ? true : false }); });</script>'+
                    '</div>').appendTo(deadline);	
		}
  	}, "json"); 
	$('.remove_user_approve_btn').show();
	set_role_persetujuan();
}

function add_user_approve_role(){ 
    var num = (document.getElementById('numApprove').value -1)+ 2;
    var numi = document.getElementById('numApprove');
    numi.value = num;

    var sel = $(".group_user_to");
    var deadline = $(".group_deadline");
	$.post(base_url+"dmsolidwood_form/get_users/",
  	function(data) {
	    if(data != ''){
                $('<div class="approve'+num+'"><span></span><span class="span2">Approval ke-'+num+'</span> <div class="approve'+num+'">'+
                    '<div class="controls">'+ 
                    add_select_role(data, num)+                    
                    '<select name="user_to_'+num+'_operator" style="width:70px; margin-top:-25px; margin-left:29px;""  class="hide user_'+num+'_and_or">'+
                            '<option value="0">---</option>'+
                            '<option value="1">Atau</option>'+
                            '<option value="2">Dan</option>'+ 								
                    '</select></div></div>'
                    ).appendTo(sel);
                $('<div class="approve'+num+'"><span></span><span class="span12"> + '+
                            add_day()+ 
                    'Hari </span>'+
                    '<script type="text/javascript">$(".chosen").each(function () { $(this).chosen({ allow_single_deselect: $(this).attr("data-with-diselect") === "1" ? true : false }); });</script>'+
                '</div>').appendTo(deadline);	
            }
  	}, "json"); 
	$('.remove_user_approve_btn').show();
}
function add_select_role(data, num){
    var val = ''; 
    val='<select class="chosen user_'+num+'" onchange="check_user_approve('+"'user_"+num+"'"+');" multiple="multiple" tabindex="6"  style="width:300px;" data-placeholder="Select User ..." name="user_to_'+num+'[]">';
        for (var i=0; i<data.length; i++) {
            if(data[i].id != user_create){ 
                if(data[i].user_type == 'wf'){ 
                    var user_group = data[i].user_group.split(","); 
                    for (var x = 0; x < user_group.length; x++) {
                            if(user_group[x] == 05){                                        
                                $.each(arrayDivisi, function(index, value) {                                
                                    if(data[i].user_divisi_id == value.id){
                                        var divis_name = value.dvs_name;
                                        val += '<option value="' + data[i].id + '">' + data[i].user_real_name + ' - '+ divis_name +'</option>';
                                    }                                 
                                });
                            } 
                    }
                }
            }
        }
        val += '</select>';
    return val;
}
function add_day(){
    var val = ''; 
    val='<select style="width:70px;" name="add_day[]">';
        for (var i=0; i<30; i++) {
            val += '<option value="' + i+ '">' + i+'</option>';                
        }
    val += '</select>';
    return val;
}
function add_select(data, num){
    var val = ''; 
    val='<select class="chosen user_'+num+'" onchange="check_user_approve('+"'user_"+num+"'"+');" multiple="multiple" tabindex="6" data-placeholder="Select User ..." name="user_to_'+num+'[]">';
        for (var i=0; i<data.length; i++) {
            if(data[i].id != user_create){               
                $.each(arrayDivisi, function(index, value) {                                
                    if(data[i].user_divisi_id == value.id){
                        var divis_name = value.dvs_name;
                        val += '<option value="' + data[i].id + '">' + data[i].user_real_name + ' - '+ divis_name +'</option>';
                    }                                 
                });
            }
        }
        val += '</select>';
    return val;
}
function add_attach(){
    $(".group_attach").append(
    '<label class="control-label">File</label>'+
    '<div class="controls">'+
        '<div class="fileupload fileupload-new" data-provides="fileupload">'+
            '<div class="input-append">'+
                    '<div class="uneditable-input">'+
                    '<i class="icon-file fileupload-exists"></i> '+
                    '<span class="fileupload-preview"></span>'+
                    '</div>'+
                    '<span class="btn btn-file">'+
                    '<span class="fileupload-new">Select file</span>'+
                    '<span class="fileupload-exists">Change</span>'+
                    '<input type="file" class="default"  name="userfile[]" multiple="multiple"/>'+
                    '</span>'+
                    '<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>'+
            '</div>'+ 
        '</div>'+
    '</div>');
}


function add_assistant(){
	$.post(base_url+"dmsolidwood_form/get_users",
  	function(data) { 
	    var sel = $(".group_assistant");
	    if(data != ''){
		    sel.append('<label class="control-label">Assistant</label>'+
			'<div class="controls"  style="margin-top:5px;" >'+
				'<select class="span4 m-wrap val" data-placeholder="Choose a Category" tabindex="1" name="user_assistant[]">'+
		    	'</select>'+
			'</div>'
			
		);
	    var val = $(".val");
	    	val.append('<option value="">Select User...</option>');
		    for (var i=0; i<data.length; i++) {
		    	if(data[i].id != user_create){
		      		val.append('<option value="' + data[i].id + '">' + data[i].user_name + ' - </option>');
		      	}
		    }
		}
  	}, "json");
 
}

function wordWrap(str, maxWidth) {
    var newLineStr = "\n"; done = false; res = '';
    do {                    
        found = false;
        // Inserts new line at first whitespace of the line
        for (i = maxWidth - 1; i >= 0; i--) {
            if (testWhite(str.charAt(i))) {
                res = res + [str.slice(0, i), newLineStr].join('');
                str = str.slice(i + 1);
                found = true;
                break;
            }
        }
        // Inserts new line at maxWidth position, the word is too long to wrap
        if (!found) {
            res += [str.slice(0, maxWidth), newLineStr].join('');
            str = str.slice(maxWidth);
        }

        if (str.length < maxWidth)
            done = true;
    } while (!done);

    return res;
}

function testWhite(x) {
    var white = new RegExp(/^\s$/);
    return white.test(x.charAt(0));
};