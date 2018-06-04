<?php
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
include_once 'userData.php';

if(isset($_GET['id']) && isset($_GET['type'])){
    if(!is_numeric($_GET['id']) ) header('Location:../View/showrequests.php');

    elseif(isset($_GET['type']) && $_GET['type']=="forward"){
        $crud= new crud();
        $sql= "UPDATE request SET admin_id = '".$_SESSION['login_user']."' WHERE requestid= '".$_GET['id'] ."'";
        echo $crud->execute($sql);
        header('Location:../View/showrequests.php');
    }

    elseif(isset($_GET['type']) && $_GET['type']=="accept"){
        $crud= new crud();
        $sql= "UPDATE request SET status = 'Accepted' WHERE requestid= '".$_GET['id'] ."'";
        echo $crud->execute($sql);
        header('Location:../View/showrequests.php');
    }
    elseif(isset($_GET['type']) && $_GET['type']=="deny"){
        $crud= new crud();
        $sql= "UPDATE request SET status = 'Denied' WHERE requestid= '".$_GET['id'] ."'";
        echo $crud->execute($sql);
        header('Location:../View/showrequests.php');
    }

    else header('Location:../View/showrequests.php');


}
else header('Location:../View/showrequests.php');