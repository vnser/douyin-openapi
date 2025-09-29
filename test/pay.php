<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dy = \vring\DouyinOpenapi\DouyinApp::make(['appid'=>'tt58142ea9c719e98201','appsecret'=>'92083e8fc74eaad7f2af8a1ca3698e409b41b931','private_key'=>'-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAuMsO02s9bCbL3sT5D0iG4PfKuDcDLry1gBoCAFlg+Mnl79+I
n3I4w23/PaAwM9N6SR26VoZJxhI0yMLspwVFCveqE2XdS5xjwaU0kwtc8LC/9PNR
kpWdiVmJ0emMfKxJd+uSGhhh6zAkWq+r0Fswe/Wq2jCMV6Co6PYxKuB2Sqbb+ciJ
K8Dy1E2cqWzv3FYMY2TLoSIxNvUe3/7L5nJPlSWxvTqNz68dXYwo7uBB6wWDX+0m
Uq2uWd/2KdoI8Fmbyw77srYxoTaleBfvipgnKkXiKuksiTggSb59b7I+t97n5YFk
Ec6afp0yoBiakiaUfVQ+eW09r2Chw++jQ9S+0QIDAQABAoIBABxKMdXZ+AhDlDhh
bUOStdtg8+7ptRoFl7+pu560EC1mM0ZasT6/rML2ZvnXOSnl+TWSUIGIg2jIRr5p
YPNc0ioQqj/X+13k7jyp/vd36N2MIYbtbRKExx5Mz9WL7I71jTXHoZFPJEZuE1Ky
zBnUrAJ+JI7Mmd+cX99yOSq4PEPHLvG0APoyxbCyHht5Lb+fBHlzrmP/Vl43hXCV
FhSr/uf92wl1fyFJGMSQbvkH/hFC24HoUVycjDHT2vS/+k2ycz0+8tjfWfXh6QeE
ijvmGHOZXofFCmd8vhgCDulBZ9ZaZJMvgHIBUX2qt7UImL+1Uw3cIF8nIS3u3hWz
QJQKj0ECgYEA56ZPI9M27rnqGe/ah14GWLM4A9N9iRiZQej6CYByDYlxg7/4pBr6
NGurTajGlhdqbIfViSZqFty6MTDQkh2yQ4kzFDUFJuncqQNlchp3mFKdJHxxivUl
oahj6YwSqOzY4Jioxvv0fv59M/oU1bpHjpVlRNSEWOazrp8o3rd5exkCgYEAzDfX
iCTtU4weFlGWdaOfFEDlhNUgUozLRhzlaLdyCy/kLJPwrlyYR6SCYiNzYdmNi9cM
8QUF5kWmPzqjyEcQI8dt7cW+PN/SpxGucHb7ho69VDIWt7z4ZxXn9nlknaHv7wUY
ARgniQPBcvs6z+JBFhqT50QDcni1N2jRh0B4EHkCgYBiRvB0Znt7tGxZLKUtoPpY
T1CIbwVnUIRUrh7GQTQiAhmip6M5HCjibHt0qxH1Q2HnQYmaci24HVTw4aDbHLYw
aNi+ze+tnrH7EnHLgucSPJpmjFUveunIN8SLpN2VxUYNozaXlPUZm6ZKkuKb+je5
ijA4j2DGxrmcb/HK61QioQKBgQCRHMkZo+vEJ1el0lnQw/ChKrAtIGi0X/l9m8Dk
FR6DlodTqdgnfgJzPhGr/LbbfASZrrkydrhHdYx5d4i0ItL0KZ0SjSXuCbmdH/JN
Vi7K4ZjlQCZmb3AviCBpQr9dR5m/xWXWOTy2nqWSt7SFzackNsSMXAb7C4zxj5j7
u7LVOQKBgQCk9/5U6EB6VO/v7OGgAYu1ORIzUxybsGgFAVawTWMSglW+fAE5QNJg
OGIzjaN8B+YuKadTcJClyF+ev4YLQH2SKZflGZ4Vlg94zyvoxrNVdsVbs+A5lfvg
6K38q4FUdMfggAUVYnplNRSlA3eRoDiX4EanMtThODGnPyg9/JNmnQ==
-----END RSA PRIVATE KEY-----','payment'=>['salt'=>'WCUdnjZWzMkBnkicasnPLafUejCRs8H7OpwTAMtD','is_sandbox'=>true]]);
/*$res = $dy->payment->createOrder([
//    "app_id"       => $this->offsetGet('appid'),
    "out_order_no" => "out_order_no_1",
    "total_amount" => 12800,
            "subject"      => "测试商品",
            "body"         => "测试商品",
    "valid_time"   => 180,
//            "sign"         => "d716027b7b5a91a3319a061d818cc9cc",
    "cp_extra"     => "一些附加信息",
            "notify_url"   => "https://api.iiyyeixin.com/Notify/bytedancePay",
]);*/
$a = $dy->payment->createRefund([
//    "app_id"        => "tt07e3715e98c9aac0",
    "out_order_no"  => "7056505317450041644",
    "out_refund_no" => "401020220222383672284706009088",
    "reason"        => "发错地址退款重新下单",
    "refund_amount" => 12800,
//    "sign"          => "d716027b7b5a91a3319a061d818cc9cc",
//    "cp_extra"      => "一些附加信息",
    "notify_url"    => "https://douyin.com/callback",
]);
print_r($a);
//print_r($res);