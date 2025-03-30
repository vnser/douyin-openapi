<?php

namespace vnser\DouyinOpenapi\Api\Ad;

use vnser\DouyinOpenapi\DouyinClient;


//流量主
class Capacity extends DouyinClient
{
    /***
     * @Notes:验券准备
     * @Interface certificate_prepare
     * @param $params
     * 参数code 原始的抖音团购券码 (encrypted_data/code必须二选一)
     * @return array|null
     * @author: yijun
     * @Time: 2023/11/24   4:55 下午
     */
    public function query_ad_income($params,$accessToken=''): ?array
    {
        return $this->get('/api/apps/v3/capacity/query_ad_income/', $params);
    }
}