<?php



class errorData{


    public $nameError;
    public $surnameError;
    public $emailError;
    public $passwordError;
    public $password1Error;
    public $phoneError;
    public $numberError;

    /**
     * validateData constructor.
     * @param $nameError
     * @param $surnameError
     * @param $emailError
     * @param $passwordError
     * @param $password1Error
     * @param $addressError
     * @param $phoneError
     * @param $numberError
     */
    public function __construct($nameError, $surnameError, $emailError, $passwordError,  $phoneError)
    {
        $this->nameError = $nameError;
        $this->surnameError = $surnameError;
        $this->emailError = $emailError;
        $this->passwordError = $passwordError;
        $this->phoneError = $phoneError;
    }

    /**
     * @return mixed
     */
    public function getNumberError()
    {
        return $this->numberError;
    }

    /**
     * @param mixed $numberError
     */
    public function setNumberError($numberError)
    {
        $this->numberError = $numberError;
    }

    /**
     * @return mixed
     */
    public function getNameError()
    {
        return $this->nameError;
    }

    /**
     * @param mixed $nameError
     */
    public function setNameError($nameError)
    {
        $this->nameError = $nameError;
    }

    /**
     * @return mixed
     */
    public function getSurnameError()
    {
        return $this->surnameError;
    }

    /**
     * @param mixed $surnameError
     */
    public function setSurnameError($surnameError)
    {
        $this->surnameError = $surnameError;
    }

    /**
     * @return mixed
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * @param mixed $emailError
     */
    public function setEmailError($emailError)
    {
        $this->emailError = $emailError;
    }

    /**
     * @return mixed
     */
    public function getPasswordError()
    {
        return $this->passwordError;
    }

    /**
     * @param mixed $passwordError
     */
    public function setPasswordError($passwordError)
    {
        $this->passwordError = $passwordError;
    }

    /**
     * @return mixed
     */
    public function getPassword1Error()
    {
        return $this->password1Error;
    }

    /**
     * @param mixed $password1Error
     */
    public function setPassword1Error($password1Error)
    {
        $this->password1Error = $password1Error;
    }


    /**
     * @return mixed
     */
    public function getPhoneError()
    {
        return $this->phoneError;
    }

    /**
     * @param mixed $phoneError
     */
    public function setPhoneError($phoneError)
    {
        $this->phoneError = $phoneError;
    }


}