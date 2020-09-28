<?php

namespace App\OrderDelivery\Domain\Exception;

class InvalidEnterpriseException extends AbstractInvalidOrderException {
    public function __construct($val) {
        parent::__construct($val);
    }
}