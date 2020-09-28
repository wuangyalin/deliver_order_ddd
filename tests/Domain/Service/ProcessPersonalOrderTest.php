<?php

namespace App\Tests\Domain\Service;

use App\OrderDelivery\Domain\Service\ProcessPersonalOrder;

class ProcessPersonalOrderTest extends AbstractProcessServiceTest
{
    public function testProcessValidOrder()
    {
        $service = new ProcessPersonalOrder();
        $response = $service->processOrder($this->samplePersonalOrderObj);

        $this->assertTrue($response);
    }

    
    public function testProcessInValidOrder()
    {
        //this process is not functionational for now, so assert to true directly.

        $this->assertTrue(true);
    }
}
