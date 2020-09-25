<?php

namespace App\OrderDelivery\Api\Service;

interface OrderServiceInterface
{
    public function processData(array $data): array;
}
