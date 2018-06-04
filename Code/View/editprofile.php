<?php

include_once '../Controller/CRUD.php';
include_once "../Controller/userData.php";
include_once "../Controller/validateData.php";
include_once '../Controller/errorData.php';

$loginerr="";
if(isset($_GET['case'])&& $_GET['case']=="wrong") $loginerr= "All areas should be filled";
$profile = "";
$createrequest = "";
$showrequest = "";
$createcomplaint = "";
$showcomplaints = "";
$payments = "";
$admin="";
$viewcitizen = "";
$error = "";
$errorEmail = "";
$errorName = "";
$errorSurname = "";
$errorPassword = "";
$errorPhone = "";
$errorNumber = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BAQ - Edit Profile</title>
    <?php include_once "navbar.php";

        if (isset($_SESSION['error'])) {

            $array = $_SESSION['error'];
            $errorName = $array[0];
            $errorSurname = $array[1];
            $errorPassword = $array[2];
            $errorEmail = $array[3];
            $errorPhone = $array[4];
            $errorNumber = $array[5];

            unset($_SESSION['error']);
        }
    ?>
    <link rel="icon" href="Foto/icon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="formstyle.css" rel="stylesheet">

</head>
<body style="background-color: lightblue;">


<div class="wrapper">
    <form class="form-signin" method="post" action="../Controller/editController.php">
        <h2 class="form-signin-heading">Edit Profile Data</h2>

        Name:
        <input type="text" class="form-control" name="name" value="<?php echo $user->getName() ?>" autofocus=""/>
        <!--        --><?php
        echo '<p class="error">' . $errorName. '</p>'; ?>
        Surname:
        <input type="text" class="form-control" name="surname" value="<?php echo $user->getSurname() ?>" autofocus=""/>
        <?php echo '<p class="error">' .$errorSurname. '</p>'; ?>
        <!--        --><?php
        if ($_SESSION['user_type'] == 1) {
            echo "<div id='fam'>
                        Number of Members:
                        <input type='number' class='form-control' name='nrMembers' value='" . $user->getNrMembers() . "' autofocus=''/>
                        <p class='error'>" .$errorNumber. "</p></div>";

        }
        ?>
        Email:
        <input type="email" class="form-control" name="email" value="<?php echo $user->getEmail() ?>" autofocus=""/>
        <?php echo '<p class="error"> ' . $errorEmail . '</p>'; ?>
        Password:
        <input type="password" class="form-control" name="password" value="<?php echo $user->getPassword() ?>"/>
        <?php echo '<p class="error"> ' . $errorPassword . '</p>'; ?>
        Phone:
        <input type="text" class="form-control" name="phone" value="<?php echo $user->getPhone() ?>" autofocus=""/>
        <?php echo '<p class="error"> ' . $errorPhone . '</p>'; ?>
        Address:
        <input type="text" class="form-control" name="address" value="<?php echo $user->getAddress() ?>" autofocus=""
               disabled/>
        <br>
        <?php
        echo '<p class="error">'.$loginerr.'</p>';
        ?>
        <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Save Changes</button>

    </form>


</div>

</body><?php include_once "footer.html"?>
</html>
