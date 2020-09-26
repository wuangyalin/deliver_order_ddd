<?php

namespace App\Tests\Domain\Service;

use PHPUnit\Framework\TestCase;
use App\OrderDelivery\Infrastructure\Ulti\Constant;


abstract class AbstractSendServiceTest extends TestCase
{

    protected $samplePersonalOrderArr;
    protected $samplePersonalExpressOrderArr;
    protected $sampleEnterpriseOrderArr;
    

    protected function setUp(): void
    {
        $this->samplePersonalOrderArr = Constant::VALID_ORDERS[0];
        $this->samplePersonalExpressOrderArr = Constant::VALID_ORDERS[1];
        $this->sampleEnterpriseOrderArr = Constant::VALID_ORDERS[2];
    }

    abstract public function testIssueValidOrders();
    abstract public function testIssueInValidOrders();
    abstract public function testIssueEmptyValidOrders();
}
