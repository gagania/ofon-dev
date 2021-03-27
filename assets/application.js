function add_users(baseUrl, id) {
    if (id && id != '') {
        window.location.replace(baseUrl + "user_admin/add/" + id);
    } else {
        window.location.replace(baseUrl + "user_admin/add");
    }

}

function add_data(baseUrl, ctrlName, id, funcName) {
    if (!funcName || funcName === '') {
        funcName = 'add';
    }
    if (id && id != '') {
        window.location.replace(baseUrl + ctrlName + "/" + funcName + "/" + id);
    } else {
        window.location.replace(baseUrl + ctrlName + "/" + funcName);
    }

}

function add_menu(baseUrl, id) {
    if (id && id != '') {
        window.location.replace(baseUrl + "menu/add/" + id);
    } else {
        window.location.replace(baseUrl + "menu/add");
    }

}

function add_content(baseUrl, id) {
    if (id && id != '') {
        window.location.replace(baseUrl + "content/add/" + id);
    } else {
        window.location.replace(baseUrl + "content/add");
    }

}

function add_litigasi_child(baseUrl, controller, elm) {
    $.ajax({
        url: baseUrl + controller + "/add_litigasi_step",
        type: "POST",
        dataType: 'json',
        data: {
//                search:$(obj).val() 
        },
        success: function (data)
        {
//            $("#bidang_kerja_list > tbody").html('');
//            $("#istri_add > tbody").append(data['htmldata']);
            if (elm == '') {
                $(data['htmldata']).appendTo('#product_add > tbody');
            } else {
                $(data['htmldata']).appendTo('#' + elm + ' > tbody');
            }


        }
    });
}
function dellitigasichild(t, baseUrl, controllerName, id) {
    var row = t.parentNode.parentNode;
    if (id !== '') {
        $.ajax({
            url: baseUrl + controllerName + "/delete_detail",
            type: "POST",
            dataType: 'json',
            data: {iddetail: id},
            success: function (data) {
            }
        });
    }
    document.getElementById("litigasi_child_add").deleteRow(row.rowIndex);
}

function delete_menu(baseUrl, controllerName, page) {
    if (!page) {
        page = 'index';
    }
    var dataDelete = new Array();
    $(".delcheck").each(function () {
        if ($(this).is(":checked")) {
            var rawData = {
                id: $(this).val()
            };
            dataDelete.push(rawData);
        }
    });

    if (dataDelete.length > 0) {
        var confirmBox = confirm("Anda Yakin ingin menghapus Data ?");
        if (confirmBox == true) {
            $.ajax({
                url: baseUrl + controllerName + "/delete",
                type: "POST",
                dataType: 'json',
                data: {
                    dataDelete: dataDelete

                            //                asrs_data:JSON.stringify(data_tables)
                },
                success: function (data) {
                    if (data['success']) {
                        alert(data['message']);
                        if (data['url'] == '') {
                            window.location.replace(baseUrl + controllerName + "/" + page);
                        } else {
                            window.location.replace(baseUrl + controllerName + '/' + data['url']);
                        }
                    }

                }
            });
        }

    }

}

function auth_edit(baseUrl, groupCode) {
    window.location.replace(baseUrl + "group/auth_edit/" + groupCode);
}

function cancelButton(baseUrl, controller) {
    window.location = baseUrl + controller + "/index";
}

function searchdata(id, baseUrl, controllerName, obj, funcName) {
    if (!funcName) {
        funcName = 'paging';
    }

    $.ajax({
        url: baseUrl + controllerName + "/" + funcName,
        type: "POST",
        dataType: 'json',
        data: {
            page: 'first',
            totaldata: $("#totaldata").val(),
            search: $(obj).val()
        },
        success: function (data)
        {
//                $("#static_content").html('');
            if ($("#" + id).children("tbody").length > 0) {
                $("#" + id + " > tbody").html('');
                $("#" + id + " > tbody").html(data['template']);
            } else {
                $("#" + id + "").html('');
                $("#" + id + "").html(data['template']);
            }
            $("#limit").val(data['limit']);
            $(".pnumber").val(data['pnumber']);
            $("#totaldata").val(data['totaldata']);
            $("#totaldata_view").text(Math.ceil(data['totaldata'] / 10));

            initPaging();
        }
    });
}

