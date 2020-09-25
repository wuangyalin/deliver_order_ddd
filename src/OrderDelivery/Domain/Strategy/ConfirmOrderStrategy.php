<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;


/**
 * this startegy is for confirm different order by type in runtime
 */
class ConfirmOrderStrategy
{
    protected $confirmOrder;


    public function __construct(ConfirmOrderInterface $confirmOrder)
    {
        $this->confirmOrder = $confirmOrder;
    }

    public function confirmOrder(Order $order): Confirmation
    {
        return $this->confirmOrder->confirmOrder($order);
    }

    public function objectToArray(Confirmation $confirmation): array
    {
        return $this->confirmOrder->objectToArray($confirmation);
    }
}
