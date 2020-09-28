<?php

namespace App\Tests\Domain\Service;

use App\OrderDelivery\Domain\Service\SendPersonalOrder;
use App\OrderDelivery\Domain\Exception\InvalidOrderTypeException;
use App\OrderDelivery\Infrastructure\Ulti\Constant;

class SendPersonalOrderTest extends AbstractSendServiceTest
{
    public function testIssueValidOrders()
    {
        $service = new SendPersonalOrder();
        $response = $service->issueOrder($this->samplePersonalOrderArr);
        $this->assertEquals(Constant::ORDER_STATUS_INITIAL, $response->getStatus());
        
    }

    public function testIssueInValidOrders()
    {
        $this->expectException(InvalidOrderTypeException::class);
        $service = new SendPersonalOrder();
        $this->samplePersonalOrderArr['deliveryType'] = '123';
        $response = $service->issueOrder($this->samplePersonalOrderArr);

    }
}
