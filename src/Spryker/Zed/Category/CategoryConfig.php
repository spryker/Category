<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Category;

use Spryker\Shared\Category\CategoryConfig as SharedCategoryConfig;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class CategoryConfig extends AbstractBundleConfig
{
    /**
     * Default available template for category
     */
    public const CATEGORY_TEMPLATE_DEFAULT = 'Catalog (default)';

    /**
     * Used as `item_type` for touch mechanism.
     */
    public const RESOURCE_TYPE_CATEGORY_NODE = SharedCategoryConfig::RESOURCE_TYPE_CATEGORY_NODE;

    /**
     * Used as `item_type` for touch mechanism.
     */
    public const RESOURCE_TYPE_NAVIGATION = SharedCategoryConfig::RESOURCE_TYPE_NAVIGATION;

    /**
     * The name for default locale displayed in the Images tab of a create/edit page.
     */
    public const DEFAULT_LOCALE_NAME = 'default';

    protected const REDIRECT_URL_DEFAULT = '/category/root';

    /**
     * @return array
     */
    public function getTemplateList()
    {
        return [
            static::CATEGORY_TEMPLATE_DEFAULT => '',
        ];
    }

    /**
     * @return string
     */
    public function getDefaultRedirectUrl(): string
    {
        return static::REDIRECT_URL_DEFAULT;
    }
}
