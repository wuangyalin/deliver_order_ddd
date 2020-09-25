<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;


interface ProcessOrderInterface 
{
    public function processOrder(Order $order) : bool;
}