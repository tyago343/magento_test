<?php
/**
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeIntro\BrokenModule\Controller;

use Magento\Framework\App\Action\Forward;

/**
 * Class Router
 * @package FreeIntro\BrokenModule\Controller
 */
class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory|null
     */
    protected $_actionFactory = null;

    /**
     * Router constructor.
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     */
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory)
    {
        $this->_actionFactory = $actionFactory;
    }

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @return null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        if (preg_match($this->getUrlPattern(), $request->getPathInfo(), $matches)) {
            $request->setModuleName($matches[1]);
            $request->setControllerName($matches[2]);
            $request->setActionName(trim($matches[3], '/'));
            /** Forward class path should statrs with \ using ::class will give you path without
             *  first slash and test will failed
             */
            return $this->_actionFactory->create(
                '\Magento\Framework\App\Action\Forward',
                ['request' => $request]
            );
        }

        return false;
    }

    /**
     * @return string
     */
    public function getUrlPattern(): string
    {
        return self::URL_SCHEMA;
    }
}
