<?php

namespace App\Tests\Domain\Service;

use App\OrderDelivery\Domain\Service\ConfirmPersonalOrder;
use App\OrderDelivery\Infrastructure\Ulti\Constant;


class ConfirmPersonalOrderTest extends AbstractConfirmServiceTest
{
    public function testConfirmValidOrder()
    {
        $service = new ConfirmPersonalOrder();
        $result = $service->objectToArray($this->samplePersonalConfirmationObj);
        $this->assertEquals(Constant::CONFIRMATION_STATUS_ISSUED, $result['status']); 
    }
}
