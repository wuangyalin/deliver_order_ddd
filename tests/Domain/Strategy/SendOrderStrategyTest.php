<?php

namespace App\Tests\Domain\Strategy;

use PHPUnit\Framework\TestCase;
use APP\OrderDelivery\Domain\Strategy\SendOrderStrategy;
use APP\OrderDelivery\Domain\Service\SendPersonalOrder;
use APP\OrderDelivery\Domain\Service\SendPersonalExpressOrder;
use APP\OrderDelivery\Domain\Service\SendEnterpriseOrder;
use APP\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Infrastructure\Ulti\Constant;

class SendOrderStrategyTest extends TestCase implements OrderStrategyTestInterface
{
    public function testPersonalTypeStrategy()
    {
        $stragety = new SendOrderStrategy(new SendPersonalOrder());
        $order = $stragety->issueOrder(Constant::VALID_ORDERS[0]);
        $this->assertInstanceOf(Order::class, $order);
    }

    public function testPersonalExpressTypeStrategy()
    {
        $stragety = new SendOrderStrategy(new SendPersonalExpressOrder());
        $order = $stragety->issueOrder(Constant::VALID_ORDERS[1]);
        $this->assertInstanceOf(Order::class, $order);
    }


    public function testEnterpriseTypeStrategy()
    {
        $stragety = new SendOrderStrategy(new SendEnterpriseOrder());
        $order = $stragety->issueOrder(Constant::VALID_ORDERS[2]);
        $this->assertInstanceOf(Order::class, $order);
    }

}
