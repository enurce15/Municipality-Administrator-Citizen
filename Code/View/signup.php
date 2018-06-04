<?php
session_start();
include_once '../Controller/validateData.php';
include_once '../Controller/errorData.php';

$err = "";
$loginerr = "";
$errorEmail="";
$errorName="";
$errorSurname="";
$errorPassword="";
$errorPhone="";



$error = new errorData(null,null,null,null,null);
if (isset($_GET['case']) && $_GET['case']=="wrong") $loginerr= "Please fill out all the fields as required!";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BAQ - Sign Up</title>
    <?php

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
//    else echo "No error session";


    ?>
    <link rel="icon" href="Foto/icon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="formstyle.css" rel="stylesheet">

</head>
<body style="background-color: lightblue;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="login.php">
        <img src="Foto/logo.png" width="40" height="30" class="d-inline-block align-top" alt="logo">
        Bashki Administrator Qytetar</a>
</nav>


<div class="wrapper">
    <form class="form-signin" method="post" action="../Controller/validateController.php">
        <h2 class="form-signin-heading">Sign Up</h2>

        <?php
        echo '<p class="error">'.$loginerr.'</p>';
        ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Account Type</label>
            </div>
            <select class="custom-select" name="select" onchange="show(this.value)">
                <option value="1" selected>Citizen</option>
                <option value="2">Administrator</option>
            </select>
        </div>

        Name:
        <input type="text" class="form-control" name="name" placeholder="Name" autofocus="" required />
        <?php echo '<p class="error">' .$errorName. '</p>'; ?>

        Surname:
        <input type="text" class="form-control" name="surname" placeholder="Surname"  required />
        <?php echo '<p class="error">' .$errorSurname. '</p>'; ?>
        <div id="fam">
            Number of Members:
            <input type="number" class="form-control" name="nrMembers" id="mem" placeholder="Number of Family Members" />
            <?php echo '<p class="error">' .$errorNumber. '</p>'; ?>
        </div>
        Email:
        <input type="email" class="form-control" name="email" placeholder="Email" required />
        <?php echo '<p class="error"> ' . $errorEmail . '</p>'; ?>

        Password:
        <input type="password" class="form-control" name="password" placeholder="Password"  required/>
        <?php echo '<p class="error"> ' . $errorPassword . '</p>'; ?>
        Address:
        <input type="text" class="form-control" name="address" placeholder="Address" required />

        Phone:
        <input type="text" class="form-control" name="phone" placeholder="Phone number +355 format"required/>
        <?php echo '<p class="error"> ' . $errorPhone . '</p>'; ?>
        <br>

        <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Sign up</button>
    </form>


    <script>
        function show(val) {
            if(val==1)
            {
                document.getElementById('fam').style.display='inline';
                document.getElementById('mem').setAttribute("required","");
            }
            if(val==2)
            {
                document.getElementById('fam').style.display='none';
                document.getElementById('mem').removeAttribute("required");
            }
        }
    </script>
</div>

</body>
<?php include_once "footer.html"?>
</html>
