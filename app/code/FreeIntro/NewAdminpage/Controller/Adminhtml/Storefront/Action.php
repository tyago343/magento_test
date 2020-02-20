<?php
/**
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeIntro\NewAdminpage\Controller\Adminhtml\Storefront;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Action
 * @package FreeIntro\NewAdminpage\Controller\Storefront
 */
class Action extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'FreeIntro_NewAdminpage::custom_page';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Action constructor.
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory, Context $context)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }


    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $adminPage = $this->resultPageFactory->create();
        $adminPage->setActiveMenu('FreeIntro_NewAdminpage::custom_page');
        $adminPage->addBreadcrumb(__('System'), __('System'));

        return $adminPage;
    }
}