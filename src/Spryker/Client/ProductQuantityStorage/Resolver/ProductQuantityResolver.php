<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductQuantityStorage\Resolver;

use Spryker\Client\ProductQuantityStorage\Dependency\Service\ProductQuantityStorageToProductQuantityServiceInterface;
use Spryker\Client\ProductQuantityStorage\Storage\ProductQuantityStorageReaderInterface;

class ProductQuantityResolver implements ProductQuantityResolverInterface
{
    /**
     * @var \Spryker\Client\ProductQuantityStorage\Storage\ProductQuantityStorageReaderInterface
     */
    protected $productQuantityStorageReader;

    /**
     * @var \Spryker\Client\ProductQuantityStorage\Dependency\Service\ProductQuantityStorageToProductQuantityServiceInterface
     */
    protected $productQuantityService;

    public function __construct(
        ProductQuantityStorageReaderInterface $productQuantityStorageReader,
        ProductQuantityStorageToProductQuantityServiceInterface $productQuantityService
    ) {
        $this->productQuantityStorageReader = $productQuantityStorageReader;
        $this->productQuantityService = $productQuantityService;
    }

    public function getNearestQuantity(int $idProduct, int $quantity): int
    {
        $productQuantityTransfer = $this->productQuantityStorageReader->findProductQuantityStorageMappedToProductQuantityTransfer($idProduct);

        if (!$productQuantityTransfer) {
            return $quantity;
        }

        return $this->productQuantityService->getNearestQuantity($productQuantityTransfer, $quantity);
    }
}
