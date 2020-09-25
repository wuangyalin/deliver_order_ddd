<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Strategy\ProcessOrderInterface;


class ProcessPersonalExpressOrder implements ProcessOrderInterface
{
    /**
     * The aim of this method is to do something to speed up the express order
     * At this time, return true directly
     * 
     * @param Order $order
     * @return boolean
     */
    public function processOrder(Order $order): bool
    {
        return true;
    }
}
