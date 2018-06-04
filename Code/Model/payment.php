<?php



class payment{

    public $paymentid;
    public $admin_id;
    public $citizen_id;
    public $date;
    public $status;
    public $description;
    public $amount;

    /**
     * payment constructor.
     * @param $admin_id
     * @param $citizen_id
     * @param $date
     * @param $status
     * @param $description
     * @param $amount
     */
    public function __construct($admin_id, $citizen_id, $date, $status, $description, $amount)
    {
        $this->admin_id = $admin_id;
        $this->citizen_id = $citizen_id;
        $this->date = $date;
        $this->status = $status;
        $this->description = $description;
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }


    /**
     * @return mixed
     */
    public function getPaymentid()
    {
        return $this->paymentid;
    }

    /**
     * @param mixed $paymentid
     */
    public function setPaymentid($paymentid)
    {
        $this->paymentid = $paymentid;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->admin_id;
    }

    /**
     * @param mixed $admin_id
     */
    public function setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    /**
     * @return mixed
     */
    public function getCitizenId()
    {
        return $this->citizen_id;
    }

    /**
     * @param mixed $citizen_id
     */
    public function setCitizenId($citizen_id)
    {
        $this->citizen_id = $citizen_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}