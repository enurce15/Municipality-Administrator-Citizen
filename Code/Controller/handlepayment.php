<?php
include_once '../Controller/CRUD.php';
require_once '../DB/dbHelper.php';
include_once 'userData.php';

if(isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['month'])){

    echo $_GET['month'];
    $crud= new crud();


    $query = "Insert into payment set 
                        citizen_id ='".$_GET['id']."', admin_id = '".$_SESSION['login_user']."',
                        date='".date('d M, Y') ."',
                         description='Administration Fee for ".$_GET['month']."', status='Paid'";
    $execute = $crud->execute($query);

    header('Location:../View/payments.php');
}
else header('Location:../View/payments.php');