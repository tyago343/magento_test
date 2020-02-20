<?php
/**
 * Copyright © 2019 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeIntro\RoutersAmount\Observer;

use Magento\Framework\App\RouterList;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

/**
 * Class RoutersAmount
 * @package FreeIntro\RoutersAmount
 */
class RoutersAmount implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\RouterList
     */
    protected $_routerList;


    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $_psrLogger;

    /**
     * RoutersAmount constructor.
     * @param RouterList $routerList
     * @param \Psr\Log\LoggerInterface $psrLogger
     */
    public function __construct(RouterList $routerList, LoggerInterface $psrLogger)
    {
        $this->_routerList = $routerList;
        $this->_psrLogger = $psrLogger;
    }


    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $routersArray = [];
        foreach ($this->_routerList as $router) {
            $routersArray[] = $router;
        }

        $routersArray = array_map(
            function ($item) {
                return get_class($item);
            },
            $routersArray
        );

        $logString = 'Routers List ' . PHP_EOL . implode(PHP_EOL, $routersArray);

        $this->_psrLogger->info($logString);
    }
}
