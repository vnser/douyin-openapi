<?php


require_once __DIR__ . '/../vendor/autoload.php';
//use Zimuoo\DouyinOpenapi\Douyin;

//    $res = '';

//$dy = \vring\DouyinOpenapi\DouyouApp::make('ttbd1ecba05f01','82ac26bc7d1d592755110a9fd40183248c520');
//$dy->ad->query_ad_income();

$dy = \vring\DouyinOpenapi\DouyinApp::make('tt246d52d0bb6276c201','d8ac3c6fc28c77828e45dc7b76d15a92882e02e6');
//$a = $dy->oauth->code2Session('4BrAgVF7Ufp0G1MiTpnQhfOozadmZTdv_Yn1Eg-aDz-_aftfmS2NUEtpKeBEPAYfFeIrI_19h0qIobGdpqVHCy-egMhtVPzjK3Rs8ge1rAc_VfWDqEbjEhoHbVw');
$a = $dy->phone_number->getUserPhoneNumber('');
print_r($a);