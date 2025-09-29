<?php

namespace vring\DouyinOpenapi\Api;
use vring\DouyinOpenapi\DouyinClient;

class PrivacySetting extends DouyinClient
{
    public function add($params)
    {
        return $this->json('/api/apps/v1/privacy_setting/add/', $params);
    }

    public function query($params)
    {
        return $this->json('/api/apps/v1/privacy_setting/query/', $params);
    }
}