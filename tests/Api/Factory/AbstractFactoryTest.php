<?php

namespace App\Tests\Api\Factory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\OrderDelivery\Api\Factory\OrderServiceFactory;
use App\OrderDelivery\Api\Service\SendOrderService;
use App\OrderDelivery\Api\Service\ConfirmOrderService;
use App\OrderDelivery\Api\Service\ProcessOrderService;


abstract class AbstractFactoryTest extends WebTestCase
{

    protected $factory;

    protected function setUp(): void
    {
        static::bootKernel();
        $entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');


        $this->factory = new OrderServiceFactory(
            new SendOrderService($entityManager),
            new ConfirmOrderService($entityManager),
            new ProcessOrderService($entityManager)
        );
    }

    abstract public function testReturnDesiredService();
}
