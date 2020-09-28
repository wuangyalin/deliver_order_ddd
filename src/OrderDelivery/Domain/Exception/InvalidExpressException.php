<?php

namespace App\OrderDelivery\Domain\Exception;

class InvalidExpressException extends AbstractInvalidOrderException {
    public function __construct($val) {
        parent::__construct($val);
    }
}