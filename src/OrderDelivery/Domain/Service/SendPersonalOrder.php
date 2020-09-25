<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;


class SendPersonalOrder extends SendOrder
{
    /**
     * placed orders from request to object
     *
     * @param array $order
     * @return Order
     */
    public function issueOrder(array $order): Order
    {
        return $this->_parseGeneralFieldToEntity($order);
    }
}
