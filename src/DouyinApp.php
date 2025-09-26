<?php
declare(strict_types=1);

namespace vring\DouyinOpenapi;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

class DouyinApp
{

    /**
     * @param $appid
     * @param $appsecret
     * @return Douyin
     * @throws \Exception
     */
    static public function make($appid, $appsecret)
    {
        $accessToken = self::getAccessToken($appid, $appsecret);
        return new Douyin(['access_token' => $accessToken, 'appid' => $appid,'appsecret'=>$appsecret]);
    }

    /**
     * 获取access_token 缓存
     * @param $appid
     * @param $appsecret
     * @return array|null
     * @throws \Exception
     */
    static public function getAccessToken($appid, $appsecret)
    {
        $cache = new FilesystemAdapter();
        $kname = 'dyopenaccess_token_' . $appid;
        $accessToken = $cache->getItem($kname);
        if (!$accessToken->isHit()) {
            $app = new Douyin();
            $res = $app->oauth->client_token([
                'client_key' => $appid,
                'client_secret' => $appsecret,
            ]);
            if ($res['data']['error_code'] !== 0) {
                throw new \Exception($res['data']['description']);
            }
            $accessToken->set($res['data']['access_token']);
            $accessToken->expiresAfter(7200); // 1小时后过期
            $cache->save($accessToken);
            return $res['data']['access_token'];
        }
        return $accessToken->get();
    }
}