<?php

namespace FondOfOryx\Zed\OneTimePasswordRestApi;

use FondOfOryx\Zed\OneTimePasswordRestApi\Dependency\Facade\OneTimePasswordRestApiToCustomerFacadeBridge;
use FondOfOryx\Zed\OneTimePasswordRestApi\Dependency\Facade\OneTimePasswordRestApiToOneTimePasswordFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class OneTimePasswordRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_ONE_TIME_PASSWORD = 'FACADE_ONE_TIME_PASSWORD';

    /**
     * @var string
     */
    public const FACADE_CUSTOMER = 'FACADE_CUSTOMER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addOneTimePasswordFacade($container);
        $container = $this->addCustomerFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addOneTimePasswordFacade(Container $container): Container
    {
        $container[static::FACADE_ONE_TIME_PASSWORD] = static function (Container $container) {
            return new OneTimePasswordRestApiToOneTimePasswordFacadeBridge(
                $container->getLocator()->oneTimePassword()->facade(),
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCustomerFacade(Container $container): Container
    {
        $container[static::FACADE_CUSTOMER] = static function (Container $container) {
            return new OneTimePasswordRestApiToCustomerFacadeBridge(
                $container->getLocator()->customer()->facade(),
            );
        };

        return $container;
    }
}
