<?php
/**
 * Copyright © PassKeeper, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace PassKeeper\CmsUrlRewrite\Model;

use PassKeeper\Cms\Api\Data\PageInterface;

/**
 * @api
 * @since 100.0.2
 */
class CmsPageUrlPathGenerator
{
    /**
     * @var \PassKeeper\Framework\Filter\FilterManager
     */
    protected $filterManager;

    /**
     */
    public function __construct(
        \PassKeeper\Framework\Filter\FilterManager $filterManager
    ) {
        $this->filterManager = $filterManager;
    }

    /**
     * @param PageInterface $cmsPage
     *
     * @return string
     */
    public function getUrlPath(PageInterface $cmsPage)
    {
        return $cmsPage->getIdentifier();
    }

    /**
     * Get canonical product url path
     *
     * @param PageInterface $cmsPage
     * @return string
     */
    public function getCanonicalUrlPath(PageInterface $cmsPage)
    {
        return 'cms/page/view/page_id/' . $cmsPage->getId();
    }

    /**
     * Generate CMS page url key based on url_key entered by merchant or page title
     *
     * @param PageInterface $cmsPage
     * @return string
     */
    public function generateUrlKey(PageInterface $cmsPage)
    {
        $urlKey = $cmsPage->getIdentifier();
        return $this->filterManager->translitUrl($urlKey === '' || $urlKey === null ? $cmsPage->getTitle() : $urlKey);
    }
}
