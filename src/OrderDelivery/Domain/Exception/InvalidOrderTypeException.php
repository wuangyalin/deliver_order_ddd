<?php

namespace App\OrderDelivery\Domain\Exception;

class InvalidOrderTypeException extends AbstractInvalidOrderException {
    public function __construct($val) {
        parent::__construct($val);
    }
}