<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductQuantityStorage;

use Spryker\Client\Kernel\AbstractBundleConfig;

class ProductQuantityStorageConfig extends AbstractBundleConfig
{
    protected const MIN_QUANTITY = 1.0;

    /**
     * @return float
     */
    public function getMinQuantity(): float
    {
        return static::MIN_QUANTITY;
    }
}