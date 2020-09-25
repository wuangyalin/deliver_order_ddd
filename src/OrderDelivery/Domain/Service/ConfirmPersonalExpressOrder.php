<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;


class ConfirmPersonalExpressOrder extends ConfirmOrder
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
        $orderArr['is_high_priority'] = $order->getIsHighPriority() ? 'Yes' : 'No';

        $confirmationArr['oders_detail'] = $orderArr;
        return $confirmationArr;
    }
}