function searchRincian(id, baseUrl, controllerName, elmn, funcName) {
    if (!funcName) {
        funcName = 'paging';
    }

    $.ajax({
        url: baseUrl + controllerName + "/" + funcName,
        type: "POST",
        dataType: 'json',
        data: {
            page: 'first',
            totaldata: $("#totaldata").val(),
            search: $("#"+elmn+"").val()
        },
        success: function (data)
        {
//                $("#static_content").html('');
            if ($("#" + id).children("tbody").length > 0) {
                $("#" + id + " > tbody").html('');
                $("#" + id + " > tbody").html(data['template']);
            } else {
                $("#" + id + "").html('');
                $("#" + id + "").html(data['template']);
            }
            $("#limit").val(data['limit']);
            $(".pnumber").val(data['pnumber']);
            $("#totaldata").val(data['totaldata']);
            $("#totaldata_view").text(Math.ceil(data['totaldata'] / 10));

            initPaging();
        }
    });
}

function searchDistrict(id, baseUrl, controllerName, obj, funcName) {
    if (!funcName) {
        funcName = 'paging';
    }

    $.ajax({
        url: baseUrl + controllerName + "/" + funcName,
        type: "POST",
        dataType: 'json',
        data: {
            page: 'first',
            totaldata: $("#totaldata").val(),
            district_name: $("#district_name").val(),
            prvn_id: $("#prvn_id").val()
        },
        success: function (data)
        {
//                $("#static_content").html('');
            if ($("#" + id).children("tbody").length > 0) {
                $("#" + id + " > tbody").html('');
                $("#" + id + " > tbody").html(data['template']);
            } else {
                $("#" + id + "").html('');
                $("#" + id + "").html(data['template']);
            }
            $("#limit").val(data['limit']);
            $(".pnumber").val(data['pnumber']);
            $("#totaldata").val(data['totaldata']);
            $("#totaldata_view").text(Math.ceil(data['totaldata'] / 10));

            initPaging();
        }
    });
}

function getImageByCategory(baseUrl, cntlName, obj) {
    $('#form_ctgr').submit();
}

function saveDesc(baseUrl, controllerName, fName, row) {
    $.ajax({
        url: baseUrl + controllerName + "/saveDesc",
        type: "POST",
        dataType: 'json',
        data: {
            img_name: fName,
            desc: $("#img_desc_" + row).val()
        },
        success: function (data)
        {
            if (data.success) {
                alert(data.message);
                $('#light_' + row).attr('style', 'display=none');
                $('#fade_' + row).attr('style', 'display=none');
            }
        }
    });
}

function getDesc(baseUrl, controllerName, imgName, row) {
    $.ajax({
        url: baseUrl + controllerName + "/getDesc",
        type: "POST",
        dataType: 'json',
        data: {
            img_name: imgName
        },
        success: function (data)
        {
            if (data.success) {
                $('#img_desc_' + row).val(data.desc);
            }
        }
    });
}

function delete_image(baseUrl, controllerName, imgName, row) {
    var eventid;

    if ($("#event_id").val()) {
        eventid = $("#event_id").val();
    }

//    else {
//        ctgr = $("#jns_kayu_name").val();
//    }
    $.ajax({
        url: baseUrl + controllerName + "/deleteImage",
        type: "POST",
        dataType: 'json',
        data: {
//                role : $('input[name="role"]:checked').val(),
            img_name: imgName,
            eventid: eventid
        },
        success: function (data)
        {
            if (data.success) {
//                document.getElementById('gallery_table').deleteRow(row);
            }
        }
    });
}

