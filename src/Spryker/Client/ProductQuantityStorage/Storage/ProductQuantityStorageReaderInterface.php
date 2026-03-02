<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ProductQuantityStorage\Storage;

use Generated\Shared\Transfer\ProductQuantityStorageTransfer;
use Generated\Shared\Transfer\ProductQuantityTransfer;

interface ProductQuantityStorageReaderInterface
{
    public function findProductQuantityStorage(int $idProduct): ?ProductQuantityStorageTransfer;

    public function findProductQuantityStorageMappedToProductQuantityTransfer(int $idProduct): ?ProductQuantityTransfer;
}
