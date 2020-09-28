<?php


namespace App\OrderDelivery\Api\Service;

use App\OrderDelivery\Domain\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use App\OrderDelivery\Domain\Service\SendPersonalExpressOrder;
use App\OrderDelivery\Domain\Service\SendEnterpriseOrder;
use App\OrderDelivery\Domain\Service\SendPersonalOrder;
use App\OrderDelivery\Domain\Strategy\SendOrderStrategy;
use App\OrderDelivery\Domain\Exception\InvalidOrderTypeException;

class SendOrderService implements OrderServiceInterface
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
     * process data and save data via doctrine
     *
     * @param array $orders
     * @return array
     */
    public function processData(array $orders): array
    {
        if(empty($orders)){
            return [
                'status'=> 'Empty',
                'message' => 'No orders find'
            ];
        }
        foreach ($orders as $order) {
            if (strtolower($order['deliveryType']) == 'personaldeliveryexpress') {
                $strategy = new SendOrderStrategy(new SendPersonalExpressOrder());
                $orderObj = $strategy->issueOrder($order);
            } else if (strtolower($order['deliveryType']) == 'enterprisedelivery') {
                $strategy = new SendOrderStrategy(new SendEnterpriseOrder());
                $orderObj = $strategy->issueOrder($order);
            } else if (strtolower($order['deliveryType']) == 'personaldelivery') {
                $strategy = new SendOrderStrategy(new SendPersonalOrder());
                $orderObj = $strategy->issueOrder($order);
            } else {
                throw new InvalidOrderTypeException('Invalid Order '. $order['deliveryType']);
            }
            //save order to db
            $this->entityManager->getRepository(Order::class)->saveOrder($orderObj);
        }

        $this->entityManager->getRepository(Order::class)->commit();

        return [
            'status'=> 'Success',
            'message' => 'Issued orders'
        ];
    }
}
