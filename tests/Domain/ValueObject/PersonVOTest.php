<?php

namespace App\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\Exception\InvalidPersonException;


class PersonVOTest extends TestCase implements ValueObjectTestInterface
{
    public function testValidData()
    {
        $person = new Person('Luke', 'Gong');
        $this->assertTrue(true);
    }

    public function testInValidData()
    {
        $this->expectException(InvalidPersonException::class);
        $person = new Person('', 'Gong');
        $person = new Person('Luke', '');
    }
}
