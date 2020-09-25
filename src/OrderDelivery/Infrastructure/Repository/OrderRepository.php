<?php

namespace App\OrderDelivery\Infrastructure\Respository;

use App\OrderDelivery\Domain\Entity\Confirmation;
use App\OrderDelivery\Domain\Respository\OrderRepositoryInterface;
use App\OrderDelivery\Domain\Entity\Order;



class OrderRepository extends DeliveryEntityRespository implements OrderRepositoryInterface
{
    
    public function getOrdersByStatus(string $status): array
    {
        $qb = $this->createQueryBuilder('o')
            ->where('o.status = :order_status')
            ->setParameter('order_status', $status);
        return $qb->getQuery()->getResult();
    }

    /**
     * save order into DB
     *
     * @param Order $order
     * @return void
     */
    public function saveOrder(Order $order): void
    {
        $this->_em->persist($order);
    }

    /**
     * save confirmation into DB
     *
     * @param Order $order
     * @return void
     */
    public function saveConfirmation(Confirmation $confirmation): void
    {
        $this->_em->persist($confirmation);
    }

    /**
     * commit to excute all persisted queries
     *
     * @param Order $order
     * @return void
     */
    public function commit(): void
    {
        $this->_em->flush();
    }
}