function publish_image(obj, baseUrl, controllerName, imgName, row) {
    var eventid;
    var isChecked;
    if ($("#event_id").val()) {
        eventid = $("#event_id").val();
    }
    if ($(obj).is(':checked')) {
        isChecked = 1;
    } else {
        isChecked = 0;
    }
    $.ajax({
        url: baseUrl + controllerName + "/publishImage",
        type: "POST",
        dataType: 'json',
        data: {
            img_name: imgName,
            check: isChecked,
            eventid: eventid
        },
        success: function (data)
        {
            if (data.success) {
            }
        }
    });
}
function moveimage(baseUrl, controllerName, imgName, row) {
    var oldctgr = '';
    if ($("#ctgr_id").val() === '') {
        oldctgr = $("#jns_kayu_name").val();
    } else {
        oldctgr = $("#ctgr_id").val();
    }
    $.ajax({
        url: baseUrl + controllerName + "/moveimage",
        type: "POST",
        dataType: 'json',
        data: {
            img_name: imgName,
            role: $('input[name="role"]:checked').val(),
            oldctgr: oldctgr,
            newctgr: $('#ctgr_id_move_' + row).val()
        },
        success: function (data)
        {
            if (data.success) {
                document.getElementById('gallery_table').deleteRow(row);
            }
        }
    });
}

function getEvent(baseUrl, id) {
    $.ajax({
        url: baseUrl + "events/index",
        type: "POST",
        dataType: 'json',
        data: {
            ctgrid: id
        },
        success: function (data)
        {
            window.location.replace(baseUrl + "events");
        }
    });
}

function delete_photo_category(baseUrl) {
    $.ajax({
        url: baseUrl + "gallery_admin/delete_photo_category",
        type: "POST",
        dataType: 'json',
        data: {
            ctgrId: $("#ctgr_id").val()
        },
        success: function (data)
        {
            window.location.replace(baseUrl + "events");
        }
    });
}

function show_gallery(baseUrl, eventAlias) {
    window.location.replace(baseUrl + "gallery/detail/" + eventAlias);
}

function orderingdata(baseUrl, controllerName, prvnCode, order, name, obj) {
    $.ajax({
        url: baseUrl + controllerName + "/getprovincedata",
        type: "POST",
        dataType: 'json',
        data: {
            prvn_code: prvnCode,
            order: order
        },
        success: function (data)
        {
            if (data.success) {
                $("#" + name + "").html(data['template']);
                $(window).scrollTop($("#" + name + "").offset().top - 200);
            }
            if ($(obj).attr('class') === 'ascLink') {
                $(".ascLink").hide();
                $(".descLink").show();
            } else if ($(obj).attr('class') === 'descLink') {
                $(".ascLink").show();
                $(".descLink").hide();
            }

        }
    });
}
function getdetail(baseUrl, controllerName, id, prvnCode, name) {
    $.ajax({
        url: baseUrl + controllerName + "/getprovincedata",
        type: "POST",
        dataType: 'json',
        data: {
            id: id,
            prvn_code: prvnCode
        },
        success: function (data)
        {
            if (data.success) {
                $("#" + name + "").html(data['template']);
            }
        }
    });
}
function getGeneral(baseUrl, controllerName, id, prvnCode, name) {
    $.ajax({
        url: baseUrl + controllerName + "/getprovincedata",
        type: "POST",
        dataType: 'json',
        data: {
            id: id,
            prvn_code: prvnCode
        },
        success: function (data)
        {
            if (data['success']) {
                $("#legislasi_data").html(data['template']);
                $(window).scrollTop($("#" + name + "").offset().top - 200);
            }
        }
    });
}

function scrolldown(obj) {
    if ($(obj).siblings(".list_body").is(':visible')) {
        $(obj).siblings(".list_body").slideUp(300);
        $(obj).children('span').removeClass('fa-minus').addClass('fa-plus');
    } else {
        $(obj).siblings(".list_body").slideDown(300);
        $(obj).children('span').removeClass('fa-plus').addClass('fa-minus');
    }
}

