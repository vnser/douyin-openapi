<?php

declare(strict_types=1);

namespace vnser\DouyinOpenapi;

use Ydg\FoudationSdk\ServiceContainer;
use vnser\DouyinOpenapi\Api\Ad\ServiceProvider;

/**
 * @property Oauth\Oauth $oauth
 * @property Api\Life\OutsideDistribution\OutsideDistribution $lifeOutsideDistribution
 * @property Api\Life\GoodsLife\GoodsLife $goodsLife
 * @property Api\Ad\Capacity $ad
 */
class Douyin extends ServiceContainer
{
    protected $providers = [
        Oauth\ServiceProvider::class,
        Api\Life\OutsideDistribution\ServiceProvider::class,
        Api\Life\GoodsLife\ServiceProvider::class,
        ServiceProvider::class,
    ];
}
