<?php


require_once __DIR__ . '/../vendor/autoload.php';
//use Zimuoo\DouyinOpenapi\Douyin;

//    $res = '';

//$dy = \vring\DouyinOpenapi\DouyouApp::make('ttbd1ecba05f01','82ac26bc7d1d592755110a9fd40183248c520');
//$dy->ad->query_ad_income();

$dy = \vring\DouyinOpenapi\DouyinApp::make('ttdb04adb944096d1a01','c42d0e4ca99b3a44014fac3dd7208e9be9dea592');
//$a = $dy->oauth->code2Session('4BrAgVF7Ufp0G1MiTpnQhfOozadmZTdv_Yn1Eg-aDz-_aftfmS2NUEtpKeBEPAYfFeIrI_19h0qIobGdpqVHCy-egMhtVPzjK3Rs8ge1rAc_VfWDqEbjEhoHbVw');
$a = $dy->phone_number->getUserPhoneNumber('');
//print_r($a);
//$a = $dy->privacy_setting->add([]);
print_r($a);