<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;


class SendPersonalExpressOrder extends SendOrder
{

    /**
     * placed orders from request to object
     *
     * @param array $order
     * @return Order
     */
    public function issueOrder(array $order): Order
    {
        $newOrder = $this->_parseGeneralFieldToEntity($order);
        $newOrder->setIsHighPriority(false);
        return $newOrder;
    }
}
