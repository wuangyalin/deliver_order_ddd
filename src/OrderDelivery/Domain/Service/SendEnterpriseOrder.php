<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\ValueObject\Enterprise;

class SendEnterpriseOrder extends SendOrder
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
        if (isset($order['enterprise'])) {
            $directors = [];
            if (isset($order['enterprise']['directors'])) {
                foreach ($order['enterprise']['directors'] as $director) {
                    $directors[] = new Person($director['name'], $director['address']);
                }
            }
            $enterprise = new Enterprise(
                $order['enterprise']['name'],
                $order['enterprise']['type'],
                $order['enterprise']['abn'],
                $directors
            );
            $newOrder->setEnterprise($enterprise);
            $newOrder->setIsValidEnterprise(false);
        } else {
            throw new \Exception('Invalid Order');
        }

        return $newOrder;
    }
}
