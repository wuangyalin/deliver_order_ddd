<?php 

namespace App\Tests\Domain\Strategy;


interface OrderStrategyTestInterface
{
    public function testPersonalTypeStrategy();
    public function testPersonalExpressTypeStrategy();
    public function testEnterpriseTypeStrategy();
    public function testInvalidTypeStrategy();

}