<?php



class complaint{

    public $complaintid;
    public $citizen_id;
    public $admin_id;
    public $subject;
    public $body;
    public $date;

    /**
     * complaint constructor.
     * @param $citizen_id
     * @param $admin_id
     * @param $subject
     * @param $date
     * @param $body
     */
    public function __construct( $citizen_id, $admin_id, $subject, $body, $date)
    {

        $this->citizen_id = $citizen_id;
        $this->admin_id = $admin_id;
        $this->type = $subject;
        $this->body = $body;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getComplaintid()
    {
        return $this->complaintid;
    }

    /**
     * @param mixed $complaintid
     */
    public function setComplaintid($complaintid)
    {
        $this->complaintid = $complaintid;
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
     * @param mixed $subject
     */
    public function setType($subject)
    {
        $this->type = $subject;
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
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


}