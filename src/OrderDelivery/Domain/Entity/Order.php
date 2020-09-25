<?php

namespace App\OrderDelivery\Domain\Entity;

use App\OrderDelivery\Domain\ValueObject\Person;
use App\OrderDelivery\Domain\ValueObject\Campaign;
use App\OrderDelivery\Domain\ValueObject\OrderType;
use App\OrderDelivery\Domain\ValueObject\Enterprise;


class Order
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * Order customer
     *
     * @var Person
     */
    protected $customer;

    /**
     * Order type
     *
     * @var OrderType
     */
    protected $type;

    /**
     * Order source
     *
     * @var string
     */
    protected $source;

    /**
     * Order weight
     *
     * @var integer
     */
    protected $weight;

    /**
     * Order status
     *
     * @var string
     */
    protected $status;

    /**
     * Order On Behalf
     *
     * @var string
     */
    protected $onBehalf;

    /**
     * if the type is email campaign, notifie the seperate marketing service
     *
     * @var bool
     */
    protected $isNotifiedCampaign;

    /**
     * Order created time
     *
     * @var \DateTime
     */
    protected $createTime;

    /**
     * order campaign
     *
     * @var Campaign
     */
    protected $campaign;

    /**
     * Order enterprise
     *
     * @var Enterprise
     */
    protected $enterprise;


    /**
     * see if the order is high priority
     *
     * @var bool
     */
    protected $isHighPriority;
    
    /**
     * see if the enterprise is validated
     *
     * @var bool
     */
    protected $isValidEnterprise;


    /**
     * Get order enterprise
     *
     * @return  Enterprise
     */
    public function getEnterprise()
    {
        return $this->enterprise;
    }

    /**
     * Set order enterprise
     *
     * @param  Enterprise  $enterprise  Order enterprise
     *
     * @return  self
     */
    public function setEnterprise(Enterprise $enterprise)
    {
        $this->enterprise = $enterprise;

        return $this;
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

    /**
     * Set the value of id
     *
     * @param  integer  $id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get order customer
     *
     * @return  Person
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set order customer
     *
     * @param  Person  $customer  Order customer
     *
     * @return  self
     */
    public function setCustomer(Person $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get order type
     *
     * @return  OrderType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set order type
     *
     * @param  OrderType  $type  Order type
     *
     * @return  self
     */
    public function setType(OrderType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get order source
     *
     * @return  string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set order source
     *
     * @param  string  $source  Order source
     *
     * @return  self
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get order weight
     *
     * @return  integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set order weight
     *
     * @param  integer  $weight  Order weight
     *
     * @return  self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get order status
     *
     * @return  string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set order status
     *
     * @param  string  $status  Order status
     *
     * @return  self
     */
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get order created time
     *
     * @return  \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set order created time
     *
     * @param  \DateTime  $createTime  Order created time
     *
     * @return  self
     */
    public function setCreateTime(\DateTime $createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get order campaign
     *
     * @return  Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set order campaign
     *
     * @param  Campaign  $campaign  order campaign
     *
     * @return  self
     */
    public function setCampaign(Campaign $campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get order On Behalf
     *
     * @return  string
     */
    public function getOnBehalf()
    {
        return $this->onBehalf;
    }

    /**
     * Set order On Behalf
     *
     * @param  string  $onBehalf  Order On Behalf
     *
     * @return  self
     */
    public function setOnBehalf(string $onBehalf)
    {
        $this->onBehalf = $onBehalf;

        return $this;
    }

    /**
     * Get see if the enterprise is validated
     *
     * @return  bool
     */ 
    public function getIsValidEnterprise()
    {
        return $this->isValidEnterprise;
    }

    /**
     * Set see if the enterprise is validated
     *
     * @param  bool  $isValidEnterprise  see if the enterprise is validated
     *
     * @return  self
     */ 
    public function setIsValidEnterprise(bool $isValidEnterprise)
    {
        $this->isValidEnterprise = $isValidEnterprise;

        return $this;
    }

    /**
     * Get if the type is email campaign, notifie the seperate marketing service
     *
     * @return  bool
     */ 
    public function getIsNotifiedCampaign()
    {
        return $this->isNotifiedCampaign;
    }

    /**
     * Set if the type is email campaign, notifie the seperate marketing service
     *
     * @param  bool  $isNotifiedCampaign  if the type is email campaign, notifie the seperate marketing service
     *
     * @return  self
     */ 
    public function setIsNotifiedCampaign(bool $isNotifiedCampaign)
    {
        $this->isNotifiedCampaign = $isNotifiedCampaign;

        return $this;
    }

    /**
     * Get see if the order is high priority
     *
     * @return  bool
     */ 
    public function getIsHighPriority()
    {
        return $this->isHighPriority;
    }

    /**
     * Set see if the order is high priority
     *
     * @param  bool  $isHighPriority  see if the order is high priority
     *
     * @return  self
     */ 
    public function setIsHighPriority(bool $isHighPriority)
    {
        $this->isHighPriority = $isHighPriority;

        return $this;
    }
}
