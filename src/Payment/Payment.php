<?php

namespace vring\DouyinOpenapi\Payment;

use JetBrains\PhpStorm\ArrayShape;
use Pimple\Container;
use vring\DouyinOpenapi\DouyinClient;

class Payment extends DouyinClient
{

    protected $payConfig = [];
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
//        print_r($attributes);
        $this->payConfig = $this->offsetGet('payment');

        //初始化支付url
        $baseUrl = ($this->payConfig['is_sandbox']?? false)?'https://open-sandbox.douyin.com':'https://developer.toutiao.com';
        $this->setBaseUri($baseUrl);
    }


    //退款
    public function createRefund($data)
    {
        $data = array_merge([
            "app_id"       => $this->offsetGet('appid'),
        ],$data);
        $data['sign'] = $this->sign($data);
        return $this->json('/api/apps/ecpay/v1/create_refund',$data);

    }

    #
    public function createOrder(array $data): array
    {
        $data = array_merge([
            "app_id"       => $this->offsetGet('appid'),
        ],$data);
        $data['sign'] = $this->sign($data);
//        print_r($data);
        return $this->json('/api/apps/ecpay/v1/create_order',$data);
//        print_r($a);
    }

    /**
     * 回调验签.
     */
    public function signNotify(
        #[ArrayShape([
            'timestamp' => 'string',
            'nonce' => 'string',
            'msg' => 'string',
            'msg_signature' => 'string',
            'type' => 'string',
        ])]
        array $map
    ): string {
//        $data =
//        $data = Arr::only($map, ['timestamp', 'nonce', 'msg']);
        $data = ['timestamp'=>$map['timestamp'], 'nonce'=>$map['nonce'], 'msg'=>$map['msg']];
//        $this->c
        $data['token'] = $this->payConfig['token'];

        sort($data, SORT_STRING);

        $string = implode('', $data);

        return sha1($string);
    }

    /**
     * 支付签名.
     */
    public function sign(array $map): string
    {
        $rList = [];
        foreach ($map as $k => $v) {
            if ($k == 'other_settle_params' || $k == 'app_id' || $k == 'sign' || $k == 'thirdparty_id') {
                continue;
            }

            $value = trim(strval($v));
            if (is_array($v)) {
                $value = $this->arrayToStr($v);
            }
            $len = strlen($value);
            if ($len > 1 && str_starts_with($value, '"') && str_ends_with($value, '"')) {
                $value = substr($value, 1, $len - 1);
            }
            $value = trim($value);
            if ($value == '' || $value == 'null') {
                continue;
            }
            $rList[] = $value;
        }
        $rList[] = $this->payConfig['salt'];
//        print_r($rList);
        sort($rList, SORT_STRING);
        return md5(implode('&', $rList));
    }

    public function arrayToStr($map): string
    {
        $isMap = ! static::array_is_list($map);

        $result = '';
        if ($isMap) {
            $result = 'map[';
        }

        ksort($map);

        $paramsArr = [];
        foreach ($map as $k => $v) {
            if ($isMap) {
                if (is_array($v)) {
                    $paramsArr[] = sprintf('%s:%s', $k, $this->arrayToStr($v));
                } else {
                    $paramsArr[] = sprintf('%s:%s', $k, trim(strval($v)));
                }
            } else {
                if (is_array($v)) {
                    $paramsArr[] = $this->arrayToStr($v);
                } else {
                    $paramsArr[] = trim(strval($v));
                }
            }
        }

        $result = sprintf('%s%s', $result, join(' ', $paramsArr));
        if (! $isMap) {
            $result = sprintf('[%s]', $result);
        } else {
            $result = sprintf('%s]', $result);
        }

        return $result;
    }


    static public function array_is_list(array $arr): bool
    {
        $i = 0;
        foreach ($arr as $k => $_) {
            if ($k !== $i++) {
                return false;
            }
        }
        return true;
    }
}