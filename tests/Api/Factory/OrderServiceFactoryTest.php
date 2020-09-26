<?php

namespace App\Tests\Api\Factory;

use App\OrderDelivery\Api\Service\SendOrderService;
use App\OrderDelivery\Api\Service\ConfirmOrderService;
use App\OrderDelivery\Api\Service\ProcessOrderService;

class OrderServiceFactoryTest extends AbstractFactoryTest
{
    public function testReturnDesiredService()
    {
        $service1 = $this->factory->create('send');
        $service2 = $this->factory->create('valid');
        $service3 = $this->factory->create('confirm');
        $this->assertInstanceOf(SendOrderService::class, $service1);
        $this->assertInstanceOf(ProcessOrderService::class, $service2);
        $this->assertInstanceOf(ConfirmOrderService::class, $service3);

    }
}
