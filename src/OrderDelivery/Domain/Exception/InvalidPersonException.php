<?php

namespace App\OrderDelivery\Domain\Exception;

class InvalidPersonException extends AbstractInvalidOrderException {
    public function __construct($val) {
        parent::__construct($val);
    }
}