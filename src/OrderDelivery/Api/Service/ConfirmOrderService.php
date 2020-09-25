<?php

namespace App\OrderDelivery\Api\Service;

use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Domain\Entity\Confirmation;
use Doctrine\ORM\EntityManagerInterface;
use App\OrderDelivery\Infrastructure\Ulti\Constant;
use App\OrderDelivery\Domain\Strategy\ConfirmOrderStrategy;
use App\OrderDelivery\Domain\Service\ConfirmPersonalExpressOrder;
use App\OrderDelivery\Domain\Service\ConfirmPersonalOrder;
use App\OrderDelivery\Domain\Service\ConfirmEnterpriseOrder;

class ConfirmOrderService implements OrderServiceInterface
{

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    /**
     * confirm the processed orders and back to user
     *
     * @param array $data
     * @return array
     */
    public function processData(array $data) : array
    {
        // TODO: check auth token in $data to see if it can process data

        $orderList = $this->entityManager->getRepository(Order::class)->getOrdersByStatus(Constant::ORDER_STATUS_PROCESSED);
        $confirmationArray = [];
        foreach($orderList as $key => $order){
            if(strtolower($order->getType()->getName()) == 'personaldeliveryexpress'){
                $strategy= new ConfirmOrderStrategy(new ConfirmPersonalExpressOrder());
            }else if(strtolower($order->getType()->getName()) == 'enterprisedelivery'){
                $strategy= new ConfirmOrderStrategy(new ConfirmEnterpriseOrder());
            }else if(strtolower($order->getType()->getName()) == 'personaldelivery'){
                $strategy= new ConfirmOrderStrategy(new ConfirmPersonalOrder());
            }else{
                throw New \Exception('Invalid Order');
            }
            $tmpConfirmation = $strategy->confirmOrder($order);

            //change the status
            $orderList[$key]->setStatus(Constant::ORDER_STATUS_COFIRMED);
            $tmpConfirmation->setStatus(Constant::CONFIRMATION_STATUS_ISSUED);
            $this->entityManager->getRepository(Confirmation::class)->saveConfirmation($tmpConfirmation);
            $confirmationArray[] = $strategy->objectToArray($tmpConfirmation);
            $tmpConfirmation->setStatus(Constant::CONFIRMATION_STATUS_CLOSED);
        }
        $this->entityManager->getRepository(Confirmation::class)->commit();

        return [
            'status'=> 'Success',
            'message' => 'Orders Confirmed',
            'data' => $confirmationArray
        ];
    }
}
