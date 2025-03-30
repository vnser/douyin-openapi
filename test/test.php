<?php


require_once __DIR__ . '/../vendor/autoload.php';
use Zimuoo\DouyinOpenapi\Douyin;
$app = new Douyin();
$res = $app->oauth->client_token([
    'client_key' => 'ttbd1ecba32215705f01',
    'client_secret' => '82ac26c7fbc7d1d592755110a9fd40183248c520',
]);

$app = new Douyin([
    'access_token' =>$res['data']['access_token']
]);
$list = $app->ad->query_ad_income([
    'end_date'=>'2025-03-30',
    'start_date'=>'2025-03-27'
]);
print_r($list);
//    $res = '';