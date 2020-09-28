<?php

namespace App\OrderDelivery\Domain\Exception;

class InvalidEmailCampaignException extends AbstractInvalidOrderException {
    public function __construct($val) {
        parent::__construct($val);
    }
}