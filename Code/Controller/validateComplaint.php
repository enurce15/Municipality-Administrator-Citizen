<?php
session_start();
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
include_once 'validateData.php';
include_once 'userData.php';

if (isset($_SESSION['login_user'])){

    if (isset($_POST['submit'])){

        $errorSubject = "";
        $errorDescription = "";
        $crud = new crud();

        $subject =$crud->escape_string($_POST['subject']);
        $description = $crud->escape_string($_POST['description']);

        if (strlen($subject)>0 && strlen($description)>0){

            if ($_SESSION['user_type']==1){
                $query = "Insert into complaint set 
                        citizen_id ='".$_SESSION['login_user']."', admin_id = '".$user->getAdminId()."',
                         subject = '$subject' , description ='$description',date = now() ";
                $execute = $crud->execute($query);
                if ($execute){
                    header("Location:../View/showcomplaints.php");
                }
                else header("Location:../View/createcomplaint.php");
            }
            elseif ($_SESSION['user_type']==2){
                $query = "Insert into complaint set 
                        citizen_id ='0', admin_id = '".$_SESSION['login_user']."',
                         subject = '$subject' , description ='$description',date = now()";
                $execute = $crud->execute($query);
                if ($execute){
                    header("Location:../View/showcomplaints.php");
                }
                else header("Location:../View/createcomplaint.php");
            }
        }

        // redirect to create complaint with the appropriate message
        else header("Location:../View/createcomplaint.php?case=wrong");

    }

}
//if session is not set
else header("Location:logout.php");
