<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;


interface SendOrderInterface 
{
    public function issueOrder(array $order) : Order;
}