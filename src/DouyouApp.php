<?php
declare(strict_types=1);

namespace vnser\DouyinOpenapi;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

class DouyouApp{
    static public function make($appid,$appsecret)
    {
        $accessToken = self::getAccessToken($appid,$appsecret);
//        var_dump($accessToken);
        return new Douyin(['access_token' =>$accessToken]);

    }


    /**
     * 获取access_token
     * @return array|null
     */
    static public function getAccessToken($appid,$appsecret)
    {
        $cache = new FilesystemAdapter();

// 设置缓存（key, value, 过期时间）
        $kname = 'dyopenaccess_token_'.$appid;
        $accessToken = $cache->getItem($kname);
//        var_dump($accessToken);
//        var_dump($accessToken);

//        new CacheItem()
        if (!$accessToken->isHit()){
            $app = new Douyin();
            $res =  $app->oauth->client_token([
                'client_key' => $appid,
                'client_secret' => $appsecret,
            ]);
            if ($res['data']['error_code'] !== 0){
                throw new \Exception($res['data']['description']);
            }
//            CacheItem::
            $accessToken->set($res['data']['access_token']);
            $accessToken->expiresAfter(7200); // 1小时后过期
            $cache->save($accessToken);
            return $res['data']['access_token'];

        }
        return $accessToken->get();

    }
}