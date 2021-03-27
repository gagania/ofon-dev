function date_time(id){
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        if((date.getMonth()+1)<10){
                monthN = "0"+(date.getMonth()+1);
        }
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        if(d<10){
                dN = "0"+d;
        }else{
                dN = d;
        }
        day = date.getDay();
        days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        h = date.getHours();
        if(h<10){
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10){
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10){
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
        //result2 = ''+d+' +months[month]+' '+year+' - '+h+':'+m;
        result2 = ''+year+'/'+monthN+'/'+dN+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        document.getElementById('date_create').value = result2;
        document.getElementById('date_create2').value = result2;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}