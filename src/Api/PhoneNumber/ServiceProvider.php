<?php

declare(strict_types=1);

namespace vring\DouyinOpenapi\Api\PhoneNumber;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use vring\DouyinOpenapi\Api\Ad\Capacity;

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
        $pimple['phone_number'] = function ($pimple) {
            return new PhoneNumber(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
