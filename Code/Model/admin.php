<?php




class Admin {

    public $adminid;
    public $name;
    public $surname;
    public $address;
    private$password;
    public $phone;
    public $email;

    /**
     * Admin constructor.
     * @param $name
     * @param $surname
     * @param $address
     * @param $password
     * @param $phone
     * @param $email
     */
    public function __construct($name, $surname, $address, $password, $phone, $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->password = $password;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * @return mixed
     */

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
    public function getAdminId()
    {
        return $this->adminid;
    }

    /**
     * @param mixed $citizenid
     */
    public function setAdminId($adminid)
    {
        $this->adminid = $adminid;
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