<?php

namespace App\OrderDelivery\Domain\ValueObject;

use App\OrderDelivery\Domain\Exception\InvalidOrderTypeException;


class OrderType
{
    /**
     * @var integer
     */
    protected $id;
    
    /**
     * order type name
     *
     * @var string
     */
    protected $name;

    /**
     * order type constructor
     *
     * @param string $name
     * @param string $address
     */
    public function __construct(string $name)
    {
        if(!in_array($name, ['personalDelivery','personalDeliveryExpress','enterpriseDelivery'])){
            throw new InvalidOrderTypeException('Invalid order type');
        }
        $this->name = $name;
    }

    /**
     * Get order type name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get the value of id
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }
}
