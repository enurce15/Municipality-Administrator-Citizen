<?php
$loginerr="";
if(isset($_GET['case'])&& $_GET['case']=="wrong") $loginerr= "Wrong credentials! Please try again!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BAQ - Login</title>
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
    <form class="form-signin" method="post" action="../Controller/loginController.php">
        <h2 class="form-signin-heading">Please login</h2>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Account Type</label>
            </div>
            <select class="custom-select" name="select" id="inputGroupSelect01">
                <option value="1" selected>Citizen</option>
                <option value="2">Administrator</option>
                <option value="3">Municipality Employee</option>
            </select>
        </div>
        <input type="text" class="form-control" name="email" placeholder="Email" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" />
        <span class="error"> <center><?php echo $loginerr?></center></span>
        <br>
        <button class="btn btn-lg btn-secondary btn-block" type="submit" name="login">Login</button>

        <br>
        <center>Don't have an account?</center>
        <button class="btn btn-lg btn-dark btn-block" type="submit" name="signup">Sign up</button>
    </form>
</div>

</body><?php include_once "footer.html"?>
</html>