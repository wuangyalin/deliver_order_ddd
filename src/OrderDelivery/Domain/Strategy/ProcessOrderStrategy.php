<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;


/**
 * this startegy is for process different order by type in runtime
 */
class ProcessOrderStrategy
{
    protected $processOrder;


    public function __construct(ProcessOrderInterface $processOrder)
    {
        $this->processOrder = $processOrder;
    }

    public function processOrder(Order $order): bool
    {
        return $this->processOrder->processOrder($order);
    }
}
