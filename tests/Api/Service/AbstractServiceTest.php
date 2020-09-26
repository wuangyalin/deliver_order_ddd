<?php

namespace App\Tests\Api\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\OrderDelivery\Api\Service\ConfirmOrderService;
use App\OrderDelivery\Api\Service\ProcessOrderService;
use App\OrderDelivery\Api\Service\SendOrderService;


abstract class AbstractServiceTest extends WebTestCase
{

    protected $confirmOrderService;
    protected $processOrderService;
    protected $sendOrderService;
    protected $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();

        static::bootKernel();
        $entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');

        $this->confirmOrderService = new ConfirmOrderService($entityManager);
        $this->sendOrderService = new SendOrderService($entityManager);
        $this->processOrderService = new ProcessOrderService($entityManager);
    }

    abstract public function testProcessData();
}
