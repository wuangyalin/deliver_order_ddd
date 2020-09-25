<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;

/**
 * this startegy is for place different order by type in runtime
 */
class SendOrderStrategy
{
    protected $issueOrder;


    public function __construct(SendOrderInterface $issueOrder)
    {
        $this->issueOrder = $issueOrder;
    }

    public function issueOrder(array $order): Order
    {
        return $this->issueOrder->issueOrder($order);
    }
}
