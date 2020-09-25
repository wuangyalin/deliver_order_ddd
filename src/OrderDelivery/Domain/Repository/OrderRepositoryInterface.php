<?php

namespace App\OrderDelivery\Domain\Respository;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;


interface OrderRepositoryInterface 
{
    public function getOrdersByStatus(string $status) : array;
    public function saveOrder(Order $order) : void;
    public function saveConfirmation(Confirmation $confirmation) : void;
    public function commit() : void;
}