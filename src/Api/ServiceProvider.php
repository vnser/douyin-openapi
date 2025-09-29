<?php

declare(strict_types=1);

namespace vring\DouyinOpenapi\Api;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use vring\DouyinOpenapi\Api\Ad\Capacity;
use vring\DouyinOpenapi\Api\PhoneNumber\PhoneNumber;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Container $pimple)
    {
        $pimple['privacy_setting'] = function ($pimple) {
            return new PrivacySetting(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
