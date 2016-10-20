<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Category\Business\Model;

use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;

class CategoryToucher implements CategoryToucherInterface
{

    /**
     * @var \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface $touchFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $queryContainer
     */
    public function __construct(CategoryToTouchInterface $touchFacade, CategoryQueryContainerInterface $queryContainer)
    {
        $this->touchFacade = $touchFacade;
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param int $idCategoryNode
     *
     * @return void
     */
    public function touchCategoryNodeActiveRecursively($idCategoryNode)
    {
        foreach ($this->getRelatedNodes($idCategoryNode) as $relatedNodeEntity) {
            $this->touchCategoryNodeActive($relatedNodeEntity->getFkCategoryNodeDescendant());
        }

        $this->touchCategoryNodeActive($idCategoryNode);
    }

    /**
     * @param int $idCategoryNode
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryClosureTable[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getRelatedNodes($idCategoryNode)
    {
        $relatedNodeCollection = $this
            ->queryContainer
            ->queryClosureTableByNodeId($idCategoryNode)
            ->find();

        return $relatedNodeCollection;
    }

    /**
     * @param int $idCategoryNode
     *
     * @return void
     */
    public function touchCategoryNodeActive($idCategoryNode)
    {
        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idCategoryNode);
    }

    /**
     * @param int $idCategoryNode
     *
     * @return void
     */
    public function touchCategoryNodeDeleted($idCategoryNode)
    {
        $this->touchFacade->touchDeleted(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idCategoryNode);
    }

}
