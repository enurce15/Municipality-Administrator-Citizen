<?php
session_start();
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
require_once 'validateData.php';
require_once 'errorData.php';
include_once '../Model/citizen.php';
include_once '../Model/admin.php';

$errorEmail = "";
$errorName = "";
$errorSurname = "";
$errorPassword = "";
$errorPhone = "";
$errorNumber="";
$message = "";
$number = "";
$emailexists="";
$checkNumber=1;

if (isset($_POST['submit'])) {

    $crud = new crud();
    $validation = new validateData();

    $name = $crud->escape_string($_POST['name']);
    $surname = $crud->escape_string($_POST['surname']);
    $email = $crud->escape_string($_POST['email']);
    $password = $crud->escape_string($_POST['password']);
    $numberError = "";

    if ($_POST['select'] == 1) {
        $number = $crud->escape_string($_POST['nrMembers']);
        $checkNumber=is_numeric($number)&&($number<100 && $number>0);
    }
    $address = $crud->escape_string($_POST['address']);
    $phone = $crud->escape_string($_POST['phone']);

    //validation of data

    if ($_POST['select']==1)
        $message = $validation->isEmpty($_POST, array('name', 'surname', 'email', 'phone', 'address','nrMembers','password'));
    elseif($_POST['select']==2)
        $message = $validation->isEmpty($_POST, array('name', 'surname', 'email', 'phone', 'address','password'));


    $checkEmail = $validation->checkEmail($email);
    $checkName = $validation->checkName($name);
    $checkSurname = $validation->checkSurname($surname);
    $checkPassword = $validation->checkPassword($password);
    $checkPhone = $validation->checkPhone($phone);

    if($message!=null){

        header("Location:../View/signup.php?case=wrong");
    }

    else {
        //check nqs email eshte already ne db
        if ($_POST['select'] == 1)   $query = "Select * from citizen where email = '".$email."'";
        elseif ($_POST['select'] == 2)   $query = "Select * from admin where email = '".$email."'";

         echo "email exist".$emailexists = $crud->getData($query);

        if($checkNumber && $checkPhone && $checkEmail && $checkName && $checkSurname && $checkPassword && $message==null && !$emailexists) {

            if ($_POST['select'] == 1) {


                //object user create
                $cit = new Citizen($name, '0', $surname, $address, $password, $phone, $email, $number);

                echo "Creating citizen";
                $query = "INSERT INTO citizen set name= '" . $cit->getName() . "', surname= '" . $cit->getSurname() . "', address='" . $cit->getAddress() . "',
                                    password= '" . $cit->getPassword() . "', phone='" . $cit->getPhone() . "',email= '" . $cit->getEmail() . "',nrMembers= '" . $cit->getNrMembers() . "'";
                $execute = $crud->execute($query);

                if ($execute) {

                    $new = "Select * from citizen where email = '" . $cit->getEmail() . "'";
                    $id = $crud->getData($new)[0]['citizenid'];

                    echo $_SESSION['login_user'] = $id;
                    echo " " . $_SESSION['user_type'] = $_POST['select'];
                    echo $usertype = "citizen";

                    echo "Account created";
                    header("Location:../View/profile.php?id=" . $_SESSION['login_user'] . "&type=citizen");
                }

            } elseif ($_POST['select'] == 2) {

                $admin = new Admin($name, $surname, $address, $password, $phone, $email);
                $query = "INSERT INTO admin set name= '" . $admin->getName() . "', surname= '" . $admin->getSurname() . "', address='" . $admin->getAddress() . "',
                                password= '" . $admin->getPassword() . "', phone='" . $admin->getPhone() . "',email= '" . $admin->getEmail() . "'";
                $execute = $crud->execute($query);

                if ($execute) {
                    $sql = "Select * from admin where email= '" . $admin->getEmail() . "'";
                    echo $userid = $crud->getData($sql)[0]['adminid'];
                    $_SESSION['login_user'] = $userid;
                    echo " " . $_SESSION['user_type'] = $_POST['select'];

                    $usertype = "admin";

                    echo "Account created";
                    header("Location:../View/profile.php?id=" . $_SESSION['login_user'] . "&type=admin");
                }
            }
        }
        else {
            if ($checkNumber) $errorNumber = "Please enter the number of your family members as digits only, max two digits allowed";
            if (!$checkEmail)echo $errorEmail = "Please insert a valid email.";
            if ($emailexists)echo $errorEmail = "This email is taken.";
            if (!$checkName) echo $errorName = "Your name can contain only letters";
            if (!$checkSurname)echo $errorSurname = "Your surname can contain only letters";
            if (!$checkPassword)echo $errorPassword = "Please enter a password with at least 1 lowercase letter,1 number \n and must be at least 8 characters and maximum 30 characters.";
            if (!$checkPhone)echo $errorPhone = "Your phone needs to  start with +355 and have 9 numbers after";

            $_SESSION['error'] = array($errorName,$errorSurname,$errorPassword,$errorEmail,$errorPhone,$errorNumber);
            foreach ($_SESSION['error'] as $error) echo $error."\n";


            echo "Errors, no account";
                        header("Location:../View/signup.php");

        }

    }

}


