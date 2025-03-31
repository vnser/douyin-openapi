<?php

namespace vring\DouyinOpenapi\Api\Ad;

use vring\DouyinOpenapi\DouyinClient;


//流量主
class Capacity extends DouyinClient
{
    /***
     * 流量主查询广告收入
     * @Interface certificate_prepare
     * @param $params
     * @return array|null
     */
    public function query_ad_income($params): ?array
    {
        return $this->get('/api/apps/v3/capacity/query_ad_income/', $params);
    }
}