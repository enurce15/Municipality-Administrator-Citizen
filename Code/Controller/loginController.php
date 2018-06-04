<?php
session_start();
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';


if (isset($_POST['signup'])){
    header("Location:../View/signup.php");
}
if (isset($_POST['login'])){



    $loginerr = "";

//    && isset($_POST['select']) && isset($_POST['email']) && isset($_POST['password'])
    $crud = new crud();
    $email = $crud->escape_string($_POST['email']);
    $password = $crud->escape_string($_POST['password']);

    // conditions on which option the users selects to be verified such as Employee, Administrator or Citizen

    //if user selects citizen as role
    if($_POST['select']==1) {

        $query = "Select * from citizen where citizen.email = '" . $email . "' and citizen.password = '" . $password . "'";
        $id = $crud->getData($query);
        //if login was successful, save the user id in a session
        if ($id) {
//            echo "id".$id[0]['citizenid'];
            $_SESSION['login_user'] = $id[0]['citizenid'];
            $_SESSION['user_type'] = $_POST['select'];
            header("Location:../View/profile.php?id=".$_SESSION['login_user']."&type=citizen");
        } //if no user with these credentials was found
        else {
//            $loginerr = "You have entered wrong credentials! Please try again!";
            header('Location:../View/login.php?case=wrong');
        }
    }


    //if user selects administrator as role
    if($_POST['select']==2) {
        $query = "Select * from admin where admin.email = '" . $email . "' and admin.password = '" . $password . "'";
        $id = $crud->getData($query);
        //if login was successful, save the user id in a session
        if ($id) {
            $_SESSION['login_user'] = $id[0]['adminid'];
            $_SESSION['user_type'] = $_POST['select'];
            header("Location:../View/profile.php?id=".$_SESSION['login_user']."&type=admin");
        } //if no user with these credentials was found
        else {
//            $loginerr = "You have entered wrong credentials! Please try again!";
            header('Location:../View/login.php?case=wrong');

        }
    }


    //if user selects employee as role
    if($_POST['select']==3) {
        $query = "Select * from employee where employee.email = '" . $email . "' and employee.password = '" . $password . "'";
        $id = $crud->getData($query);
        //if login was successful, save the user id in a session
        if ($id) {
            $_SESSION['login_user'] = $id[0]['munid'];
            $_SESSION['user_type'] = $_POST['select'];
            header("Location:../View/profile.php?id=".$_SESSION['login_user']."&type=munip");
        } //if no user with these credentials was found
        else {
//            $loginerr = "You have entered wrong credentials! Please try again!";
            header('Location:../View/login.php?case=wrong');
        }
    }
}