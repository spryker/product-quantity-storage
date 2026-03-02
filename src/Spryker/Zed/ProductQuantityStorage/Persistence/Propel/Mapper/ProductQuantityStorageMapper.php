<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductQuantityStorage\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\SpyProductQuantityStorageEntityTransfer;
use Orm\Zed\ProductQuantityStorage\Persistence\SpyProductQuantityStorage;

class ProductQuantityStorageMapper implements ProductQuantityStorageMapperInterface
{
    public function hydrateSpyProductQuantityStorageEntity(
        SpyProductQuantityStorage $spyProductQuantityStorageEntity,
        SpyProductQuantityStorageEntityTransfer $productQuantityStorageEntity
    ): SpyProductQuantityStorage {
        $spyProductQuantityStorageEntity->fromArray($productQuantityStorageEntity->toArray(true));

        return $spyProductQuantityStorageEntity;
    }
}
