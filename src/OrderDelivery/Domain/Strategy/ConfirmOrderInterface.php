<?php

namespace App\OrderDelivery\Domain\Strategy;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;


interface ConfirmOrderInterface 
{
    public function confirmOrder(Order $order) : Confirmation;
    public function objectToArray(Confirmation $confirmation) : array;
}