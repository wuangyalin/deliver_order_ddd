<?php

namespace App\OrderDelivery\Domain\Entity;

use App\OrderDelivery\Domain\Entity\Order;


class Confirmation
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * Comfirmation status
     *
     * @var string
     */
    protected $status;

    /**
     * Comfirmation Info
     *
     * @var string
     */
    protected $info;

    /**
     * Confirmation order detail
     *
     * @var Order
     */
    protected $orderDetail;

    /**
     * Order receive date
     *
     * @var DateTime
     */
    protected $receiveDate;

    /**
     * Get comfirmation status
     *
     * @return  string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set comfirmation status
     *
     * @param  string  $status  Comfirmation status
     *
     * @return  self
     */
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get comfirmation Info
     *
     * @return  string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set comfirmation Info
     *
     * @param  string  $info  Comfirmation Info
     *
     * @return  self
     */
    public function setInfo(string $info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get confirmation order detail
     *
     * @return  Order
     */
    public function getOrderDetail()
    {
        return $this->orderDetail;
    }

    /**
     * Set confirmation order detail
     *
     * @param  Order  $orderDetail  Confirmation order detail
     *
     * @return  self
     */
    public function setOrderDetail(Order $orderDetail)
    {
        $this->orderDetail = $orderDetail;

        return $this;
    }


    /**
     * Get order receive date
     *
     * @return  DateTime
     */
    public function getReceiveDate()
    {
        return $this->receiveDate;
    }

    /**
     * Set order receive date
     *
     * @param  DateTime  $receiveDate  Order receive date
     *
     * @return  self
     */
    public function setReceiveDate(\DateTime $receiveDate)
    {
        $this->receiveDate = $receiveDate;

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
}
