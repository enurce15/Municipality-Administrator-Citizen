<?php




class Request{

    public $requestid;
    public $citizen_id;
    public $admin_id;
    public $type;
    public $documents;
    public $description;
    public $status;
    public $date;

    /**
     * Request constructor.
     * @param $citizen_id
     * @param $admin_id
     * @param $type
     * @param $documents
     * @param $description
     * @param $status
     * @param $date
     */
    public function __construct($citizen_id, $admin_id, $type, $documents, $description, $status, $date)
    {
        $this->citizen_id = $citizen_id;
        $this->admin_id = $admin_id;
        $this->type = $type;
        $this->documents = $documents;
        $this->description = $description;
        $this->status = $status;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getRequestid()
    {
        return $this->requestid;
    }

    /**
     * @param mixed $requestid
     */
    public function setRequestid($requestid)
    {
        $this->requestid = $requestid;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @param mixed $documents
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;
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


}