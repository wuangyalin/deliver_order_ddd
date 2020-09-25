<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;
use App\OrderDelivery\Domain\Strategy\ConfirmOrderInterface;
use App\OrderDelivery\Infrastructure\Ulti\Constant;



abstract class ConfirmOrder implements ConfirmOrderInterface
{
    /**
     * set up confirmation object
     *
     * @param Order $order
     * @return Confirmation
     */
    public function confirmOrder(Order $order): Confirmation
    {
        $confirmation = new Confirmation();
        $confirmation->setStatus(Constant::CONFIRMATION_STATUS_ISSUED);
        $confirmation->setInfo('Order has been confirmed');
        $confirmation->setReceiveDate(new \DateTime());
        $confirmation->setOrderDetail($order);
        return $confirmation;
    }

    /**
     * help method to convert general fields to array
     *
     * @param Confirmation $confirmation
     * @return array
     */
    protected function _genralConfirmationArray(Confirmation $confirmation): array
    {
        $confirmationArr = [
            'status' => $confirmation->getStatus(),
            'info' => $confirmation->getInfo(),
            'receive_date' => $confirmation->getReceiveDate(),
        ];

        return $confirmationArr;
    }

    /**
     * help method to convert general fields to array
     *
     * @param Order $order
     * @return array
     */
    protected function _genralOrderArray(Order $order): array
    {
        $orderArr = [
            'customer' => [
                'name' => $order->getCustomer()->getName(),
                'address' => $order->getCustomer()->getAddress(),
            ],
            'type' => $order->getType()->getName(),
            'source' => $order->getSource(),
            'weight' => $order->getWeight(),
            'status' => $order->getStatus(),
            'create_date' => $order->getCreateTime(),
        ];
        if ($order->getSource() == 'email') {
            $campaign = [
                'name' => $order->getCampaign()->getName(),
                'type' => $order->getCampaign()->getType(),
                'ad' => $order->getCampaign()->getAd(),
            ];
            $orderArr['campaign'] = $campaign;
            $orderArr['is_notified_campaign'] = $order->getIsNotifiedCampaign() ? 'Yes' : 'No';
        }

        return $orderArr;
    }

    /**
     * convert confirmation object with enterprise order to array
     *
     * @param Confirmation $confirmation
     * @return array
     */
    abstract public function objectToArray(Confirmation $confirmation): array;
}
