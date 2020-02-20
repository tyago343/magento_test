<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FreeIntro\MagentoUnitest\Test;

class RouterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\App\ActionFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $actionFactoryMock;

    /**
     * @var \Magento\Robots\Controller\Router
     */
    private $router;

    protected function setUp()
    {
        $this->actionFactoryMock = $this->getMockBuilder(\Magento\Framework\App\ActionFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMock();

        $this->router = new \FreeIntro\FixedModule\Controller\Router($this->actionFactoryMock);
    }

    /**
     * Check the basic flow of match() method
     */
    public function testMatch()
    {
        $identifier = '/fixedmodule-storefront-page';
        $actionClassName = \Magento\Framework\App\Action\Forward::class;

        $requestMock = $this->getMockBuilder(\Magento\Framework\App\RequestInterface::class)
            ->setMethods(['getPathInfo', 'setModuleName', 'setControllerName', 'setActionName'])
            ->getMockForAbstractClass();
        $requestMock->expects($this->once())
            ->method('getPathInfo')
            ->willReturn($identifier);

        $actionClassMock = $this->getMockBuilder($actionClassName)->disableOriginalConstructor()->getMock();

        $this->actionFactoryMock->expects($this->once())
            ->method('create')
            ->with('\Magento\Framework\App\Action\Forward')
            ->willReturn($actionClassMock);

        $this->assertInstanceOf($actionClassName, $this->router->match($requestMock));
    }

    /**
     * Check the basic flow of match() method
     */
    public function testNotMatch()
    {
        $identifier = 'fixedmodule/storefront/page';

        $requestMock = $this->getMockBuilder(\Magento\Framework\App\RequestInterface::class)
            ->setMethods(['getPathInfo', 'setModuleName', 'setControllerName', 'setActionName'])
            ->getMockForAbstractClass();
        $requestMock->expects($this->once())
            ->method('getPathInfo')
            ->willReturn($identifier);

        $this->assertFalse(
            $this->router->match($requestMock),
            'Customer Router does not return false when there is no match found'
        );
    }
}
