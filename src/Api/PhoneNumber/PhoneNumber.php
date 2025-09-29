<?php

namespace vring\DouyinOpenapi\Api\PhoneNumber;

use vring\DouyinOpenapi\DouyinClient;
use vring\DouyinOpenapi\Support\Utils;

//流量主
class PhoneNumber extends DouyinClient
{
    /***
     * @Interface certificate_prepare
     * @return array|null
     */
    public function getUserPhoneNumber($code): ?array
    {
        $res = $this->json('/api/apps/v1/get_phonenumber_info/', ['code'=>$code]);
    /*    print_r($res);
        $res = $array = array(
            'log_id' => '20250929120636E47FDADA0A3CDA7D20A5',
            'data'   => 'SDMw1K+bcWmiU5DBoC1SplHsJezUtx4zv7Fo2qGqJEfvPImj7cfEHGPmBaXjXMk1E0uxFc+1RWj7sZVvehIiWcJ5Mqruvu68tXPEuRASwyVQnvmpzWqUGoYLQu53hRA+EIYA4J+WXUZuQ60ZKikoR9M0GIWOf0zalJ4VSe3dLS9sDQyqewbW8l0krYs4QD9w916ewgZLouGdsyXdDrxedSqCPtKrbaKHECINOllBxi+uJMNUGcJ6R04e7pGRGvtqSrSt1sJYWTAsJXtrcywEsz+Ae2969QdU8LMnJVyp51EaoMpnWzD2ydmIor6CvtPVjw6M0eEWvWZhqaLve4NqCQ==',
            'err_msg' => '',
            'err_no'  => 0,
        );*/

        if ($res['err_no'] == 0){
            $data = json_decode(Utils::rsaDecryptData($this->offsetGet('private_key'),$res['data']),true);
            return array_merge($res,[
                'data'=>$data
            ]);
        }
        return $res;
    }
}