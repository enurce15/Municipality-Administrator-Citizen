<?php


class validateData{


    public function checkName($name){
        return preg_match("/[a-zA-Z]{1,20}$/",$name);
    }

    public function checkSurname($surname){
        return preg_match("/[a-zA-Z]{1,20}$/",$surname);
    }


    public function checkPhone($phone){
        if (preg_match('/^(\+355)[0-9]{9}/',$phone))
            return true;
        return false;
    }

    public function checkPassword($password)
    {
        return preg_match("/^(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{8,19}$/",$password);
    }

    public function checkEmail($email){
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    public function isEmpty($data, $field){
        $msg = null;
        foreach ($field as $value){
            if(empty($data[$value])){
                $msg.=" $value is empty \n";
            }
        }
        return $msg;
    }











}