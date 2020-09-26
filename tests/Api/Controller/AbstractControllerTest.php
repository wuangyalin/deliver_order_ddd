<?php

namespace App\Tests\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


abstract class AbstractControllerTest extends WebTestCase
{

    protected $client;

    protected function setUp() :void
    {
        $this->client = static::createClient();
    }

    abstract public function testSendOrderRequest();
    abstract public function testProcessOrderRequest();
    abstract public function testConfirmOrderRequest();
}
