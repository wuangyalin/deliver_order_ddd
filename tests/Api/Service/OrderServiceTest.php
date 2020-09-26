<?php

namespace App\Tests\Api\Service;

use App\OrderDelivery\Infrastructure\Ulti\Constant;

class OrderServiceTest extends AbstractServiceTest
{
    public function testProcessData()
    {   
        //check if no issued order
        $result = $this->processOrderService->processData(Constant::API_TOKEN);
        $this->assertEquals('no-order', $result['status']);
        //check if no processed order
        $result = $this->confirmOrderService->processData(Constant::API_TOKEN);
        $this->assertEquals('no-order', $result['status']);

        //check issue new orders
        $resultValid = $this->sendOrderService->processData(Constant::VALID_ORDERS);
        $resultEmtpy = $this->sendOrderService->processData(Constant::EMPTY_ORDERS);

        $this->assertEquals('Success', $resultValid['status']);
        $this->assertEquals('Empty', $resultEmtpy['status']);

        //check process issued orders
        $result = $this->processOrderService->processData(Constant::API_TOKEN);
        $this->assertEquals('Success', $result['status']);

        //check confirm orders
        $result = $this->confirmOrderService->processData(Constant::API_TOKEN);
        $this->assertEquals('Success', $result['status']);
    }
}
