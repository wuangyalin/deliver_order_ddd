<?php

namespace App\OrderDelivery\Domain\ValueObject;

use Doctrine\Common\Collections\ArrayCollection;
use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\Exception\InvalidEnterpriseException;


class Enterprise
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * Enterprise name
     *
     * @var string
     */
    protected $name;


    /**
     * Enterprise type
     *
     * @var string
     */
    protected $type;


    /**
     * Enterprise abn
     *
     * @var string
     */
    protected $abn;

    /**
     * Enterprise directors
     *
     * @var Person|ArrayCollection
     */
    protected $directors;

    /**
     * constructor
     *
     * @param string $name
     * @param string $type
     * @param string $ad
     * @param string $directors
     */
    public function __construct(string $name, string $type, string $abn, array $directors)
    {
        if(!$name){
            throw new InvalidEnterpriseException('Enterprise name is empty');
        }
        $this->name = $name;
        $this->type = $type;
        $this->abn = $abn;
        $this->directors = $directors;
    }

    /**
     * Get enterprise name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get enterprise type
     *
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get enterprise abn
     *
     * @return  string
     */
    public function getAbn()
    {
        return $this->abn;
    }

    /**
     * Get enterprise directors
     *
     * @return  Person|ArrayCollection
     */
    public function getDirectors()
    {
        return $this->directors;
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
