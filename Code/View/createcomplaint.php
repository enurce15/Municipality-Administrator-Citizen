<?php

$profile = "";
$createrequest = "";
$showrequest = "";
$createcomplaint = "active";
$showcomplaints = "";
$payments = "";
$admin = "";
$viewcitizen = "";

$errorMsg = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BAQ - Create Complaint</title>
    <link rel="stylesheet" href="formstyle.css">
    <?php include_once "navbar.php";
    if(isset($_GET['case'])&& $_GET['case']=="wrong") $errorMsg= "Subject and Description need to be filled!";

    ?>

    <div class="wrapper">
        <form class="form-signin" method="post" action="../Controller/validateComplaint.php">
            <h2 class="form-signin-heading">Create Complaint</h2>

            Subject:
            <input maxlength="50" type="text" class="form-control" name="subject" placeholder="Write subject of complaint" autofocus="" />
            <br>
            Description:
            <textarea maxlength="300" class="form-control" name="description" placeholder="Write your complaint" style="height: 250px" ></textarea>


            <span class="error"> <center><?php echo $errorMsg?></center></span>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit Complaint</button>

        </form>
    </div>

    </body><?php include_once "footer.html"?>
</html>

