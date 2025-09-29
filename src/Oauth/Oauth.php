<?php

declare(strict_types=1);

namespace vring\DouyinOpenapi\Oauth;

use vring\DouyinOpenapi\DouyinClient;
use vring\DouyinOpenapi\Support\Utils;

class Oauth extends DouyinClient
{
    /**
     * 生成 client_token
     * @param $params
     * @return array
     * @example params['client_secret'] 应用密钥
     * @example params['grant_type']    授权类型
     * @example params['client_key']    应用标识
     */
    public function client_token($params): ?array
    {
        $params['grant_type'] = $params['grant_type'] ?? 'client_credential';
        $response = $this->getHttpClient()->post($this->getUri('/oauth/client_token'), $params);
        return Utils::jsonResponseToArray($response);
    }

    public function code2Session($code)
    {
        $appid = $this->offsetGet('appid');
        $appsecret = $this->offsetGet('appsecret');
        $this->setBaseUri('https://developer.toutiao.com');
        $res = $this->getHttpClient()->json($this->getUri('/api/apps/v2/jscode2session'), [
            'appid'=>$appid,
            'secret'=>$appsecret,
            'code'=>$code,
            'anonymous_code'=>''
        ]);
        $res =  Utils::jsonResponseToArray($res);
        if ($res['err_no'] != 0){
            $data = json_decode(Utils::rsaDecryptData($this->offsetGet('private_key'),$res['data']),true);
            return [
                ...$res,'data'=>$data
//                'err_tips'=>$res['err_tips'],
//                'data'=>$data
            ];
        }
        return $res;
//        print_r(  Utils::jsonResponseToArray($res));
//        print_r($this->offsetGet('appid'));

    }
}
