<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductQuantityStorage;

use Orm\Zed\ProductQuantity\Persistence\SpyProductQuantityQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductQuantityStorage\Dependency\Facade\ProductQuantityStorageToEventBehaviorFacadeBridge;
use Spryker\Zed\ProductQuantityStorage\Dependency\Facade\ProductQuantityStorageToProductQuantityFacadeBridge;

/**
 * @method \Spryker\Zed\ProductQuantityStorage\ProductQuantityStorageConfig getConfig()
 */
class ProductQuantityStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';

    /**
     * @var string
     */
    public const FACADE_PRODUCT_QUANTITY = 'FACADE_PRODUCT_QUANTITY';

    /**
     * @var string
     */
    public const PROPEL_QUERY_PRODUCT_QUANTITY = 'PROPEL_QUERY_PRODUCT_QUANTITY';

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addProductQuantityFacade($container);

        return $container;
    }

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addEventBehaviorFacade($container);

        return $container;
    }

    protected function addEventBehaviorFacade(Container $container): Container
    {
        $container->set(static::FACADE_EVENT_BEHAVIOR, function (Container $container) {
            return new ProductQuantityStorageToEventBehaviorFacadeBridge($container->getLocator()->eventBehavior()->facade());
        });

        return $container;
    }

    protected function addProductQuantityFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRODUCT_QUANTITY, function (Container $container) {
            return new ProductQuantityStorageToProductQuantityFacadeBridge($container->getLocator()->productQuantity()->facade());
        });

        return $container;
    }

    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container->set(static::PROPEL_QUERY_PRODUCT_QUANTITY, $container->factory(function () {
            return SpyProductQuantityQuery::create();
        }));

        return $container;
    }
}