function download_file(baseUrl, controllerName, id) {
    $.ajax({
        url: baseUrl + controllerName + "/download_file",
        type: "POST",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data)
        {
//                 window.location=baseUrl+'/'+controllerName+'/index/download_file/id/'+id;
        }
    });
}

function get_district(baseUrl, controllerName, obj) {
    $.ajax({
        url: baseUrl + controllerName + "/get_district",
        type: "POST",
        dataType: 'json',
        data: {
            prvn_id: $(obj).val()
        },
        success: function (data)
        {
            if (data['success']) {
                $("#lgls_district_id").html(data['template']);
                $(".district_div").show();
            } else {
                $("#lgls_district_id").html('');
                $(".district_div").hide();
            }
        }
    });
}
var map;
function get_district_map(baseUrl, ctrlName, code, mapEl) {
    var stylesData = [{
            "featureType": "administrative.province",
            "elementType": "labels.text",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "administrative.province",
            "elementType": "geometry.stroke",
            "stylers": [{
                    "invert_lightness": true
                }, {
                    "visibility": "on"
                }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape.natural.landcover",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "transit",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "on"
                }]
        }];
    var clickevent = '';
    $.ajax({
        url: baseUrl + ctrlName + "/getprovincedata",
        type: "POST",
        dataType: 'json',
        data: {
            prvn_code: code.toUpperCase()
        },
        success: function (data)
        {
            if (data.success) {
                $("#district-container").show();
                $("#map_canvas").html('');
                $(".district_data").html('');
                $("#map_canvas").show();
                $("#legend_canvas").show();
                $(".legislasi_div_data").show();
                $("#legislasi_data").html(data['template']);
                $(window).scrollTop($('#legislasi_data').offset().top - 550);
                $("#prvn_name").html(data['prvn_name']);

                $.ajax({
                    url: baseUrl + ctrlName + "/get_district_map",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        prvn_id: code.toUpperCase()
                    },
                    success: function (dataDistrict)
                    {
                        prvngeo = new google.maps.Geocoder();
                        prvngeo.geocode({
                            'address': dataDistrict["prvn_name"] + ", Indonesia"
                        }, function (results, status) {
                            if (status === 'OK') {
                                var myOptions = {
                                    zoom: 9,
                                    center: results[0].geometry.location,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                    styles: stylesData
                                };
                                map = new google.maps.Map(document.getElementById("" + mapEl + ""), myOptions);
                                google.maps.event.addDomListener(window, "load");

                                if (dataDistrict['district'] != undefined && dataDistrict['district'].length > 0) {
                                    $.each(dataDistrict['district'], function (index, value) {
                                        //                                                            map.setZoom(map.getZoom() + 4);
                                        var marker = new google.maps.Marker({
                                            position: new google.maps.LatLng(value['lat'], value['long']),
                                            icon: baseUrl + value['marker_color']
                                        });
                                        marker.setMap(map);
                                        var contentString = '<div id="content">' +
                                                '<div id="siteNotice">' +
                                                '</div>' +
                                                '<h1 id="firstHeading" class="firstHeading">' +
                                                '<img src="' + baseUrl + value['logo_image_path'] + '" style="width:100px;height:100px">' + value['district_name'] + '</h1>' +
                                                '<div id="bodyContent">' +
                                                '<p><b>Polulasi : ' + value['populasi'] + '</b>, </p>' +
                                                '<p><b>Luas Area : ' + value['luas_area'] + '</b>, </p>' +
                                                '</div>' +
                                                '</div>';
                                        var infowindow = new google.maps.InfoWindow({
                                            content: contentString
                                        });
                                        marker.addListener('click', function () {
                                            infowindow.open(map, marker);
                                        });
                                        //append to left district
                                        clickevent = "javascript:gotoMarker(" + value['lat'] + "," + value['long'] + ")";
                                        //                                clickevent = "javascript:google.maps.event.trigger(createMarker('"+baseUrl+"','"+value['marker_color']+"','"+mapEl+"',"+value['lat']+","+value['long']+"),'click')";
                                        $("<div class='col-md-3'><a href=" + clickevent + ">- " + value['district_name'] + "</a></div>").appendTo('.district_data');
                                    });
                                }
                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        });
                    }
                });
            }
        }
    });
}

