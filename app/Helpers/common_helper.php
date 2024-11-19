<?php
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ipaddress = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARDED')) {
        $ipaddress = getenv('HTTP_X_FORWARDED');
    } else if (getenv('HTTP_FORWARDED_FOR')) {
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    } else if (getenv('HTTP_FORWARDED')) {
        $ipaddress = getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        $ipaddress = getenv('REMOTE_ADDR');
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
function expload_date($date) {
    if ($date == '' || $date == '00/00/0000') {
        return '';
    }
    $tmp_date = explode('/', $date);
    $new_date = ($tmp_date[2]) . '-' . $tmp_date[1] . '-' . $tmp_date[0];
    return $new_date;
}
function expload_date_not_time_search_start($date) {
    if ($date == '' || $date == '00/00/0000') {
        return '';
    }
    $tmp_date = explode('/', $date);
    $new_date = ($tmp_date[2]) . '-' . $tmp_date[1] . '-' . $tmp_date[0] . ' 00:00:00';
    return $new_date;
}
function expload_date_not_time_search_end($date) {
    if ($date == '' || $date == '00/00/0000') {
        return '';
    }
    $tmp_date = explode('/', $date);
    $new_date = ($tmp_date[2]) . '-' . $tmp_date[1] . '-' . $tmp_date[0] . ' 23:59:59';
    return $new_date;
}
function expload_date_time($date) {
    if ($date == '' || $date == '00/00/0000 00:00:00') {
        return '0000-00-00 00:00:00';
    }
    $tmp_date = explode(' ', $date);
    $date = explode('/', $tmp_date[0]);
    $new_date = ($date[2]) . '-' . $date[1] . '-' . $date[0] . ' ' . $tmp_date[1];
    return $new_date;
}
function depload_date_time($date) {
    if ($date == '' || $date == '0000-00-00 00:00:00.000') {
        return '00/00/0000 00:00:00';
    }
    $tmp_date = explode(' ', $date);
    $date = explode('-', $tmp_date[0]);
    $time = explode('.', $tmp_date[1]);
    $new_date = ($date[2]) . '/' . $date[1] . '/' . $date[0] . ' ' . $time[0];
    return $new_date;
}
function expload_date_thai($date) {
    if ($date == '' || $date == '00/00/0000') {
        return '';
    }
    $tmp_date = explode('/', $date);
    $new_date = ($tmp_date[2] + 543) . '-' . $tmp_date[1] . '-' . $tmp_date[0];
    return $new_date;
}
function fn_dmy_th($db_dmy){ 
    //วันภาษาไทย
    $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
    //เดือนภาษาไทย
    $ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
    
    $ymd = substr($db_dmy,4,4).'-'.substr($db_dmy,2,2).'-'.substr($db_dmy,0,2); // วดป คศ 31122001 แปลงเป็น 2001-12-31
    //echo $ymd.'<br>';
    //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
    $myDATE = ($ymd); //แปลงมาจากฐานข้อมูล
    //กำหนดคุณสมบัติ
    $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
    $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
    $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
    $years = date("Y",strtotime($myDATE))+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.
    
    $day = $day*1;
    return "$day $ThMonth[$months] $years"; 
}
function fn_dmy_th_no543($db_dmy){ 
    //วันภาษาไทย
    $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
    //เดือนภาษาไทย
    $ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
    
    $ymd = substr($db_dmy,4,4).'-'.substr($db_dmy,2,2).'-'.substr($db_dmy,0,2); // วดป คศ 31122001 แปลงเป็น 2001-12-31
    //echo $ymd.'<br>';
    //วันที่ ที่ต้องการเอามาเปลี่ยนฟอแมต
    $myDATE = ($ymd); //แปลงมาจากฐานข้อมูล
    //กำหนดคุณสมบัติ
    $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
    $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
    $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
    $years = date("Y",strtotime($myDATE)); // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.
    
    $day = $day*1;
    return "$day $ThMonth[$months] $years"; 
}


function fn_dmy_en_th($db_dmy){  // เคสนี้มีทั้งปี พศ+คศ
    $date = trim($db_dmy);

    if ($date == '' || $date == '0000000') {
        return '-';
    }
    //วันภาษาไทย
    $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
    //เดือนภาษาไทย
    $ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
    $ymd = substr($db_dmy,4,4).'-'.substr($db_dmy,2,2).'-'.substr($db_dmy,0,2); // วดป คศ 31122001 แปลงเป็น 2001-12-31
    $myDATE = ($ymd); //แปลงมาจากฐานข้อมูล

    if(substr($db_dmy,4,4)*1 > 2500){
        //กำหนดคุณสมบัติ
        $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
        $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
        $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
        $years = date("Y",strtotime($myDATE)); // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.

    }else{

        //กำหนดคุณสมบัติ
        $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
        $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
        $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
        $years = date("Y",strtotime($myDATE))+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.
    }

    $day = $day*1;
    return "$day $ThMonth[$months] $years"; 
}


function fn_ymd_th2($db_dmy){  //  2023-10-04 00:00:00.000

    $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
    $ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
    
    if ($db_dmy == '' || $db_dmy == '0000-00-00 00:00:00.000') {
        return $db_dmy;
    }
    $tmp_date = explode(' ', $db_dmy);

    $myDATE = ($tmp_date[0]); //แปลงมาจากฐานข้อมูล

   
    $week = date("w",strtotime($myDATE)); // ค่าวันในสัปดาห์ (0-6)
    $months = date("m",strtotime($myDATE))-1; // ค่าเดือน (1-12)
    $day = date("d",strtotime($myDATE)); // ค่าวันที่(1-31)
    $years = date("Y",strtotime($myDATE))+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น พ.ศ.
    
    $day = $day*1;
    return "$day $ThMonth[$months] $years"; 


}