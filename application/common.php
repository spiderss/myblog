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
 * 字符串加密、解密函数
 *
 *
 * @param	string	$txt		字符串
 * @param	string	$operation	ENCODE为加密，DECODE为解密，可选参数，默认为ENCODE，
 * @param	string	$key		密钥：数字、字母、下划线
 * @param	string	$expiry		过期时间
 * @return	string
 */
function sys_auth($string, $operation = 'ENCODE', $key = '', $expiry = 0) {
    $key_length = 4;
    $key = md5($key != '' ? $key : config('app.auth_key' ));
    $fixedkey = md5($key);
    $egiskeys = md5(substr($fixedkey, 16, 16));
    $runtokey = $key_length ? ($operation == 'ENCODE' ? substr(md5(microtime(true)), -$key_length) : substr($string, 0, $key_length)) : '';
    $keys = md5(substr($runtokey, 0, 16) . substr($fixedkey, 0, 16) . substr($runtokey, 16) . substr($fixedkey, 16));
    $string = $operation == 'ENCODE' ? sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$egiskeys), 0, 16) . $string : base64_decode(strtr(substr($string, $key_length), '-_', '+/'));

    if($operation=='ENCODE'){
        $string .= substr(md5(microtime(true)), -4);
    }
    if(function_exists('mcrypt_encrypt')==true){
        $result=sys_auth_ex($string, $operation, $fixedkey);
    }else{
        $i = 0; $result = '';
        $string_length = strlen($string);
        for ($i = 0; $i < $string_length; $i++){
            $result .= chr(ord($string{$i}) ^ ord($keys{$i % 32}));
        }
    }
    if($operation=='DECODE'){
        $result = substr($result, 0,-4);
    }

    if($operation == 'ENCODE') {
        return $runtokey . rtrim(strtr(base64_encode($result), '+/', '-_'), '=');
    } else {
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$egiskeys), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    }
}

/**
 * 字符串加密、解密扩展函数
 *
 *
 * @param	string	$txt		字符串
 * @param	string	$operation	ENCODE为加密，DECODE为解密，可选参数，默认为ENCODE，
 * @param	string	$key		密钥：数字、字母、下划线
 * @return	string
 */
function sys_auth_ex($string,$operation = 'ENCODE',$key)
{
    $encrypted_data="";
    $td = mcrypt_module_open('rijndael-256', '', 'ecb', '');

    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    $key = substr($key, 0, mcrypt_enc_get_key_size($td));
    mcrypt_generic_init($td, $key, $iv);

    if($operation=='ENCODE'){
        $encrypted_data = mcrypt_generic($td, $string);
    }else{
        $encrypted_data = rtrim(mdecrypt_generic($td, $string));
    }
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return $encrypted_data;
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
