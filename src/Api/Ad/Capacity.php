<?php

namespace vnser\DouyinOpenapi\Api\Ad;

use vnser\DouyinOpenapi\DouyinClient;


//流量主
class Capacity extends DouyinClient
{
    /***
     * 流量主查询广告收入
     * @Interface certificate_prepare
     * @param $params
     * @return array|null
     * @author: yijun
     */
    public function query_ad_income($params,$accessToken=''): ?array
    {
        return $this->get('/api/apps/v3/capacity/query_ad_income/', $params);
    }
}