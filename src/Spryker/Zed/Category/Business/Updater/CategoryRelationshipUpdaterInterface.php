<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Category\Business\Updater;

use Generated\Shared\Transfer\CategoryTransfer;

interface CategoryRelationshipUpdaterInterface
{
    /**
     * @param \Generated\Shared\Transfer\CategoryTransfer $categoryTransfer
     *
     * @return void
     */
    public function updateCategoryRelationships(CategoryTransfer $categoryTransfer): void;
}
