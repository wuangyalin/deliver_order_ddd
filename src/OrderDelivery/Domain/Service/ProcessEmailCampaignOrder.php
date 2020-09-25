<?php

namespace App\OrderDelivery\Domain\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Strategy\ProcessOrderInterface;


class ProcessEmailCampaignOrder implements ProcessOrderInterface
{


    /**
     * The aim of this method is to communicate with a separate marketing service indicating the success of the given email campaign
     * At this time, return true directly
     *
     * @param Order $order
     * @return boolean
     */
    public function processOrder(Order $order): bool
    {   
        return true;
    }
}
