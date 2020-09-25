<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Strategy\SendOrderInterface;
use App\OrderDelivery\Domain\ValueObject\OrderType;
use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\ValueObject\Campaign;
use App\OrderDelivery\Infrastructure\Ulti\Constant;


abstract class SendOrder implements SendOrderInterface
{

    /**
     * helper function to parse array to object for common fields
     *
     * @param array $order
     * @return Order
     */
    protected function _parseGeneralFieldToEntity(array $order): Order
    {
        $currentOrder = new Order();
        $currentOrder->setStatus(Constant::ORDER_STATUS_INITIAL);
        $currentOrder->setWeight($order['weight']);
        $currentOrder->setOnBehalf(isset($order['onBehalf']) ? $order['onBehalf'] : '');
        $currentOrder->setSource($order['source']);
        $currentOrder->setType(new OrderType($order['deliveryType']));
        $customer = new Person($order['customer']['name'], $order['customer']['address']);
        $currentOrder->setCustomer($customer);
        $currentOrder->setCreateTime(new \DateTime());
        if (strtolower($order['source']) == 'email') {
            $currentOrder = $this->_checkCampaign($order, $currentOrder);
        }
        return $currentOrder;
    }

    /**
     * check the if this order is 
     *
     * @param array $orderArr
     * @param Order $orderObj
     * @return Order
     */
    private function _checkCampaign(array $orderArr, Order $orderObj): Order
    {
        if (isset($orderArr['campaign'])) {
            $campaign = new Campaign($orderArr['campaign']['name'], $orderArr['campaign']['type'], $orderArr['campaign']['ad']);
            $orderObj->setCampaign($campaign);
            $orderObj->setIsNotifiedCampaign(false);
        } else {
            throw new \Exception('Invalid Order');
        }

        return $orderObj;
    }


    /**
     * placed orders from request to object
     *
     * @param array $order
     * @return Order
     */
    abstract function issueOrder(array $order): Order;
}
