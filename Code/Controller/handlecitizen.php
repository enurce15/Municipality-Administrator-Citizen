<?php
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
include_once 'userData.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){

        $crud= new crud();
        $sql= "UPDATE citizen SET admin_id = '".$_SESSION['login_user']."' WHERE citizenid= '".$_GET['id'] ."'";
        echo $crud->execute($sql);
        header('Location:../View/viewCitizens.php');
}
else header('Location:../View/showrequests.php');