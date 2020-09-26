<?php

namespace App\Tests\Infrastructure\Repository;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


abstract class AbstractRepositoryTest extends WebTestCase
{
    protected $entityManager;

    protected function setUp(): void
    {
        static::bootKernel();
        $this->entityManager = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
    }

    abstract public function testSuccessSave();
    abstract public function testFailSave();    
    abstract public function testSuccessGet();
    abstract public function testFailGet();

}
