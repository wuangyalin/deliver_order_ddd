<?php


namespace App\OrderDelivery\Api\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\OrderDelivery\Domain\Entity\Order;
use App\OrderDelivery\Infrastructure\Ulti\Constant;
use App\OrderDelivery\Domain\Strategy\ProcessOrderStrategy;
use App\OrderDelivery\Domain\Service\ProcessEmailCampaignOrder;
use App\OrderDelivery\Domain\Service\ProcessPersonalExpressOrder;
use App\OrderDelivery\Domain\Service\ProcessEnterpriseOrder;
use App\OrderDelivery\Domain\Exception\InvalidEmailCampaignException;
use App\OrderDelivery\Domain\Exception\InvalidEnterpriseException;
use App\OrderDelivery\Domain\Exception\InvalidExpressException;



class ProcessOrderService implements OrderServiceInterface
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
     * check the request token, if it has permission then process order
     * 
     * process data by different order type
     * 
     * @param array $data
     * @return array
     */
    public function processData(array $data): array
    {
        // ---------------------
        // TODO: check auth token in $data to see if it can process data
        // ---------------------
        $orderList = $this->entityManager->getRepository(Order::class)->getOrdersByStatus(Constant::ORDER_STATUS_INITIAL);
        if(count($orderList) === 0){
            return [
                'status'=> 'no-order',
                'message' => 'There is no new issued orders'
            ];
        }
        foreach($orderList as $key => $order){
            if(strtolower($order->getSource()) == 'email'){
                $strategy= new ProcessOrderStrategy(new ProcessEmailCampaignOrder());
                if($strategy->processOrder($order) === false){
                    throw new InvalidEmailCampaignException('Not pass the email campaign process');
                }else{
                    $orderList[$key]->setIsNotifiedCampaign(true);
                }
            }
            if(strtolower($order->getType()->getName()) == 'personaldeliveryexpress'){
                $strategy= new ProcessOrderStrategy(new ProcessPersonalExpressOrder());
                if($strategy->processOrder($order) === false){
                    throw new InvalidExpressException('Not pass the Process Personal Express process');
                }else{
                    $orderList[$key]->setIsHighPriority(true);
                }
            }else if(strtolower($order->getType()->getName()) == 'enterprisedelivery'){
                $strategy= new ProcessOrderStrategy(new ProcessEnterpriseOrder());
                if($strategy->processOrder($order) === false){
                    throw new InvalidEnterpriseException('Not pass the validate enterprise process');
                }else{
                    $orderList[$key]->setIsValidEnterprise(true);
                }
            }
            //change the status
            $orderList[$key]->setStatus(Constant::ORDER_STATUS_PROCESSED);
            $this->entityManager->getRepository(Order::class)->saveOrder($orderList[$key]);
        }
        $this->entityManager->getRepository(Order::class)->commit();

        return [
            'status'=> 'Success',
            'message' => 'Processed orders'
        ];
    }
}
