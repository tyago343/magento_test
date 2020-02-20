<?php
/**
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeIntro\BrokenModule\Controller\Storefront;

use Magento\Framework\Controller\Result\Raw;

/**
 * Class Page
 * @package FreeIntro\BrokenModule\Controller\Storefront
 */
class Page extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Raw
     */
    protected $result;

    /**
     * Page constructor.
     * @param Raw $resultRaw
     */
    public function __construct(Raw $resultRaw, Context $context)
    {
        $this->result = $resultRaw;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->result->setContents('Custom storefront page');
    }
}
