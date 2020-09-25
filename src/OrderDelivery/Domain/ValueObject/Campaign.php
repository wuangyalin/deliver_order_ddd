<?php

namespace App\OrderDelivery\Domain\ValueObject;

class Campaign
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * campaign name
     *
     * @var string
     */
    protected $name;

    /**
     * campaign type
     *
     * @var string
     */
    protected $type;


    /**
     * campaign ad
     *
     * @var string
     */
    protected $ad;

    /**
     * constructor
     *
     * @param string $name
     * @param string $type
     * @param string $ad
     */
    public function __construct(string $name, string $type, string $ad)
    {
        $this->name = $name;
        $this->type = $type;
        $this->ad = $ad;
    }

    /**
     * Get campaign name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get campaign type
     *
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get campaign ad
     *
     * @return  string
     */
    public function getAd()
    {
        return $this->ad;
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
