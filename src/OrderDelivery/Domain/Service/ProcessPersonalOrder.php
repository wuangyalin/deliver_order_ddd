<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Strategy\ProcessOrderInterface;


class ProcessPersonalOrder implements ProcessOrderInterface
{
    public function processOrder(Order $order): bool
    {
        //do nothing as personal order do not need another process
        return true;
    }
}
