<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;
use App\OrderDelivery\Domain\Strategy\ConfirmOrderInterface;


class ConfirmEnterpriseOrder extends ConfirmOrder
{

    /**
     * convert confirmation object with enterprise order to array
     *
     * @param Confirmation $confirmation
     * @return array
     */
    public function objectToArray(Confirmation $confirmation): array
    {
        $order = $confirmation->getOrderDetail();
        $confirmationArr = $this->_genralConfirmationArray($confirmation);
        $orderArr = $this->_genralOrderArray($order);
        $orderArr['is_valid_enterprise'] = $order->getIsValidEnterprise() ? 'Yes' : 'No';
        $enterprise = [
            'name' => $order->getEnterprise()->getName(),
            'type' => $order->getEnterprise()->getType(),
            'abn' => $order->getEnterprise()->getAbn(),
        ];
        foreach ($order->getEnterprise()->getDirectors() as $director) {
            $enterprise['directorys'] = [
                'name' => $director->getName(),
                'address' => $director->getAddress()
            ];
        }
        $orderArr['enterprise'] = $enterprise;
        $confirmationArr['oders_detail'] = $orderArr;
        return $confirmationArr;
    }
}
