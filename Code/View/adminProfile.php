<?php
include '../Controller/userData.php';
include_once '../Model/admin.php';

$profile = "";
$createrequest = "";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$payments = "";
$admin="active";
$viewcitizen = "";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Administrator</title>


    <?php include_once "navbar.php"; ?>

    <div id="content">
        <center><h3>This is your Administrator Information</h3></center>
        <br>
        <div class="card border-info bg-light mb-3" style="width: 18rem; margin: auto">
            <img class="card-img-top" height="250" src="Foto/admin.png" alt="Card image">
            <div class="card-body">

<!--        duhen marr te dhenat e adminit ketu.-->
                <?php

                    $query = "Select citizen.* ,admin.name as adminname, admin.surname as adminsurname, admin.address as adminadd, admin.phone as cel, admin.email as adminmail from
                          citizen,admin where citizen.citizenid ='".$_SESSION['login_user']."'and admin.adminid = citizen.admin_id ";
                    $data = $crud->getData($query)[0];

                $profile =
                    new Admin($data['adminname'],
                        $data['adminsurname'], $data['adminadd'], $data['password'],
                        $data['cel'], $data['adminmail']);

                ?>

                <h5 class="card-title"><?php echo $profile->getName()." ".$profile->getSurname() ?></h5>
                <p class="card-text">Address: <?php echo $profile->getAddress() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cel: <?php echo $profile->getPhone() ?></li>
                <li class="list-group-item">Email: <?php echo $profile->getEmail()?> </li>
            </ul>
<!--            <div class="card-body">-->
<!--                <a href="#" class="card-link">My Citizens: --><?php //echo $user->getAdminId()?><!--</a>-->
<!--            </div>-->
        </div>



    </div>

    </body><?php include_once "footer.html"?>
</html>

