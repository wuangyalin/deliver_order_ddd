<?php

namespace App\Tests\Domain\Entity;

use PHPUnit\Framework\TestCase;
use App\OrderDelivery\Infrastructure\Ulti\Constant;

abstract class AbstractEntityTest extends TestCase
{

    protected $sampleOrders;
    protected $sampleConfirmations;

    protected function setUp(): void
    {
        $this->sampleData = Constant::VALID_ORDERS;
    }

    abstract public function testGetters();
    abstract public function testValidSetters();
    abstract public function testInvalidSetters();
}
