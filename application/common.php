<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function file_down($filepath, $filename = '') {
    if(!$filename) $filename = basename($filepath);
    if(is_ie()) $filename = rawurlencode($filename);
    $filetype = fileext($filename);
    $filesize = sprintf("%u", filesize($filepath));
    if(ob_get_length() !== false) @ob_end_clean();
    header('Pragma: public');
    header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: pre-check=0, post-check=0, max-age=0');
    header('Content-Transfer-Encoding: binary');
    header('Content-Encoding: none');
    header('Content-type: '.$filetype);
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    header('Content-length: '.$filesize);
    readfile($filepath);
    exit;
}

/**
 * Function dataformat
 * 判断是否为手机访问
 */
function isMobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = Array("240x320", "acer", "acoon",
        "acs-", "abacho", "ahong", "airness", "alcatel",
        "amoi", "android", "anywhereyougo.com",
        "applewebkit/525", "applewebkit/532", "asus",
        "audio", "au-mic", "avantogo", "becker", "benq",
        "bilbo", "bird", "blackberry", "blazer", "bleu",
        "cdm-", "compal", "coolpad", "danger", "dbtel",
        "dopod", "elaine", "eric", "etouch", "fly ",
        "fly_", "fly-", "go.web", "goodaccess",
        "gradiente", "grundig", "haier", "hedy",
        "hitachi", "htc", "huawei", "hutchison",
        "inno", "ipad", "ipaq", "ipod", "jbrowser",
        "kddi", "kgt", "kwc", "lenovo", "lg ", "lg2",
        "lg3", "lg4", "lg5", "lg7", "lg8", "lg9", "lg-",
        "lge-", "lge9", "longcos", "maemo", "mercator",
        "meridian", "micromax", "midp", "mini", "mitsu",
        "mmm", "mmp", "mobi", "mot-", "moto", "nec-",
        "netfront", "newgen", "nexian", "nf-browser",
        "nintendo", "nitro", "nokia", "nook", "novarra",
        "obigo", "palm", "panasonic", "pantech", "philips",
        "phone", "pg-", "playstation", "pocket", "pt-",
        "qc-", "qtek", "rover", "sagem", "sama", "samu",
        "sanyo", "samsung", "sch-", "scooter", "sec-",
        "sendo", "sgh-", "sharp", "siemens", "sie-",
        "softbank", "sony", "spice", "sprint", "spv",
        "symbian", "tablet", "talkabout", "tcl-",
        "teleca", "telit", "tianyu", "tim-", "toshiba",
        "tsm", "up.browser", "utec", "utstar", "verykool",
        "virgin", "vk-", "voda", "voxtel", "vx", "wap",
        "wellco", "wig browser", "wii", "windows ce",
        "wireless", "xda", "xde", "zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent,  $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}