function get_kabupaten_map(baseUrl, ctrlName, code) {
    window.location.replace(baseUrl + "kabupaten/" + code);
//    $.ajax({
//        url: baseUrl + "/kabupaten",
//            type: "POST",
//            dataType: 'json',
//            data: {
//            prvn_code: code.toUpperCase()
//            },
//            success: function(data)
//            {
//                window.location.replace(baseUrl + "kabupaten");
//            }
//    });
}

function get_kabupaten_data(baseUrl, ctrlName, code) {
    $.ajax({
        url: baseUrl + ctrlName + "/kabupatendata",
        type: "POST",
        dataType: 'json',
        data: {
            kbpt_code: code
        },
        success: function (data)
        {
            if (data['success']) {
//                $("#district-container").show();
//                $("#map_canvas").html('');
//                $(".district_data").html('');
//                $("#map_canvas").show();
//                $("#legend_canvas").show();
                $(".legislasi_div_data").show();
                $(".category_legislasi").show();
                $("#legislasi_data").html(data['template']);
                $(window).scrollTop($('#legislasi_data').offset().top - 550);
                $("#district_name").html(data['district_name']);
            }
        }
//        ,
//        error: function (xhr, ajaxOptions, thrownError) {
//            console.log(thrownError);
//      }
    });
}

function save_litigasi_category(baseUrl, ctrlName) {
    $.ajax({
        url: baseUrl + ctrlName + "/save_category",
        type: "POST",
        dataType: 'json',
        data: {
            name: $("#ctgr_name").val()
        },
        success: function (data)
        {
            if (data['success']) {
//                $("#ltrt_ctgr_id").append(data['new_ctgr']);
                $(".ltgs_category").each(function () {
                    $(this).append(data['new_ctgr']);
                });
                $("#add_category").modal('hide');
            }
        }
    });
}
function save_literatur_category(baseUrl, ctrlName) {
    $.ajax({
        url: baseUrl + ctrlName + "/save_category",
        type: "POST",
        dataType: 'json',
        data: {
            name: $("#ctgr_name").val()
        },
        success: function (data)
        {
            if (data['success']) {
                $(".ltrt_category").each(function () {
                    $(this).append(data['new_ctgr']);
                });
                $("#add_category").modal('hide');
            }
        }
    });
}

function gotoMarker(lat, long) {
    map.setCenter({
        lat: lat,
        lng: long
    });
    map.setZoom(10);
}
function createMarker(baseUrl, markerColor, mapEl, lat, lng, html) {
    var stylesData = [{
            "featureType": "administrative.province",
            "elementType": "labels.text",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "administrative.province",
            "elementType": "geometry.stroke",
            "stylers": [{
                    "invert_lightness": true
                }, {
                    "visibility": "on"
                }]
        }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "landscape.natural.landcover",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "transit",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "off"
                }]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                    "visibility": "on"
                }]
        }, {
            "featureType": "water",
            "elementType": "labels",
            "stylers": [{
                    "visibility": "on"
                }]
        }];
    var latlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: stylesData
    };
    map = new google.maps.Map(document.getElementById("" + mapEl + ""), myOptions);
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: baseUrl + markerColor
    });
    google.maps.event.addListener(marker, 'click', function () {
//        infowindow.setContent(html);
//        infowindow.open(map, marker);
    });
    return marker;
}

function get_literatur(formName) {
    $('#'+formName+'').submit();
//    $.ajax({
//        url: baseUrl + ctrlName + "/get_literatur",
//        type: "POST",
//        dataType: 'json',
//        data: {
//            ctgrid: $(obj).val()
//        },
//        success: function (data)
//        {
//            $(".literatur_list").html('');
//            if (data['success']) {
//                $(".literatur_list").html(data['htmldata']);
//            }
//        }
//    });
}

