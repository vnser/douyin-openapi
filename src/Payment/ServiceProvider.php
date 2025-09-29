<?php

declare(strict_types=1);

namespace vring\DouyinOpenapi\Payment;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use vring\DouyinOpenapi\Oauth\Oauth;

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
        $pimple['payment'] = function ($pimple) {
            return new Payment(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
