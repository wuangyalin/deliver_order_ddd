<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Strategy\ProcessOrderInterface;


class ProcessEnterpriseOrder implements ProcessOrderInterface
{
    /**
     * the aim of this method is to sent off to a 3rd party API for validation of the enterprise.
     * at this time, return true directly
     *
     * @param Order $order
     * @return boolean
     */
    public function processOrder(Order $order): bool
    {
        return true;
    }
}
