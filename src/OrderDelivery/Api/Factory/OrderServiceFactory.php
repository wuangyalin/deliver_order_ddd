<?php

namespace App\OrderDelivery\Api\Factory;

use App\OrderDelivery\Api\Service\SendOrderService;
use App\OrderDelivery\Api\Service\ConfirmOrderService;
use App\OrderDelivery\Api\Service\ProcessOrderService;
use App\OrderDelivery\Api\Service\OrderServiceInterface;
use App\OrderDelivery\Domain\Exception\InvalidOrderTypeException;


class OrderServiceFactory
{
    protected $sendOrderService;
    protected $confirmOrderService;
    protected $validateOrderService;

    public function __construct(
        SendOrderService $sendOrderService,
        ConfirmOrderService $confirmOrderService,
        ProcessOrderService $validateOrderService
    ) {

        $this->sendOrderService = $sendOrderService;
        $this->confirmOrderService = $confirmOrderService;
        $this->validateOrderService = $validateOrderService;
    }
    
    /**
     * create service by different operations
     *
     * @param string $type
     * @return OrderServiceInterface
     */
    public function create(string $type) : OrderServiceInterface
    {
        switch ($type) {
            case 'send':
                $service = $this->sendOrderService;
                break;
            case 'valid':
                $service = $this->validateOrderService;
                break;
            case 'confirm':
                $service = $this->confirmOrderService;
                break;
            default:
                throw new InvalidOrderTypeException('Delivery Type is not correct');
                break;
        }

        return $service;
    }
}
