<?php
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
require_once 'validateData.php';
require_once 'errorData.php';
include_once 'userData.php';

if (isset($_SESSION['login_user'])) {

    if (isset($_POST['submit'])) {

        $usertype="";
        if ($_SESSION['user_type']==1) $usertype="citizen";
        elseif ($_SESSION['user_type']==2) $usertype="admin";
        elseif ($_SESSION['user_type']==3) $usertype="munip";

        $errorEmail = "";
        $errorName = "";
        $errorSurname = "";
        $errorPassword = "";
        $errorPhone = "";
        $errorNumber = "";
        $checkNumber=1;
        $message = "";
        $number = "";


        $crud = new crud();
        $validation = new validateData();

        //gather the data from edit form

        $name = $crud->escape_string($_POST['name']);
        $surname = $crud->escape_string($_POST['surname']);
        //if the user is a citizen
        if ($_SESSION['user_type'] == 1) {
            $number = $crud->escape_string($_POST['nrMembers']);
            echo $checkNumber=is_numeric($number)&&($number<100 && $number>0);
        }

        $phone = $crud->escape_string($_POST['phone']);
        $password = $crud->escape_string($_POST['password']);
        $email = $crud->escape_string($_POST['email']);


        //validate

        echo$checkEmail = $validation->checkEmail($email);
        echo$checkName = $validation->checkName($name);
        echo$checkSurname = $validation->checkSurname($surname);
        echo$checkPassword = $validation->checkPassword($password);
        echo$checkPhone = $validation->checkPhone($phone);

        //msg for citizen
        if ($_SESSION['user_type'] == 1)
        {
            $message = $validation->isEmpty($_POST,array('name','surname','nrMembers','email','password','phone'));

        }

        //msg for admin
        elseif ($_SESSION['user_type'] == 2){
            $message = $validation->isEmpty($_POST,array('name','surname','email','password','phone'));

        }

        //if message is empty meaning form fields were not completed return to edit with message
        if ($message != null) {

            header("Location:../View/editprofile.php?case=wrong");

        }
        else{
            if ($_SESSION['user_type'] == 1)   $query = "Select * from citizen where email = '".$email."' and citizenid!='".$_SESSION['login_user']."'";
            elseif ($_SESSION['user_type']== 2)   $query = "Select * from admin where email = '".$email."' and adminid!='".$_SESSION['login_user']."'";

            $emailexists = $crud->getData($query);
            if($emailexists)echo "email exist";
            if(!$emailexists && $checkNumber && $checkPhone && $checkEmail && $checkName && $checkSurname && $checkPassword && $message==null){

                if ($_SESSION['user_type'] == 1)
                {

                    echo $update = "Update citizen set name= '$name', surname= '$surname',  password = '$password' ,phone='$phone',
                                email= '$email',nrMembers= '$number' where citizenid='".$_SESSION['login_user']."'";
                    $execute = $crud->execute($update);
                    if(!$execute) echo "Jo update";

                    elseif ($execute)echo "Db changed";

                        header("Location:../View/profile.php?id=".$_SESSION['login_user']."&type=".$usertype);

                }

                elseif ($_SESSION['user_type']==2){

                    echo "not existing";

                    $updateUser = new Admin($name,$surname,$user->getAddress(),$password,$phone,$email);
                    //update te dhenat te db
                    echo $update = "UPDATE admin set name= '".$updateUser->getName()."', surname= '".$updateUser->getSurname()."',  password = '".$updateUser->getPassword()."' ,phone='".$updateUser->getPassword()."',email= '".$updateUser->getEmail()."' where adminid = '".$_SESSION['login_user']."'";
                    $execute = $crud->execute($update);
                    if(!$execute) echo "Jo update";

                    elseif ($execute)
                        header("Location:../View/profile.php?id=".$_SESSION['login_user']."&type=".$usertype);
                }
            }
            else{
                if (!$checkName) echo $errorName = "Your name can contain only letters";
                if (!$checkSurname)echo $errorSurname = "Your surname can contain only letters";
                if (!$checkPassword) echo$errorPassword = "Please enter a password with at least 1 lowercase letter,1 number \n and must be at least 8 characters and maximum 30 characters.";
                if (!$checkPhone) echo$errorPhone = "Your phone needs to  start with +355 and have 9 numbers after";
                if (!$checkEmail) echo$errorEmail = "Please enter a valid email";
                if ($emailexists) echo $errorEmail = "This email is taken";
                if ($checkNumber)echo $errorNumber = "Please enter the number of your family members as digits only, max 2 digits allowed";

//                $errorData = new errorData($errorName,$errorSurname,$errorEmail,$errorPassword,$errorPhone);
                $_SESSION['error'] = array($errorName,$errorSurname,$errorPassword,$errorEmail,$errorPhone,$errorNumber);

//                foreach ($_SESSION['error'] as $error)
//                    echo $error."\n";
//                echo "gabime";
                header("Location:../View/editprofile.php");
            }
        }

    }
    else header("Location:../View/editprofile.php");
}
else header("Location:logout.php");
