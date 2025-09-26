<?php

namespace vring\DouyinOpenapi\Api\PhoneNumber;

use vring\DouyinOpenapi\DouyinClient;


//流量主
class PhoneNumber extends DouyinClient
{
    /***
     * @Interface certificate_prepare
     * @return array|null
     */
    public function getUserPhoneNumber($code): ?array
    {
        return $this->post('/api/apps/v1/get_phonenumber_info/', ['code'=>$code]);
    }
}