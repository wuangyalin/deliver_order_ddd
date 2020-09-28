<?php

namespace App\Tests\Domain\Service;

use PHPUnit\Framework\TestCase;
use App\OrderDelivery\Infrastructure\Ulti\Constant;
use App\OrderDelivery\Domain\Entity\Confirmation;
use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\ValueObject\Campaign;
use App\OrderDelivery\Domain\ValueObject\OrderType;
use App\OrderDelivery\Domain\ValueObject\Enterprise;


abstract class AbstractConfirmServiceTest extends TestCase
{

    protected $samplePersonalOrderObj;
    protected $samplePersonalConfirmationObj;    

    protected function setUp(): void
    {
        //Personal
        $this->samplePersonalOrderObj = new Order();
        $this->samplePersonalOrderObj->setCustomer(new Person('Luke', 'Gong'));
        $this->samplePersonalOrderObj->setType(new OrderType('personalDelivery'));
        $this->samplePersonalOrderObj->setSource('web');
        $this->samplePersonalOrderObj->setWeight(1500);
        $this->samplePersonalOrderObj->setStatus(Constant::ORDER_STATUS_INITIAL);
        $this->samplePersonalOrderObj->setCreateTime(new \DateTime());
        
        $this->samplePersonalConfirmationObj = new Confirmation();
        $this->samplePersonalConfirmationObj->setStatus(Constant::CONFIRMATION_STATUS_ISSUED);
        $this->samplePersonalConfirmationObj->setInfo('Confirmed');
        $this->samplePersonalConfirmationObj->setOrderDetail($this->samplePersonalOrderObj);
        
        //TODO personalexpress

        //TODO enterprise
    }

    abstract public function testConfirmValidOrder();
}
