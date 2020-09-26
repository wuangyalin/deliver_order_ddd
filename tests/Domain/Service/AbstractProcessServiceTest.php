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


abstract class AbstractProcessServiceTest extends TestCase
{

    protected $samplePersonalOrderObj;
    protected $samplePersonaExpresslOrderObj;
    protected $sampleEnterpriseOrderObj;
    

    protected function setUp(): void
    {
        //personal
        $this->samplePersonalOrderObj = new Order();
        $this->samplePersonalOrderObj->setCustomer(new Person('Luke', 'Gong'));
        $this->samplePersonalOrderObj->setType(new OrderType('personalDelivery'));
        $this->samplePersonalOrderObj->setSource('web');
        $this->samplePersonalOrderObj->setWeight(1500);
        $this->samplePersonalOrderObj->setStatus(Constant::ORDER_STATUS_INITIAL);
        $this->samplePersonalOrderObj->setCreateTime(new \DateTime());
        //TODO personalexpress

        //TODO enterprise
        
    }

    abstract public function testProcessValidOrder();
    abstract public function testProcessInValidOrder();
}
