<?php

namespace App\OrderDelivery\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\OrderDelivery\Api\Factory\OrderServiceFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class OrderDeliveryController extends AbstractController
{
    protected $orderServiceFactory;

    public function __construct(OrderServiceFactory $orderServiceFactory)
    {
        $this->orderServiceFactory = $orderServiceFactory;
    }

    /**
     * place order controller       
     *
     * @param Request $request
     * @return void
     */
    public function issueOrders(Request $request)
    {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
        } else {
            return new JsonResponse([
                'status' => 'failed',
                'message' => 'request type is not a valid json post type'
            ], 500);
        }
        $service = $this->orderServiceFactory->create('send');
        $result = $service->processData($data);

        return new JsonResponse($result, 200);
    }

    /**
     * process orders
     * different workflow for different order type
     *
     * @param Request $request
     * @return void
     */
    public function processOrders(Request $request)
    {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
        } else {
            return new JsonResponse([
                'status' => 'failed',
                'message' => 'request type is not a valid json post type'
            ]);
        }

        $service = $this->orderServiceFactory->create('valid');
        $result = $service->processData($data);

        return new JsonResponse($result);
    }


    /**
     * confirm the orders and return the comfirmation to users
     *
     * @param Request $request
     * @return void
     */
    public function comfirmOrders(Request $request)
    {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($request->getContent(), true);
        } else {
            return new JsonResponse([
                'status' => 'failed',
                'message' => 'request type is not a valid json post type'
            ]);
        }

        $service = $this->orderServiceFactory->create('confirm');
        $result = $service->processData($data);

        return new JsonResponse($result);
    }
}
