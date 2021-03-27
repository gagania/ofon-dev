function initPaging() {
    var limitpage = 0;
    limitpage = parseInt($("#limit").val())+10;
    if ($("#totaldata").val() <= limitpage) {
        $(".btn-next").attr("disabled", true);
        $(".btn-last").attr("disabled", true);
    } else {
        $(".btn-next").attr("disabled", false);
        $(".btn-last").attr("disabled", false);
    }
}

function initPagingBlog() {
    var limitpage = 0;
    limitpage = parseInt($("#limit").val())+5;
    if ($("#totaldata").val() <= limitpage) {
        $(".btn-next").attr("disabled", true);
        $(".btn-last").attr("disabled", true);
    } else {
        $(".btn-next").attr("disabled", false);
        $(".btn-last").attr("disabled", false);
    }
}

function updatelist(id, baseUrl, cntlName, page, pagenumber,prvncode) {
    var pnumber = 0;
    var writer = '';
    var pcode = '';
    if (pagenumber) {
        pnumber = pagenumber;
    }else {
        pnumber = $('.pnumber').val();
    }
    if (prvncode) {
        pcode = prvncode;
    }
    
    if ($('#writer').length > 0) {
        writer = $('#writer').val();
    }
    $.ajax({
        url : baseUrl+cntlName+"/paging",
        type: "POST",
        dataType:'json',
        data : { limit:$("#limit").val(),
                page:page,
                totaldata:$("#totaldata").val(),
                pnum:pnumber,
                search:$("#search_desc").val(), 
                writer:writer,
                pcode:pcode
        },
        success: function(data)
        {  
            if ($("#"+id).children("tbody").length > 0) {
                $("#"+id+" > tbody").html('');
                $("#"+id+" > tbody").html(data['template']);
            } 
            else {
                $("#"+id+"").html('');
                $("#"+id+"").html(data['template']);
            }
            $("#limit").val(data['limit']);
            $(".pnumber").val(data['pnumber']);
            initPaging();
        }
    });
} 

function updatelistfront(id, baseUrl, cntlName, page, pagenumber,prvncode) {
    var pnumber = 0;
    var writer = '';
    var pcode = '';
    if (pagenumber) {
        pnumber = pagenumber;
    }else {
        pnumber = $('.pnumber').val();
    }
    if (prvncode) {
        pcode = prvncode;
    }
    
    if ($('#writer').length > 0) {
        writer = $('#writer').val();
    }
    $.ajax({
        url : baseUrl+cntlName+"/paging",
        type: "POST",
        dataType:'json',
        data : { limit:$("#limit").val(),
                page:page,
                totaldata:$("#totaldata").val(),
                pnum:pnumber,
                search:$("#search_desc").val(), 
                writer:writer,
                pcode:pcode
        },
        success: function(data)
        {  
            if ($("#"+id).children(".tbody").length > 0) {
                $("#"+id+" > .tbody").html('');
                $("#"+id+" > .tbody").html(data['template']);
            } 
            else {
                $("#"+id+"").html('');
                $("#"+id+"").html(data['template']);
            }
            
            $("#limit").val(data['limit']);
            $(".pnumber").val(data['pnumber']);
            initPaging();
        }
    });
}

function updatelist_blog(id, baseUrl, cntlName, page) {
    
    $.ajax({
        url : baseUrl+cntlName+"/paging",
        type: "POST",
        dataType:'json',
        data : { page:page
        },
        success: function(data)
        {  
            $("."+id+"").html('');
            $("."+id+"").html(data['template']);
//            $(".pnum").val(data['pnumber']);
//            initPaging();
        }
    });
}

function paging(baseUrl,cntlName,obj) {
    $.ajax({
        url : baseUrl+cntlName+"/paging",
        type: "POST",
        dataType:'json',
        data : { limit:$("#limit").val(),
                page:$(obj).html()*1,
                ctgrid : $("#literatur_category_id").val()
        },
        success: function(data)
        {  
            $(".literatur_list").html('');
            $(".literatur_list").html(data['template']);
            $(".page-item").each(function () {
                $(this).removeClass("active");
            });
            
            $(obj).parent().addClass("active");
            
//            $("#limit").val(data['limit']);
//            $(".pnumber").val(data['pnumber']);
//            initPaging();
        }
    });
}

function paging_blog(elmn,baseUrl,cntlName,obj) {
    $.ajax({
        url : baseUrl+cntlName+"/paging",
        type: "POST",
        dataType:'json',
        data : { limit:$("#limit").val(),
                page:$(obj).html()*1
        },
        success: function(data)
        {  
            if (data['success']) {
                $("."+elmn+"").html('');
                $("."+elmn+"").html(data['template']);

                $(".page-item").each(function () {
                    $(this).removeClass("active");
                });

                $(obj).parent().addClass("active");
            }
        }
    });
}