<?php




class Citizen {

    public $citizenid;
    public $name;
    public $admin_id;
    public  $surname;
    public $address;
    private $password;
    public $phone;
    public $email;
    public $nrMembers;

    /**
     * Citizen constructor.
     * @param $name
     * @param $admin_id
     * @param $surname
     * @param $address
     * @param $password
     * @param $phone
     * @param $email
     * @param $nrMembers
     */
    public function __construct($name, $admin_id, $surname, $address, $password, $phone, $email, $nrMembers)
    {
        $this->name = $name;
        $this->admin_id = $admin_id;
        $this->surname = $surname;
        $this->address = $address;
        $this->password = $password;
        $this->phone = $phone;
        $this->email = $email;
        $this->nrMembers = $nrMembers;
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
    public function getNrMembers()
    {
        return $this->nrMembers;
    }

    /**
     * @param mixed $nrMembers
     */
    public function setNrMembers($nrMembers)
    {
        $this->nrMembers = $nrMembers;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCitizenid()
    {
        return $this->citizenid;
    }

    /**
     * @param mixed $citizenid
     */
    public function setCitizenid($citizenid)
    {
        $this->citizenid = $citizenid;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }




}