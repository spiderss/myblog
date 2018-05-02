<?php
   namespace app\member\controller;
   use  app\common\controller\UserBase;
   use think\Request;

   class Index extends UserBase
   {
       public $appid = 'wxba09d9f0fed4b84b';                   //微信APPID，公众平台获取
       public $appsecret = '332c2b1fc1eb282c0136b73723db4237'; //微信APPSECREC，公众平台获取
       public $index_url = "http://tp5git.com/public/member/";  //微信回调地址，要跟公众平台的配置域名相同
       public $code;
       public $openid;


       public function _initialize()
       {
           if (!session('openid')) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息
               $this->code = $this->getCode();
               $this->access_token = $this->getOpenId();
               $userInfo = $this->getUserInfo();
               if ($userInfo) {
                   print_r($userInfo);
//                   $ins = M('Wechat_user_info');   //其他框架请自行调整方法。
//                   $map['openid'] = $userInfo['openid'];
//                   $result = $ins->where($map)->find();            //根据OPENID查找数据库中是否有这个用户，如果没有就写数据库。继承该类的其他类，用户都写入了数据库中。
//                   if (!$result) {
//                       $ins->add($userInfo);
//                   }
//                   session('openid', $userInfo['openid']);         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。
               }
           }

       }
       public function index(Request $request)
      {
         $userName=$request->controller();
         $str="location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf5047a6b91fa22ab&redirect_uri=https://shop.issll.com/&response_type=code&scope=snsapi_base&&state=STATE#wechat_redirect";
         header($str);
      }

       public function getCode()
       {
           if (isset($_GET["code"])) {
               return $_GET["code"];
           } else {
               $str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $this->appid . "&redirect_uri=" . $this->index_url . "&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
               header($str);
               exit;
           }
       }

       public function getOpenId()
       {
           $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $this->appid . "&secret=" . $this->appsecret . "&code=" . $this->code . "&grant_type=authorization_code";
           $access_token_json = $this->https_request($access_token_url);
           $access_token_array = json_decode($access_token_json, TRUE);
           return $access_token_array;
       }

       public function getUserInfo()
       {

           $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$this->access_token['access_token'] ."&openid=" . $this->access_token['openid']."&lang=zh_CN";
           $userinfo_json = $this->https_request($userinfo_url);
           $userinfo_array = json_decode($userinfo_json, TRUE);
           return $userinfo_array;
       }
       /**
        * @explain
        * 发送http请求，并返回数据
        **/
       public function https_request($url, $data = null)
       {
           $curl = curl_init();
           curl_setopt($curl, CURLOPT_URL, $url);
           curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
           curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
           if (!empty($data)) {
               curl_setopt($curl, CURLOPT_POST, 1);
               curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
           }
           curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
           $output = curl_exec($curl);
           curl_close($curl);
           return $output;
       }

   }