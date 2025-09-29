- 本包是根据ydg/douyin-open-sdk修改而来，感谢作者的辛苦付出~

#### 新增内容
- 增加抖音来客券码核销功能
- 内置自动获取access_token，优化access_token缓存机制
- 增加流量主广告板块，
- 增加登录code登录，获取手机号
- 增加支付 09.29
````php

$dy = DouyinApp::make([
        'appid' => $appid,
        'appsecret' => $appsecret,
        //应用私钥，解密消息
        'private_key' => $private_key,
        'payment' => [
             #沙盒
            'is_sandbox' => true,
            #支付盐
            'salt' => $payment_salt,
            #支付回传token
            'token' => $payment_token
        ]
    ]);
    //授权登录
    $dy->oauth->code2Session('4BrAgVF7Ufp0G1MiTpnQhfOozadmZTdv_Yn1Eg-aDz-_aftfmS2NUEtpKeBEPAYfFeIrI_19h0qIobGdpqVHCy-egMhtVPzjK3Rs8ge1rAc_VfWDqEbjEhoHbVw');
    //获取手机号
    $dy->phone_number->getUserPhoneNumber($mobileCode);
    //支付
````

