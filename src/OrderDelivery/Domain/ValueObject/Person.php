<?php

namespace App\OrderDelivery\Domain\ValueObject;

use App\OrderDelivery\Domain\Exception\InvalidPersonException;

class Person
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * person name
     *
     * @var string
     */
    protected $name;


    /**
     * person type
     *
     * @var string
     */
    protected $address;

    /**
     * constructor
     *
     * @param string $name
     * @param string $address
     */
    public function __construct(string $name, string $address)
    {
        if(!$name){
            throw new InvalidPersonException('Name is empty');
        }
        if(!$address){
            throw new InvalidPersonException('Address is empty');
        }
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * Get person name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get person type
     *
     * @return  string
     */ 
    public function getAddress()
    {
        return $this->address;
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