function add_file(baseUrl,controller,elm){
    $.ajax({
        url : baseUrl+controller+"/add_file",
        type: "POST",
        dataType:'json',
        data : {
//                id:$("#event_id").val() 
            },
        success: function(data)
        {
            $(data['htmldata']).appendTo('#'+elm+' > tbody');
        }
    });
}

function del_file(t,baseUrl,controller,id,imagePath) {
    
    if (id !== '') {
        $.ajax({
            url : baseUrl+controller+"/deleteFile",
            type: "POST",
            dataType:'json',
            data : {
                    id:id,
                    img_path:imagePath
                },
            success: function(data)
            {
//                $(data['htmldata']).appendTo('#'+elm+' > tbody');
            }
        });
    }
    $(t).parent().parent().remove();
}

function publish_comment(baseUrl, controllerName,id,status) {
    
    $.ajax({
        url : baseUrl+controllerName+"/publish_comment",
        type: "POST",
        dataType:'json',
        data : {
                status:status,
                cmmnid:id
            },
        success: function(data)
        {
            $("#cmmn_row_"+id).html('');
            $("#cmmn_row_"+id).html(data['htmldata']);
            
        }
    });
}

function delete_comment(baseUrl,controllerName,page) {
    if (!page) {
        page = 'index';
    }
    var dataDeleteComment = new Array();
    $(".delcheckcmmn").each(function(){
        if($(this).is(":checked")) {
            var rawData = {
                id:$(this).val()
            };
            dataDeleteComment.push(rawData);
            }
    });
    
    if (dataDeleteComment.length > 0) {
        var confirmBox = confirm("Anda Yakin ingin menghapus Data ?");
        if (confirmBox==true) {
            $.ajax({
               url : baseUrl+controllerName+"/delete_comment",
               type: "POST",
               dataType:'json',
               data : {
                   dataDeleteComment : dataDeleteComment

            //                asrs_data:JSON.stringify(data_tables)
                   },
               success: function(data){
                   if (data['success']) {
                       alert(data['message']);
                        if (data['url'] == '') {
                            window.location.replace(baseUrl+controllerName+"/"+page);
                        } else {
                            window.location.replace(baseUrl+controllerName+'/'+data['url']+'/'+$("#id").val());
                        }
                   }

               }
            });
        } 
    }
}

function save_comment() {
    var validate = true;
    if ($("#cmmn_name").val() ==='') {
        $("#cmmn_name").parent().children('.notification').show();
        $("#cmmn_name").parent().children('.notification').html('required');
        $("#cmmn_name").focus();
        validate = false;
    }
    
    if ($("#cmmn_email").val() ==='') {
        $("#cmmn_email").parent().children('.notification').show();
        $("#cmmn_email").parent().children('.notification').html('required');
        $("#cmmn_email").focus();
        validate = false;
    }
    
//    $("#comment_form").each(function(){
//        $(this).children().find("input").each(function(){
//            if($(this).attr("required")) {
//                    if ($(this).val() ==='') {
//                        $(this).parent().children('.notification').show();
//                        $(this).parent().children('.notification').html('required');
//                        $(this).focus();
//                        validate = false;
//                    } else {
//                         $(this).parent().children('.notification').hide();
//                    }
////                }
//            }
//        });
//        //textarea
//        $(this).children().find("textarea").each(function(){
//            if($(this).attr("required")) {
//                if ($(this).val() ==='') {
//                    $(this).parent().children('.notification').show();
//                    $(this).parent().children('.notification').html('required');
//                    $(this).focus();
//                    validate = false;
//                } else {
//                    $(this).parent().children('.notification').hide();
//                }
//            }
//        });
//        
//    });
    if (validate) {
        $("#comment_form").submit();
    }
}